<?php
$dir    = 'map';
$files = scandir($dir);

array_shift($files);
array_shift($files);
//print_r($files); 


$allfiles = array();
foreach ($files as $value) {
	$pieces = explode(',', $value);
//	print_r($pieces[1]);
	$user = array('#DescriminalizaSTF', $pieces[1], $pieces[2], '#DescriminalizaSTF');
	array_push($allfiles,$user);
}

echo json_encode($allfiles);
?>