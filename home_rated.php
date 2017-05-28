<?php
if(!isset($_COOKIE['username'])){
   header("location:login.php");
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>TV Show Recommendation</title>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
	<link rel="stylesheet" href="css/bootstrap.min.css"> 
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/styles.css">
	<style>
		#loading {
		display:none;
		position: fixed;
		left: 0px;
		top: 0px;
		width: 100%;
		height: 100%;
		z-index: 9999;
		background: url('images/load.gif') 50% 50% no-repeat rgb(249,249,249); }
	</style>
</head>
<body>
<script type="text/javascript">
  document.cookie="page=1;expires=Fri, 18 Dec 2020 12:00:00 UTC; path=/";
</script>
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
				<form class="navbar-form navbar-left" role="search" action="search_result.php" method="POST">
				<div class="form-group">
					<select class="form-control" id="search_lang" name="search_lang">
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
<div class='container'>
	<h1 id='top'>Top rated</h1>
	<div class="dropdown" id="sort">
		<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Sort By
		<span class="caret"></span></button>
		<ul class="dropdown-menu">
			<li><a href="bangla_channel_list.php" id="channel">Channel</a></li>
			<li class="active"><a href="#">Rating</a></li>
			<li><a href="home_popular.php" id="popular">Popularity</a></li>
		</ul>
	</div>
</div>
<div class='container' id='main'>
<?php
include 'imdb_crawl_data_rated.php';
?>
<?php for($i=0;$i<10;$i++){ ?>
	<div class='show_wrap'>
		<div id='1' class='show_list'>
			<div class='poster'>
				<img src='<?php echo $poster[$i];?>' class="img_zoom" alt=""/>
			</div>
			<div class="info_wrap">
				<div><a href="series_detail.php?id_imdb=<?php echo $ID_imdb[$i];?>&id_tmdb=<?php echo $ID_tmdb[$i];?>" class='title'> <?php echo $name[$i];?></a></div>
				<p id='writer'>Writer: <span class="writer"><?php echo $writer[$i];?></span></p>
				<p id='rating'><span class='glyphicon glyphicon-star'></span>&nbsp;<?php echo $rating[$i]?></p>
				<p id='year'>Year: <span class="year"> (<?php echo $year[$i];?>)</span></p>
				<p id='runtime'>Runtime: <span class="runtime"><?php echo $runtime[$i];?></span></p>
				<p id='released'>Released: <span class="released"><?php echo $released[$i];?></span></p>
				<p id='imdbVotes'>IMDb Votes: <span class="imdbVotes"><?php echo $imdbVotes[$i];?></span></p>
				<p id='genre'>Genre: <span class="genre"> (<?php echo $genre[$i];?>)</span></p>
			</div>
		</div>
	</div>
<?php } ?>
</div>
<div>
	<nav aria-label="...">
		<ul class="pager">
		<li><a href="#" id="previous">Previous</a</li>
		<li><a href="#" id="next">Next</a></li>
		</ul>
	</nav>
</div>
<div id="loading">
	<!--<img src="images/grey.gif"/>-->
</div>	
  <script>
	
		//$(document).ready(function() {
		function getCookie(c_name)
		{
			var i,x,y,ARRcookies=document.cookie.split(";");

			for (i=0;i<ARRcookies.length;i++)
			{
				x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
				y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
				x=x.replace(/^\s+|\s+$/g,"");
				if (x==c_name)
				{
					return unescape(y);
				}
			 }
		}
		    $("#popular").click(function() {
				$('#loading').show();
                $("#main").load(function(){
				$('#loading').hide();
            });
			});
			$("#channel").click(function() {
				$('#loading').show();
                $("window").load(function(){
				$('#loading').hide();
            });
			});

            $("#next").click(function() {
				$('#loading').show();
				var value = getCookie("page");
				value = parseInt(value)+1;
				document.cookie="page="+value+"; path=/";
                $("#main").load("http://localhost/Final_Project/OMDB_api/home_rated.php #main", function(){
				$('#loading').hide();
            });
			});
			 $("#previous").click(function() {
			    $('#loading').show();
				var value = getCookie("page");
				value = parseInt(value)-1;
				if(value == 0){
					value = 1;
				}
				document.cookie="page="+value+"; path=/";
                $("#main").load("http://localhost/Final_Project/OMDB_api/home_rated.php #main", function(){
				$('#loading').hide();
            });
            });
       // });
		
</script>
</body>
</html>