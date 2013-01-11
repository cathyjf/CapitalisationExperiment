<?php
/**
 * This program tests the effect of capitalisation on reading speed.
 * Copyright (C) 2009  Cathy Fitzpatrick <cathy@cathyjf.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 **/

define('IN_READING', true);
require_once('common.php');

if (isset($_GET['source'])) {
	highlight_file(__FILE__);
	die;
}

/** Calculate A*^2 **/
function getAndersonStatistic($data, $mean, $sd) {
	sort($data);
	$sum = 0;
	$n = count($data);
	for ($i = 1; $i <= $n; ++$i) {
		$y = ($data[$i - 1] - $mean) / $sd;
		$area = stats_cdf_normal($y, 0, 1, 1);
		$sum += (2 * $i - 1) * log($area) + (2 * ($n - $i) + 1) * log(1 - $area);
	}
	$a2 = -$n - $sum / $n;
	$astar2 = $a2 * (1 + 4/$n - 25/($n * $n));
	return $astar2;
}

function getStats($arr) {
	$total = 0;
	$min = 10000000;
	$max = -10000000;
	foreach ($arr as $i) {
		$total += $i;
		if ($i > $max) {
			$max = $i;
		}
		if ($i < $min) {
			$min = $i;
		}
	}
	$mean = $total / count($arr);
	$sd = 0;
	foreach ($arr as $i) {
		$sd += ($mean - $i) * ($mean - $i);
	}
	$df = count($arr) - 1;
	$sd = sqrt($sd / $df);
	return array($mean, $sd, $df + 1, $min, $max);
}

function getDifferenceStats($stats1, $stats2) {
	$df = $stats1[2] + $stats2[2] - 2;
	$s = ($stats1[2] - 1) * $stats1[1] * $stats1[1]
		+ ($stats2[2] - 1) * $stats2[1] * $stats2[1];
	$s = $s / $df;
	$s = sqrt($s);
	$se = $s * sqrt(1/$stats1[2] + 1/$stats2[2]);
	$mean = $stats1[0] - $stats2[0];
	return array($mean, $se, $df);
}

function getDifferenceInterval($stats) {
	list($mean, $se, $df) = $stats;
	$t = inverseCdf(0.975, $df);
	$margin = $se * $t;
	return array($mean - $margin, $mean + $margin);
}

function constructHistogram($arr, $stats) {
	$div = round($stats[1], 2);
	$width = $stats[4] - $stats[3];
	$intervals = (int)($width / $div) + 1;
	$data = array();
	for ($i = 0; $i < $intervals; ++$i) {
		$v = 0;
		$min = $stats[3] + $div * $i;
		$max = $min + $div;
		foreach ($arr as $j) {
			if (($j < $max) && ($j >= $min)) {
				++$v;
			}
		}
		$data[] = $v;
	}
	$param = implode(',', $data);
	$min = round($stats[3], 2);
	$max = round($stats[4], 2);
	echo "<img src='graph.php?data=$param&amp;max=$max&amp;min=$min&step=$div' alt='Graph' />";
}

function getConfidenceInterval($stats) {
	list($mean, $sd, $n) = $stats;
	$df = $n - 1;
	$se = $sd / sqrt($n);
	$t = inverseCdf(0.975, $df);
	$upper = $mean + $t * $se;
	$lower = $mean - $t * $se;
	return array($lower, $upper);
}

function calculateDifferenceForRatio($test, $r) {
	$stats = array();
	for ($j = 0; $j < 2; ++$j) {
		$arr = getArray(mysql_query("SELECT (endtime-time)/60 FROM results WHERE endtime<>-1 AND test=$test AND capitals=$j AND ratio >= $r"));
		$stats[] = getStats($arr);
	}
	return getDifferenceInterval(getDifferenceStats($stats[0], $stats[1]));
}

function inverseCdf($p0, $df) {
	$t = 3;
	do {
		$p = stats_cdf_t($t, $df, 1);
		$diff = $p - $p0;
		$t += -abs($diff) / $diff * 0.0001;
	} while (abs($diff) > 0.00001);
	return $t;
}

