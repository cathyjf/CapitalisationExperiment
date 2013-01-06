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

header('Content-type: image/png');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Expires: 0');

$test = getInProgressTest($g_ip);
if ($test == null) die;
$file = MAGIC . '/' . $test[0] . '-' . ($test[1] ? 'c' : 'l') . '.png';
readfile($file);

?>
