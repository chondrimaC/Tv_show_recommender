<?php   
// for recommendation based on genre
$user_name = $_COOKIE['nameORid'];
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("recommender_system", $con);
$get_answer = mysql_query("SELECT * FROM question_answer WHERE username ='$user_name' ");
if( mysql_num_rows($get_answer) > 0) {
	$row = mysql_fetch_assoc($get_answer);
	$query1 = $row['query1'];
	$sql = mysql_query("select * from english_show_list m inner join english_show_genre r on m.show_id = r.show_id where r.genre_id = '$query1'");
	if(mysql_num_rows($sql) > 0){
		$english_list = array();
		while($id = mysql_fetch_assoc($sql)) {
		$english_list[] = $id['show_id'];
}
		//print_r($english_list);
	}
}

// for recommendation based on rating
require_once("recommend_algo.php");
	$filetxt = 'english_rating.json';
	$jsondata = file_get_contents($filetxt);
	$arr_data = json_decode($jsondata, true);
	$series = $arr_data;

$re = new Recommend();
if(array_key_exists($user_name, $series)){
	$result = $re->getRecommendations($series, "Chondrima");
	//print_r($result);
	$arrayKeys = array_keys($result);
	$english_list_of_rate = array();

	for($i=0; $i<sizeOf($result);$i++){
		$english_list_of_rate[$i] = $arrayKeys[$i];
	}
}	
	//print_r($english_list_of_rate);
if(isset($english_list) && isset($english_list_of_rate)){
	$output = array_merge( $english_list_of_rate, $english_list);
	$final_list = array_values(array_unique($output));
	//print_r($output)."<br>";
} else if(isset($english_list) && !isset($english_list_of_rate)){
	$final_list = $english_list;
} else if(!isset($english_list) && isset($english_list_of_rate)){
	$final_list = $english_list_of_rate;
}
//print_r(sizeOf($final_list));

// search id from json file and store info
$file = "english_channel_list.json";
$jsonStr = file_get_contents($file);
$array = json_decode($jsonStr);
$id = array();
$title = array();
$poster = array();
$cast = array();
if(isset($final_list)){
	for($i=0;$i<sizeOf($final_list);$i++){
	foreach($array as $key => $val){
	if($val->imdbId == $final_list[$i]){
		$id[$i] = $val->imdbId;
		$channel[$i] = $val->channel;
		}
	}
}
}

?>