<?php
$user_name = $_COOKIE['nameORid'];
$full_name = $_POST['full_name'];
$query1 = $_POST['type'];
$query2 = $_POST['genre'];
$query3 = $_POST['ben_show'];
$query4 = $_POST['hin_show'];
$query5 = $_POST['eng_show'];

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("recommender_system", $con);
$result = mysql_query("SELECT * FROM question_answer WHERE username ='$user_name' ");

if( mysql_num_rows($result) > 0) {
    mysql_query("UPDATE question_answer SET full_name = '$full_name', query1 = '$query1', query2 = '$query2', query3 = '$query3', query4 = '$query4', 
	query5 = '$query5' WHERE username ='$user_name' ");
}
else
{
    mysql_query("INSERT INTO question_answer (username, full_name, query1, query2, query3, query4, query5) VALUES ('$user_name', '$full_name', '$query1', '$query2', '$query3', '$query4', '$query5') ");
}
//echo "<script>alert('Thank u for your information');window.location = './final_recommend_hindi.php';</script>";
mysql_close($con);

	// insert bengali rating

$ben_file = "bangla_rating.json";
$ben_content = file_get_contents($ben_file);
$ben_array = json_decode($ben_content, TRUE);

if(isset($ben_array[$user_name]) && isset($ben_array[$user_name][$query3])){
$ben_array[$user_name][$query3] = 5;
}
else if(isset($ben_array[$user_name])){
$ben_array[$user_name] += array($query3 => 5);
}
else {
$ben_array[$user_name] = array($query3 => 5);
}
file_put_contents($ben_file, json_encode($ben_array));

	// insert hindi rating
	
$hin_file = "hindi_rating.json";
$hin_content = file_get_contents($hin_file);
$hin_array = json_decode($hin_content, TRUE);

if(isset($hin_array[$user_name]) && isset($hin_array[$user_name][$query4])){
$hin_array[$user_name][$query4] = 5;
}
else if(isset($hin_array[$user_name])){
$hin_array[$user_name] += array($query4 => 5);
}
else {
$hin_array[$user_name] = array($query4 => 5);
}
file_put_contents($hin_file, json_encode($hin_array));


$eng_file = "english_rating.json";
$eng_content = file_get_contents($eng_file);
$eng_array = json_decode($eng_content, TRUE);

if(isset($eng_array[$user_name]) && isset($eng_array[$user_name][$query5])){
$eng_array[$user_name][$query5] = 5;
}
else if(isset($eng_array[$user_name])){
$eng_array[$user_name] += array($query5 => 5);
}
else {
$eng_array[$user_name] = array($query5 => 5);
}
file_put_contents($eng_file, json_encode($eng_array));


?>