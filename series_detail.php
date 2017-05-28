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
	<link rel="stylesheet" href="css/series_detail_style.css">
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
<?php
		// Retrieve the URL variables 
	$num_imdb = $_GET['id_imdb'];
	if(isset($_GET['id_tmdb'])){
		$num_tmdb = $_GET['id_tmdb'];
		$data = file_get_contents('https://api.themoviedb.org/3/tv/'.$num_tmdb.'/videos?api_key=2f13f07242bf72239c2dd119a7f302ee');
		$data = json_decode($data, TRUE);
		if(empty($data['results'])){
		} else {
				$trailer = "https://www.youtube.com/watch?v=".$data['results'][0]['key'];
		}
	}
	$id = file_get_contents('https://www.omdbapi.com/?i='.$num_imdb.'&plot=full&r=json');
	$id = json_decode($id, TRUE);
	if($id['Poster']=="N/A") {
		$id['Poster'] = "https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQInHTb4ubOYQUj2MdqzsRBGDOu8QgA46y-D4PZNTyAo6HkZbiM";
	}
	$file = "english_channel_list.json";
	$jsonStr = file_get_contents($file);
	$array = json_decode($jsonStr);
?>

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

<div class="main_container">
	<div class="series_detail">
		<div class="image_content">
        	<a title="<?php echo $id['Title'];?>" alt="<?php echo $id['Title'];?>">
				<img src="<?php echo $id['Poster'];?>" class="poster"/>
			</a>
        </div>
		<div class="info_top">
        	<p class="year"><a class="title" title="<?php echo $id['Title'];?>" alt="<?php echo $id['Title'];?>"><?php echo $id['Title'];?></a>&nbsp;(<?php echo $id['Year'];?>)
			</p>
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
			<button onclick="window.open('<?php echo $trailer;?>')" class="trailer">Watch trailer</button>
			<div id="full_rateIMDB"><p id="rating">IMDb Rating: <span class="rate"><?php  echo $id['imdbRating'];?></span></p></div>
			<div id="full_vote"><p id="imdbVotes">IMDb Votes: <span class="imdbVotes"><?php echo $id['imdbVotes'];?>		   </span></p></div>	
			<div id="full_genre"><p id='genre'>Genre: <span class="genre"> <?php echo $id['Genre']; ?></span></p></div>
			<?php foreach($array as $key => $val){
					if($val->imdbId == $num_imdb){ ?>
			<div id="full_award"><p id='award'>Channel: <span class="award"><?php echo $val->channel; ?></span> </p></div>
			<div id="full_award"><p id='award'>Time: <span class="award"><?php echo $val->time; ?></span> </p></div>
			<?php } }?>
			<div id="full_actor"><p id='actor'>Cast: <span class="actor"><?php echo $id['Actors']; ?></span> </p></div>
			<div id="full_writer"><p id='writer'>Writer: <span class="writer"><?php echo $id['Writer']; ?></span> </p></div>
			<div id="full_award"><p id='award'>Awards: <span class="award"><?php echo $id['Awards']; ?></span> </p></div>
        </div>
	</div>
</div>
<div class="container-fluid">
	<div class="info_bottom">
		<div class="col-sm-7"><div class="series_plot"><p><?php echo $id['Plot'];?></p></div></div>
		<div class="col-sm-5"><div id="full_rated"><p id="rated">Rated: <span class="rated"><?php echo $id['Rated']; ?></span></p></div>	
					<div id="full_time"><p id="runtime">Runtime: <span class="runtime"><?php echo $id['Runtime'];?></span></p></div>	

			<div id="full_date"><p id="date">Released Date: <span class="date"><?php echo $id['Released']; ?></span></p></div>	
			<div id="full_country"><p id="country">Country: <span class="country"><?php echo $id['Country']; ?> </span></p></div>			 <div id="full_season"><p id="season">Total Seasons: <span class="season"><?php echo $id['totalSeasons']; ?> </span></p></div>		

			<div id="full_lang"><p id='lang'>Language: <span class="lang"><?php echo $id['Language'];?></span> </p></div>
		</div>
	</div>
</div>
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
var uid = "<?php echo $num_imdb;?>";
          $.ajax({
    url: "insert_eng_rating.php",
    type: "POST",
	data: { rating : rate, id : uid
},    
});
});
</script>	
</body>
</html>