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
?>
<html>
<head>
<title>Reading comprehension experiment</title>
<style text="text/css">
div#main {
	width: 500px;
}
</style>
<script type="text/javascript">
function begin() {
	if (confirm("Please read the whole page before you begin. You are timed once the test begins. Begin the test now?")) {
		window.location = "test.php";
	}
}
</script>
</head>
<body>
<div id="main">
<h3>A study on reading</h3>
<p>The purpose of this study is to measure the effect of capitalisation
on reading speed. Participating in this test will take around ten minutes and will
help us to collect some potentially interesting data.</p>
<p>The test consists of a short passage and several multiple choice questions. Read the
passage and then answer the questions. Work as quickly as possible, but make sure you
answer the questions correctly. Both your time and correctness are recorded.</p>
<p>Once you click the button below, you are being timed, so do not begin unless you have
ten minutes free to complete the whole test at once.</p>
<noscript><p>You must enable JavaScript to take this test.</p></noscript>
<p>Each person may complete up to two tests.</p>
<?php
$tests = getCompletedTests($g_ip);
if (count($tests) > 1) {
?>
<p>You have already completed two tests. Thank you for participating!</p>
<?php
} else {
?>
<form>
<input type="button" value="Begin the test" onclick="begin();" />
</form>
<?php
}
?>
</div>
</body>
</html>