function getArray($q) {
	$p = array();
	while (list($x) = mysql_fetch_row($q)) {
		$p[] = $x;
	}
	return $p;
}

function formatQuery($stats) {
	$arr = getConfidenceInterval($stats);
	if ($arr[0] < 0) {
		$arr[0] = 0;
	}
	return '(' . round($arr[0], 2) . ', ' . round($arr[1], 2) . ')';
}

list($total) = mysql_fetch_row(mysql_query("SELECT count(*) FROM results"));
list($completed) = mysql_fetch_row(mysql_query("SELECT count(*) FROM results WHERE endtime<>-1"));
list($acceptable) = mysql_fetch_row(mysql_query("SELECT count(*) FROM results WHERE endtime<>-1 AND ratio >= 0.5"));

echo "<html><head><title>Report</title></head><body>";
echo "$total tests have been initiated, of which $completed were completed, of which $acceptable had acceptable scores (>= 50%).<br />";
echo "For the remainder of this page, we consider only completed tests with acceptable scores.";

echo "<p><b>Table 1</b>: Mean times among completed tests</p>";

echo "<table border='1'><tr><th>Test</th><th>Lowercase mean time</th><th>A<sup>*<sup>2</sup></sup></th><th>Normal mean time</th><th>A<sup>*<sup>2</sup></sup></th><th>Mean difference</th><th>P-value</th></tr>";

$count = array();

$graphs = '';

for ($i = 0; $i < 4; ++$i) {
	echo "<tr><td>$i</td>";
	$arr = array();
	$stats = array();
	for ($j = 0; $j < 2; ++$j) {
		$arr[] = getArray(mysql_query("SELECT (endtime-time)/60 FROM results WHERE endtime<>-1 AND test=$i AND capitals=$j AND ratio >= 0.5"));
		$stats[] = getStats($arr[$j]);
		echo '<td>' . formatQuery($stats[$j]) . '</td>';
		$idx = $i * 2 + $j + 1;
		$a = round(getAndersonStatistic($arr[$j], $stats[$j][0], $stats[$j][1]), 3);
		if ($a > 0.751) {
			$a = "<i>$a</i><sup>†</sup>";
		}
		echo "<td><a href='#g$idx'>$a</a></td>";

		ob_start();
		/** Draw a graph. **/
		$version = $j ? 'normally capitalised' : 'all lowercase';
		echo "<p><a name='g$idx'></a><b>Graph $idx</b>: Times for $version version of test $i</p>";
		constructHistogram($arr[$j], $stats[$j]);
		$graphs .= ob_get_contents();
		ob_end_clean();
	}
	$count[] = array($stats[0][2], $stats[1][2]);
	$diff = getDifferenceStats($stats[0], $stats[1]);
	list($lower, $upper) = getDifferenceInterval($diff);
	$lower = round($lower, 2);
	$upper = round($upper, 2);
	echo "<td>($lower, $upper)</td>";

	// two-tailed p-value
	$p = 2 * (round(stats_cdf_t(-abs($diff[0] / $diff[1]), $diff[2], 1), 4) * 100);
	echo "<td>$p%</td>";

	echo '</tr>';
}

echo "</table>";

echo "<p>The intervals are all 95% confidence intervals. The p-value is the chance of the sample means being this far apart, or father, if proper capitalisation has no effect on the completion time. A low p-value suggests that the population means are not equal, i.e., that proper capitalisation has a statistically significant effect on completion time.</p>";

echo "<p><small>† There is strong evidence that this data did not come from a normal distribution.</small></p>";

echo "<p><b>Table 2</b>: Breakdown of completed tests</p>";

echo "<table border='1'><tr><th>Test</th><th>Total completed</th><th>Normally capitalised</th><th>All lowercase</th></tr>";
for ($i = 0; $i < 4; ++$i) {
	$a = $count[$i][0];
	$b = $count[$i][1];
	$c = $a + $b;
	echo "<tr><td>$i</td><td>$c</td><td>$b</td><td>$a</td></tr>";
}
echo "</table>";

echo $graphs;

echo "<p><a href='?source'>View source</a>.</p>";

echo "<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />";

echo "</body></html>";

?>
