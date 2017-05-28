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
<?php if( isset($_COOKIE['username'])): 
  header("Location: http://localhost/Final_Project/OMDB_api/bangla_channel_list.php");?>
<?php else: ?>
<header>
	<nav id="header-nav" class="navbar navbar-default">
		<div class="container-fluid">
				<a class="navbar-brand" href="login.php">Non-commercial TV Show recommendations. See what's next</a>
			</div>
		</div>
	</nav>
</header>
<div class="wrapper">
	<h1>Sign In</h1><br>
	<form class="form" id="idForm" method="POST" action="log_check.php">
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
		<input type="submit" class="submit" value="Sign in">
	</form><br>
	
	<a href="fbconfig.php" id="facebook">Login with Facebook</a><br><br>

	<a href="index.php" class="login">Register</a><br>
</div>
<script type="text/javascript" src="js/reg_form.js"></script>
    <?php endif ?>
</body>
</html> 