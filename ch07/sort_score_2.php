<?php
$reports = [
	['name'=>'tom','score'=>90],
	['name'=>'xiaoming','score'=>70],
	['name'=>'xiaohong','score'=>80],
	['name'=>'david','score'=>100],
];
foreach ($reports as $key => $row) {
    $score[$key] = $row['score'];
}
array_multisort($score, SORT_DESC, $reports);
var_dump($reports);