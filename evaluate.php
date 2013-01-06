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

$time = time();
$progress = getInProgressTest($g_ip);
if (!$progress) {
	header('Location: ./');
	die;
}

list($test, $capitals, $order, $id) = $progress;
$c = strlen($order);
$count = $c / 4;
$correct = 0;
$raw = '';
for ($i = 0; $i < $c; $i += 4) {
	$idx = 'q' . ($i / 4);
	if (!isset($_POST[$idx])) {
		header('Location: test.php');
		die;
	}
	$v = strpos($order, '0', $i) - $i;
	$b = ($_POST[$idx] == $v);
	$raw .= $b ? '1' : '0';
	if ($b) {
		++$correct;
	}
}
$ratio = $correct / $count;

mysql_query("UPDATE results SET endtime=$time, ratio=$ratio, raw='$raw' WHERE id=$id");

list($starttime) = mysql_fetch_row(mysql_query("SELECT time FROM results WHERE id=$id"));
$delta = round(($time - $starttime) / 60, 2);
$percent = round($ratio * 100);

?>
<html>
<head>
<title>Reading test &mash; results</title>
</head>
<body>
<p>
Thank you for completing the test. You took <?php echo $delta; ?> minutes and 
scored <?php echo "$correct / $count ($percent%)";?>.
</p>
<?php
$tests = getCompletedTests($g_ip);
if (count($tests) < 2) {?>
<p>You can <a href="test.php">try a different test</a> now if you want.</p>
<?php
}
?>
<p>Return to the <a href="./">home page</a>.</p>
</body>
</html>
