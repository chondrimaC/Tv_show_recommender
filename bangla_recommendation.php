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
	$query2 = $row['query2'];
	$sql = mysql_query("select * from bangla_list m inner join bangla_show_genre r on m.show_id = r.show_id where r.genre = '$query1' OR r.genre = '$query2'");
	if(mysql_num_rows($sql) > 0){
		$bangla_list = array();
		while($id = mysql_fetch_assoc($sql)) {
		$bangla_list[] = $id['show_id'];
}
		//print_r($bangla_list);
	}
}

// for rating
require_once("recommend_algo.php");
	$filetxt = 'bangla_rating.json';
	$jsondata = file_get_contents($filetxt);
	$arr_data = json_decode($jsondata, true);
	$series = $arr_data;
	
$re = new Recommend();
if(array_key_exists($user_name, $series)){
	$result = $re->getRecommendations($series, $user_name);
	//print_r($result);
	$arrayKeys = array_keys($result);
	$bangla_list_of_rate = array();
	//$rating = array();

	for($i=0; $i<sizeOf($result);$i++){
		$bangla_list_of_rate[$i] = $arrayKeys[$i];
		//$rating[$i] = $result[$arrayKeys[$i]];
	}
}	
	//print_r($rating);
	//print_r($bangla_list_of_rate);
if(isset($bangla_list) && isset($bangla_list_of_rate)){
	$output = array_merge($bangla_list_of_rate, $bangla_list);
	$final_list = array_values(array_unique($output));
	//print_r($output)."<br>";
} else if(isset($bangla_list) && !isset($bangla_list_of_rate)){
	$final_list = $bangla_list;
} else if(!isset($bangla_list) && isset($bangla_list_of_rate)){
	$final_list = $bangla_list_of_rate;
}

//print_r(sizeOf($final_list));

// search id from json file and store info

$file = "bangla_channel_list.json";
$jsonStr = file_get_contents($file);
$array = json_decode($jsonStr);
$id = array();
$title = array();
$poster = array();
$channel = array(); 
if(isset($final_list)){
	for($i=0;$i<sizeOf($final_list);$i++){
	foreach($array as $key => $val){
		if($val->id == $final_list[$i]){
			$id[$i] = $val->id;
			$title[$i] = $val->title;
			$poster[$i] = $val->poster;
			$channel[$i] = $val->channel;
		}
	}
}
}
?>