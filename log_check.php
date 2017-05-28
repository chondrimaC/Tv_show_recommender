<?php
	$con = mysql_connect("localhost","root","");
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }
	mysql_select_db("recommender_system", $con);
	$user_name = $_POST["user_name"];
	$password = $_POST['pass'];
	$result = mysql_query("SELECT * FROM registration WHERE Username = '$user_name' and Password='$password'");
	$row = mysql_fetch_assoc($result);
	if(($user_name === $row['Username']) && ($password === $row['Password'])){
		setcookie("nameORid", $user_name, 2147483647);
		setcookie("username", $user_name, 2147483647);
		header("location:bangla_channel_list.php");
	} else {
		header("location:login.php");
	}
?>
