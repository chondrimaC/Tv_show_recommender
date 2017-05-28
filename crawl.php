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
		background: url('images/grey.gif') 50% 50% no-repeat rgb(249,249,249); }
	</style>
</head>
<body>
<div id="overlay">
     <img src="images/grey.gif" alt="Loading" />
     Loading...
</div>
<script type="text/javascript">
  document.cookie="page=1;expires=Fri, 18 Dec 2020 12:00:00 UTC; path=/";
  var display="first";
</script>
<header>
	<nav id="header-nav" class="navbar navbar-default navbar-fixed-top">
		<div class="container" >
			<div class="navbar-header">
				<form class="navbar-form navbar-left" role="search" action="search_result.php" method="POST">
				<div class="form-group">
					<input type="text" class="form-control" id="search" placeholder="Search" name="search">
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
				</form>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon glyphicon-user" style="color:#FFFBF0"></span>&nbsp;<?php //echo $_COOKIE['username'];?> <span class="caret"></span></a>
				  <ul class="dropdown-menu">
					<li><a href="logout.php" id="sign_out">Sign Out</a></li>
				  </ul>
				</li>			
			</ul> 
		</div>
	</nav>
</header>
<div class='container'>
	<h1 id='top'>Top picks</h1>
</div>
<div class='container' id='main'>
<?php
$page = $_COOKIE['page'];
$page1_tvShow_list = file_get_contents('http://api.themoviedb.org/3/tv/popular?api_key=2f13f07242bf72239c2dd119a7f302ee&page='.$page);
//decoding the recorded json response from tmdb api
$data = json_decode($page1_tvShow_list, TRUE);
if("
            <script type=\"text/javascript\">
            display='first';
            </script>
        "){
for($i=0;$i<10;$i++){
	//relacing the spaces of name with + sign as format requried for api validation
	$current_name = preg_replace('/\s+/', '+', $data['results'][$i]['name']);
	//calling the id through name from omdb api
	$id = file_get_contents('https://www.omdbapi.com/?t='.$current_name.'&type=series&y=&plot=full&r=json');
	//decoding the json format incoming from omdb api
	$id = json_decode($id, TRUE); ?>
	<div class='show_wrap'>
		<div id='1' class='show_list'>
			<div class='poster'>
				<img src='<?php echo $id['Poster'];?>' class="img_zoom" alt=""/>
			</div>
			<div class="info_wrap">
				<div><a href="series_detail.php?id_imdb=<?php echo $id['imdbID'];?>&id_tmdb=<?php echo $data['results'][$i]['id'];?>" class='title'> <?php echo $data['results'][$i]['name'];?></a></div>
				<p id='writer'>Writer: <span class="writer"><?php echo $id['Writer'];?></span></p>
				<p id='rating'><span class='glyphicon glyphicon-star'></span>&nbsp;<?php echo $id['imdbRating'];?></p>
				<p id='year'>Year: <span class="year"> (<?php echo $id['Year'];?>)</span></p>
				<p id='runtime'>Runtime: <span class="runtime"><?php echo $id['Runtime'];?></span></p>
				<p id='released'>Released: <span class="released"><?php echo $id['Released'];?></span></p>
				<p id='imdbVotes'>IMDb Votes: <span class="imdbVotes"><?php echo $id['imdbVotes'];?></span></p>
				<p id='genre'>Genre: <span class="genre"> (<?php echo $id['Genre'];?>)</span></p>
			</div>
		</div>
	</div>
	<?php }echo "
            <script type=\"text/javascript\">
            var display='second';
            </script>
        "; }?>
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
	$(window).load(function(){
    $('#overlay').fadeOut();
});
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
            $("#next").click(function() {
				$('#loading').show();
				var value = getCookie("page");
				value = parseInt(value)+1;
				document.cookie="page="+value+"; path=/";
                $("#main").load("http://localhost/Final_Project/OMDB_api/crawl.php #main", function(){
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
                $("#main").load("http://localhost/Final_Project/OMDB_api/crawl.php #main", function(){
				$('#loading').hide();
            });
            });
		
</script>
</body>
</html>	