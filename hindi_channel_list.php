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
	<link href="https://fonts.googleapis.com/css?family=Noto+Serif" rel="stylesheet">
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
	$file = "hindi_channel_list.json";
	$file_content = file_get_contents($file);
	$data = json_decode($file_content,true);
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
		<a href="bangla_channel_list.php" class="btn btn-default" role="button">Bengali</a>
		<a href="hindi_channel_list.php" class="btn btn-primary" role="button">Hindi</a>
		<a href="english_channel_list.php" class="btn btn-default" role="button" id="eng_chan">English</a>
	</div>
	 <!--<h1 id="top">Popular Channels</h1> -->
<h1 id='channel_plus'>&#8226; Star Plus</h1>
<?php
	for($i=0;$i<5;$i++){ ?>
<div class="channel_list">
	<div class="image_content">
        <a title="<?php echo $data[$i]['title'];?>" alt="<?php echo $data[$i]['title'];?>">
			<img src="<?php echo $data[$i]['poster'];?>" class="poster"/>
		</a>
    </div>
	<div class="info">
		<p id='title'><a href="hin_show_detail.php?id=<?php echo $data[$i]['id'];?>" ><?php echo $data[$i]['title'];?></a></p>
		<div id="actor">
		<p><span class="actor">Actors: </span><?php echo $data[$i]['cast'];?></p>
	</div>
	</div>
	
</div>
<?php } ?>	

	<h1 id='channel_colors'>&#8226; Colors</h1>
<?php
	for($i=5;$i<10;$i++){ ?>
<div class="channel_list">
	<div class="image_content">
        <a title="<?php echo $data[$i]['title'];?>" alt="<?php echo $data[$i]['title'];?>">
			<img src="<?php echo $data[$i]['poster'];?>" class="poster"/>
		</a>
    </div>
	<div class="info">
		<p id='title'><a href="hin_show_detail.php?id=<?php echo $data[$i]['id'];?>" ><?php echo $data[$i]['title'];?></a></p>
		<div id="actor">
		<p><span class="actor">Actors: </span><?php echo $data[$i]['cast'];?></p>
	</div>
	</div>
	
</div>
<?php } ?>	

	<h1 id='channel_sony'>&#8226; Sony TV</h1>
<?php
	for($i=10;$i<15;$i++){ ?>
<div class="channel_list">
	<div class="image_content">
        <a title="<?php echo $data[$i]['title'];?>" alt="<?php echo $data[$i]['title'];?>">
			<img src="<?php echo $data[$i]['poster'];?>" class="poster"/>
		</a>
    </div>
	<div class="info">
		<p id='title'><a href="hin_show_detail.php?id=<?php echo $data[$i]['id'];?>" ><?php echo $data[$i]['title'];?></a></p>
		<div id="actor">
		<p><span class="actor">Actors: </span><?php echo $data[$i]['cast'];?></p>
	</div>
	</div>
	
</div>
<?php } ?>	

	<h1 id='channel_life'>&#8226; Life Ok</h1>
<?php
	for($i=15;$i<18;$i++){ ?>
<div class="channel_list">
	<div class="image_content">
        <a title="<?php echo $data[$i]['title'];?>" alt="<?php echo $data[$i]['title'];?>">
			<img src="<?php echo $data[$i]['poster'];?>" class="poster"/>
		</a>
    </div>
	<div class="info">
		<p id='title'><a href="hin_show_detail.php?id=<?php echo $data[$i]['id'];?>" ><?php echo $data[$i]['title'];?></a></p>
		<div id="actor">
		<p><span class="actor">Actors: </span><?php echo $data[$i]['cast'];?></p>
	</div>
	</div>
	
</div>
<?php } ?>	

	<h1 id='channel_zee'>&#8226; Zee TV</h1>
<?php
	for($i=18;$i<21;$i++){ ?>
<div class="channel_list">
	<div class="image_content">
        <a title="<?php echo $data[$i]['title'];?>" alt="<?php echo $data[$i]['title'];?>">
			<img src="<?php echo $data[$i]['poster'];?>" class="poster"/>
		</a>
    </div>
	<div class="info">
		<p id='title'><a href="hin_show_detail.php?id=<?php echo $data[$i]['id'];?>" ><?php echo $data[$i]['title'];?></a></p>
		<div id="actor">
		<p><span class="actor">Actors: </span><?php echo $data[$i]['cast'];?></p>
	</div>
	</div>
	
</div>
<?php } ?>	
</div>
<div id="loading">
</div>	
<script>
			$("#rated").click(function() {
				$('#loading').show();
                $("window").load(function(){
				$('#loading').hide();
            });
			});
			$("#popular").click(function() {
				$('#loading').show();
                $("window").load(function(){
				$('#loading').hide();
            });
			});
			$("#eng_chan").click(function() {
				$('#loading').show();
                $("window").load(function(){
				$('#loading').hide();
            });
			});
</script>			
</body>
</html>	