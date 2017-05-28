<!DOCTYPE html>
<html lang="en">
<head>
	<title>TV Show Recommendation</title>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
	<link rel="stylesheet" href="css/bootstrap.min.css"> 
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/a.css">
	<style>
		body{ background-image: url('http://localhost/Final_Project/OMDB_api/images/cropped-1366-768-509099.jpg');
		background-size: 1366px 1000px;}
	</style>
</head>
<body>
<header>
	<nav id="header-nav" class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<form class="navbar-form navbar-left" role="search" action="c.php" method="POST">
				<div class="form-group">
					<select class="form-control" id="sel1" name="search_lang">
					<option>Bengali</option>
					<option>Hindi</option>
					<option>English</option>
					</select>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" id="search" placeholder="Search" name="search">
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
				</form>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="bangla_channel_list.php" id="home">Home</a></li>
					<li><a href="final_recommend_bangla.php" id="home">Recommendation</a></li>
					<li class="dropdown">
						  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon glyphicon-user" style="color:#FFFBF0"></span>&nbsp;<?php echo $_COOKIE['username'];?> <span class="caret"></span></a>
						  <ul class="dropdown-menu">
							<li><a href="logout.php" id="sign_out">Sign Out</a></li>
						  </ul>
						</li>	
				</ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
	</nav>
</header>
</body>
</html>	