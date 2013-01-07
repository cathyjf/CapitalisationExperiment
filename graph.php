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

require_once('jpgraph/jpgraph.php');
require_once('jpgraph/jpgraph_line.php');

$param = $_GET['data'];
$min = (double)$_GET['min'];
$max = (double)$_GET['max'];
$step = (double)$_GET['step'];
$data = explode(',', $param);
foreach ($data as &$i) {
    $i = (double)$i;
}

$intervals = (int)(($max - $min) / $step) + 1;
$x = array();

$x[] = $min + $step / 2;
array_unshift($data, 0);

for ($i = 0; $i < $intervals; ++$i) {
	$x[] = $min + $step * ($i + 0.5);
}

$x[] = $x[$i];
$data[] = 0;

$graph = new Graph(400, 300);
$graph->SetScale('int');
$line = new LinePlot($data, $x);
$line->AddArea(0, $i, true, '#abc9e7');
$graph->Add($line);
$graph->Stroke();

?>
