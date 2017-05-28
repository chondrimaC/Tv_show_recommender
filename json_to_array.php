<?php
$filetxt = 'bangla_rating.json';

if(file_exists($filetxt)) {
	$jsondata = file_get_contents($filetxt);
	$arr_data = json_decode($jsondata, true);
	$series = $arr_data;
}
else echo 'The file '. $filetxt .' not exists';
?>