<?php
$file = "bangla_rating.json";

$FirstName = $_COOKIE['nameORid'];
$id = $_POST["id"];
$rating = $_POST["rating"];  

$file_content = file_get_contents($file);
$json = json_decode($file_content, TRUE);

if(isset($json[$FirstName]) && isset($json[$FirstName][$id])){
$json[$FirstName][$id] = $rating;
}
else if(isset($json[$FirstName])){
$json[$FirstName] += array($id => $rating);

//array_push($json,$json[$FirstName][0] = array($movie => $rating));
}
else {
$json[$FirstName] = array($id => $rating);
}
file_put_contents($file, json_encode($json));
/*$rating = $_POST["uvalue"]; 
$a = $_POST['ua']; 
echo $rating, $a;*/

?>	