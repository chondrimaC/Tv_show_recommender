<!DOCTYPE html>
<html lang="en">
<head>
	<title>TV Show Recommendation</title>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
	<link rel="stylesheet" href="css/bootstrap.min.css"> 
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/channel_list.css">
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
<?php
	$file = "english_channel_list.json";
	$file_content = file_get_contents($file);
	$data = json_decode($file_content,true);
	//echo $data[7]["title"];
?>
<div class='container' id="main">
	<div class="dropdown" id="sort">
		<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Sort By
		<span class="caret"></span></button>
		<ul class="dropdown-menu">
			<li class="active"><a href="#" id="channel">Channel</a></li>
			<li><a href="home_rated.php" id="rated">Rating</a></li>
			<li><a href="home_popular.php" id="popular">Popularity</a></li>
		</ul>
	</div><!---->
	<h1 id="top">Popular Channels</h1>

	<div class="lang_link">
		<a href="bangla_channel_list.php" class="btn btn-default" role="button" style="background-color:#F1F1F1;">Bengali</a>
		<a href="hindi_channel_list.php" class="btn btn-default" role="button" style="background-color:#F1F1F1;">Hindi</a>
		<a href="english_channel_list.php" class="btn btn-primary" role="button">English</a>
	</div>
	<div class="channel_link">
		<a href="english_channel_list.php" class="btn btn-default" role="button" id="world">Star World</a>
		<a href="english_channel_axn.php" class="btn btn-default" role="button" id="axn">AXN</a>
		<a href="english_channel_premiere.php" class="btn btn-default" role="button" id="premiere">Star World Premiere</a>
		<a href="english_channel_colors.php" class="btn btn-default" role="button" id="colors">Colors Infinity</a>
		<a href="english_channel_fox.php" class="btn btn-primary" role="button" id="fox">Fox</a>
		<a href="english_channel_bbc.php" class="btn btn-default" role="button" id="bbc">BBC</a>
		<a href="english_channel_history.php" class="btn btn-default" role="button" id="history">History</a>
		<a href="english_channel_abc.php" class="btn btn-default" role="button" id="abc">Abc</a>
		<a href="english_channel_wb.php" class="btn btn-default" role="button" id="wb">The WB</a>
	</div>
	<h1 id='channel_world'>Fox</h1>
<?php
	for($i=25;$i<35;$i++){ 
	$current_name = preg_replace('/\s+/', '+', $data[$i]['title']);
	$id = file_get_contents('https://www.omdbapi.com/?t='.$current_name.'&type=series&r=json');
	$id = json_decode($id, TRUE);
	if($id['Poster']=="N/A") {
		$id['Poster'] = "https://cdn3.iconfinder.com/data/icons/monosign/142/delete-128.png";
	}?>
<div class="channel_list">
	<div class="image_content">
        <a title="<?php echo $id['Title'];?>" alt="<?php echo $id['Title'];?>">
			<img src="<?php echo $id['Poster'];?>" class="poster"/>
		</a>
    </div>
	<div class="info">
		<p id='title'><a href=""><?php echo $id['Title'];?></a></p>
		<div id="actor">
		<p><span class="actor">Actors: </span><?php echo $id['Actors'];?></p>
	</div>
	</div>
</div>
<?php } ?>	
</div>
<div id="loading">
	<!--<img src="images/grey.gif"/>-->
</div>	
<script>
		$("#world").click(function() {
				$('#loading').show();
                $("window").load(function(){
				$('#loading').hide();
            });
			});  
			$("#axn").click(function() {
				$('#loading').show();
                $("window").load(function(){
				$('#loading').hide();
            });
			});  
			$("#premiere").click(function() {
				$('#loading').show();
                $("window").load(function(){
				$('#loading').hide();
            });
			});  
			$("#colors").click(function() {
				$('#loading').show();
                $("window").load(function(){
				$('#loading').hide();
            });
			});  
			$("#fox").click(function() {
				$('#loading').show();
                $("window").load(function(){
				$('#loading').hide();
            });
			});  
			$("#bbc").click(function() {
				$('#loading').show();
                $("window").load(function(){
				$('#loading').hide();
            });
			});  
			$("#history").click(function() {
				$('#loading').show();
                $("window").load(function(){
				$('#loading').hide();
            });
			});  
			$("#abc").click(function() {
				$('#loading').show();
                $("window").load(function(){
				$('#loading').hide();
            });
			}); 
		$("#wb").click(function() {
				$('#loading').show();
                $("window").load(function(){
				$('#loading').hide();
            });
			});  			
</script>  


</body>
</html>	