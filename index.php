<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("recommender_system", $con);
if(isset($_POST["user_name"]) && isset($_POST["pass"])){
	$user_name = $_POST["user_name"];
	$password = $_POST["pass"];
	$query = mysql_query("SELECT * FROM registration where Username='$user_name'");
	if(mysql_num_rows($query) > 0){
		echo "<script>alert('Username is already taken!');</script>";
	} else {
		if(preg_match('/\s/',$user_name)) {
		echo "<script>alert('Username cannot contain space!');</script>";
		} else {
		mysql_query("INSERT INTO registration (Username, Password) values('$user_name','$password')");
		//header("location:login.php");
		echo "<script>alert('Registration Complete');window.location = './login.php';</script>";
		}
	}
}
mysql_close($con);
?>

<!doctype html>
<html>
<head>
	<title>TV Show Recommendation</title>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
	<link rel="stylesheet" href="css/bootstrap.min.css"> 
	<script src="js/bootstrap.min.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/form_style.css">
	<style>
	form { margin-left: auto; margin-right: auto; }
	</style>	
</head>
<body>
<?php if(isset($_COOKIE['username'])): 
  header("Location: http://localhost/Final_Project/OMDB_api/bangla_channel_list.php");?>
<?php else: ?>
<header>
	<nav id="header-nav" class="navbar navbar-default">
		<div class="container-fluid">
				<a class="navbar-brand" href="index.php">Non-commercial TV Show recommendations. See what's next</a>
			</div>
		</div>
	</nav>
</header>

<div class="wrapper">
	<h1>Register For An Account</h1><br>
	<p>To sign-up for a free basic account please provide us with some basic information using the contact form below.</p>
	<form class="form" id="idForm" method="POST" action="index.php">
		<div>
		<input type="text" class="name" placeholder="Username" name="user_name" required>
		</div>
		<div>
		<p class="name-help">Please enter your username.</p>
		</div>
		<input type="password" class="pass" placeholder="Password" name="pass" required>
		<div>
		<p class="pass-help">Please enter your password.</p>
		</div>
		<input type="submit" class="submit" value="Register">
	</form><br>
	<a href="fbconfig.php" id="facebook">Login with Facebook</a><br><br>
	<a href="login.php" class="login">already a user? sign in here.</a></div>

<script type="text/javascript" src="js/reg_form.js"></script>
    <?php endif ?>

</body>
</html> 