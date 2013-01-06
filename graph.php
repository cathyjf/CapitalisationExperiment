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
require_once('jpgraph/jpgraph_bar.php');

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
for ($i = 0; $i < $intervals; ++$i) {
	$x[] = $min + $step * $i;
}
$x[] = $x[$i - 1] + $step / 2;
$data[] = 0;

$graph = new Graph(400, 300);
$graph->SetScale('int');
$bar1 = new BarPlot($data, $x);
$bar1->SetWidth($step / 2);
$graph->Add($bar1);
$graph->Stroke();

?>
