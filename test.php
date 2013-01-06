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

function writeQuestion($q, $idx, $ordering) {
	echo '<p>' . $q[0] . '</p>' . "\n";
	$order = substr($ordering, 4 * $idx, 4);
	for ($i = 0; $i < 4; ++$i) {
		$pos = (int)$order[$i];
		echo "<input type='radio' name='q$idx' value='$i' /> ";
		echo $q[1 + $pos];
		echo "<br />\n";
	}
}

function beginTest($test, $capitals, $ordering) {
	global $g_ip;
	$time = time();
	$s = "INSERT INTO results (ip, capitals, test, time, presented) VALUES ('$g_ip', $capitals, $test, $time, '$ordering')";
	mysql_query($s);
}

function getRandomOrdering() {
	$p = array();
	$opt = array(0, 1, 2, 3);
	array_splice($opt, $p[] = $a = rand(0, 3), 1);
	$bi = rand(0, 2);
	$p[] = $b = $opt[$bi];
	array_splice($opt, $bi, 1);
	$ci = rand(0, 1);
	$p[] = $c = $opt[$ci];
	array_splice($opt, $ci, 1);
	$p[] = $d = $opt[0];
	$ret = '';
	foreach ($p as $i) {
		if ($i == 0) $i = '0';
		$ret .= $i;
	}
	return $ret;
}

$progress = getInProgressTest($g_ip);
if ($progress) {
	list($test, $capitals, $order, $id) = $progress;
} else {
	$arr = getCompletedTests($g_ip);
	$c = count($arr);
	if ($c > 1) {
		header('Location: ./');
		die;
	}
	$first = true;
	do {
		$loop = false;
		if ($first) {
			$test = 3;
			$first = false;
		} else {
			$test = rand(0, 3);
		}
		for ($i = 0; $i < $c; ++$i) {
			if ($arr[$i] == $test) {
				$loop = true;
			}
		}
	} while ($loop);
	$capitals = rand(0, 1);
	$order = '';
}

$questions = getQuestions($test);
foreach ($questions as $a => $i) {
	if (!$progress) {
		$order .= getRandomOrdering();
	}
	if (!$capitals) {
		foreach ($i as $b => $j) {
			$questions[$a][$b] = strtolower($j);
		}
	}
}
if (!$progress) {
	beginTest($test, $capitals, $order);
}

?>
<html>
<head>
<title>Reading test</title>
<script type="text/javascript">
window.onbeforeunload = function() {
	return false;
}
function submitAnswers() {
	window.onbeforeunload = null;
}
</script>
</head>
<body>
<p>
Use the following information to answer the questions.<br />
Work quickly, but answer each question correctly.<br />
Your time is measured from now until you submit the test.<br />
Navigating away from this page will not restart the clock.
</p>
<p><img src="image.php" alt="[text]" /></p>
<p><b>You must select an answer for <u>all</u> of the following questions.</b></p>
<form id="choices" action="evaluate.php" method="post">
<?php
$c = count($questions);
for ($i = 0; $i < $c; ++$i) {
	writeQuestion($questions[$i], $i, $order);
}
?>
<p><input type="submit" onmousedown="submitAnswers();" value="Submit" />
</form>
</body>
</html>
