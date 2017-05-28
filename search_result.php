<!doctype html>
<html lang="en">
	<head>
		<title>TV Show Recommendation</title>
		<meta charset="utf-8"> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
		<link rel="stylesheet" href="css/bootstrap.min.css"> 
		<script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/search.css">
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
	$title = $_POST['search'];
	$lang = $_POST['search_lang'];
	
	// bengali show search
	if($lang == "Bengali"){ 
		$file = "bangla_channel_list.json";
		$jsonStr = file_get_contents($file);
		$array = json_decode($jsonStr);
		foreach($array as $key => $val){
			if($val->title == $title){
		?>
<div class='container' id="main">
	<div class="channel_list">
		<div class="image_content">
			<a title="<?php echo $val->title;?>" alt="<?php echo $val->title;?>">
				<img src="<?php echo $val->poster;?>" class="poster"/>
			</a>
		</div>
		<div class="info">
			<p id='title'><a href="ben_show_detail.php?id=<?php echo $val->id;?>"><?php echo $val->title;?></a></p>
			<div id="actor">
			<p><span class="actor">Actors: </span><?php echo $val->cast;?></p>
		</div>
		</div>
		
	</div>
</div>	
<?php } } } 	

// hindi  show search
	if($lang == "Hindi"){ 
		$file = "hindi_channel_list.json";
		$jsonStr = file_get_contents($file);
		$array = json_decode($jsonStr);
		foreach($array as $key => $val){
			if($val->title == $title){
		?>
<div class='container' id="main">
	<div class="channel_list">
		<div class="image_content">
			<a title="<?php echo $val->title;?>" alt="<?php echo $val->title;?>">
				<img src="<?php echo $val->poster;?>" class="poster"/>
			</a>
		</div>
		<div class="info">
			<p id='title'><a href="ben_show_detail.php?id=<?php echo $val->id;?>"><?php echo $val->title;?></a></p>
			<div id="actor">
			<p><span class="actor">Actors: </span><?php echo $val->cast;?></p>
		</div>
		</div>
		
	</div>
</div>	
<?php } else { echo "No result found!"; } } } 

//English show search
	if($lang == "English"){ 
		$current_title = preg_replace('/\s+/', '+', $title);
		//search through api.myapifilms.com/tvdb
		$search_tvShow_list = file_get_contents('https://www.omdbapi.com/?t='.$current_title.'&type=series&y=&plot=full&r=json');
		$id = json_decode($search_tvShow_list, TRUE);
	
	if($id['Response']=="False"){
		echo "<p style='margin-top:80px;text-align:center;'>No result found!</p>";
	} else {
	$get_tmdb_id = file_get_contents('https://api.themoviedb.org/3/find/'.$id['imdbID'].'?api_key=2f13f07242bf72239c2dd119a7f302ee&language=en-US&external_source=imdb_id');
	$data = json_decode($get_tmdb_id, TRUE);
	if($id['Poster']=="N/A") {
		$id['Poster'] = "https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQInHTb4ubOYQUj2MdqzsRBGDOu8QgA46y-D4PZNTyAo6HkZbiM";
		}
	}
?>

<div class='container' id='main' style="margin-top:80px;">
	<div class='show_wrap'>
		<div id='1' class='show_list'>
			<div class='poster'>
				<img src='<?php echo $id['Poster'];;?>' class="img_zoom" alt=""/>
			</div>
			<div class="info_wrap">
			<?php if(empty($data['tv_results'])){ ?>
				<div><a href="series_detail.php?id_imdb=<?php echo $id['imdbID'];?>" class='title'> <?php echo $id['Title'];?></a></div><?php } else { ?>
				<div><a href="series_detail.php?id_imdb=<?php echo $id['imdbID'];?>&id_tmdb=<?php echo $data['tv_results'][0]['id'];?>" class='title'> <?php echo $id['Title'];?></a></div>
				<?php } ?>
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
</div>
<?php } ?>

	
<div id="loading">
</div>
<script>
$("#home").click(function() {
				$('#loading').show();
                $("window").load(function(){
				$('#loading').hide();
            });
			});
</script>
</body>
</html>