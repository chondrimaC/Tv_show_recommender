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
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Noto+Serif" rel="stylesheet">
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<link href="http://www.cssscript.com/wp-includes/css/sticky.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="css/ben_hin_detail.css">
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
		
	@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

fieldset, label { margin: 0; padding: 0; }

/****** Style Star Rating Widget *****/

.rating { 
  border: none;
  float: left;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating > label { 
  color: #ddd; 
 float: right; 
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  } 
	</style>
</head>
<body>
<header>
	<nav id="header-nav" class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
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
		// Retrieve the URL variables 
	$id = $_GET['id'];
	$file = "bangla_channel_list.json";
	$jsonStr = file_get_contents($file);
	$array = json_decode($jsonStr);
	foreach($array as $key => $val){
		if($val->id == $id){
?>

<div class="main_container">
	<div class="series_detail">
		<div class="image_content">
        	<a title="<?php echo $val->title;?>" alt="<?php echo $val->title;?>">
				<img src="<?php echo $val->poster;?>" class="poster"/>
			</a>
        </div>
		<div class="info_top">
        	<a class="title" title="<?php echo $val->title;?>" alt="<?php echo $val->title;?>"><?php echo $val->title;?></a>
			<div id="full_rating">
			<form>
				<fieldset class="rating">
					<input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
					<input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
					<input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
					<input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
					<input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
					<input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
					<input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
					<input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
					<input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
					<input type="radio" id="starhalf" name="rating" value=".5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
				</fieldset></span>
			</form>
			</div>
			<button onclick="window.open('<?php echo $val->video;?>')" class="trailer">Watch Video</button>	
			<div id="full_genre"><p id='genre'>Genre: <span class="genre"> <?php echo $val->genre; ?></span></p></div>
			<div id="full_chan"><p id='chan'>Channel: <span class="chan"> <?php echo $val->channel; ?></span></p></div>
			<div id="full_time"><p id="runtime">Time: <span class="runtime"><?php echo $val->time;?></span></p></div>	
			<div id="full_actor"><p id='actor'>Cast: <span class="actor"><?php echo $val->cast; ?></span> </p></div>
			<?php if(array_key_exists("director", $array[$key])) {?>
				<div id="full_dir"><p id='dir'>Director: <span class="dir"><?php echo $val->director; ?></span> </p></div>
			<?php } else if(array_key_exists("producer", $array[$key])) {?>	
				<div id="full_dir"><p id='dir'>Producer: <span class="dir"><?php echo $val->producer; ?></span> </p></div>
			<?php } ?>
        </div>
	</div>
</div>
<div class="container-fluid">
		<div class="info_bottom">
		<div class="series_plot"><p><?php echo $val->plot;?></p></div>
		</div>
	</div>
</div>
<?php } } ?>
<div id="loading">
</div>
<script>

$("#home").click(function() {
				$('#loading').show();
                $("window").load(function(){
				$('#loading').hide();
            });
			});
$('input[type=radio][name=rating]').on('change', function(){
var rate = $( 'input[name=rating]:checked' ).val();
var uid = "<?php echo $id;?>";
          $.ajax({
    url: "insert_ben_rating.php",
    type: "POST",
	data: { rating : rate, id : uid
},    
});
});
</script>	
</body>
</html>