<!doctype html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php
$user_name = $_POST["user_name"];
$password = $_POST["pass"];
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("recommender_system", $con);
$sql = "INSERT INTO registration (Username, Password) values('$user_name','$password')";
mysql_query($sql);
echo "<script>alert('Registration Complete');window.location = './login.php';</script>";
mysql_close($con);
?>
</body>
</html>