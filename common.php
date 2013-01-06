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

if (!defined('IN_READING')) {
	die;
}

define('MAGIC', 'samples');

function getIp() {
	return (!empty($_SERVER['REMOTE_ADDR']))
		? $_SERVER['REMOTE_ADDR']
			: ((!empty($_ENV['REMOTE_ADDR']))
			? $_ENV['REMOTE_ADDR'] : getenv('REMOTE_ADDR'));
}

function getQuestions($test) {
	$q = mysql_query("SELECT question, correct, wrong1, wrong2, wrong3 FROM questions WHERE test=$test ORDER BY id");
	$ret = array();
	while ($x = mysql_fetch_row($q)) {
		$ret[] = $x;
	}
	return $ret;
}

/** returns array(test, capitals, order, id) or null **/
function getInProgressTest($ip) {
	$q = mysql_query("SELECT test, capitals, presented, id FROM results WHERE endtime=-1 AND ip='$ip'");
	$row = mysql_fetch_row($q);
	if (!$row) {
		return null;
	}
	return $row;
}

function getCompletedTests($ip) {
	$q = mysql_query("SELECT test FROM results WHERE endtime<>-1 AND ip='$ip'");
	$ret = array();
	while (list($test) = mysql_fetch_row($q)) {
		$ret[] = $test;
	}
	return $ret;
}

require_once('config.inc.php');

$g_ip = getIp();

?>
