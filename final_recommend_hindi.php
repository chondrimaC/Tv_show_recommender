<!DOCTYPE html>
<html lang="en">
<head>
	<title>TV Show Recommendation</title>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
	<link rel="stylesheet" href="css/bootstrap.min.css"> 
	<script src="js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Noto+Serif" rel="stylesheet">
	<link rel="stylesheet" href="css/final_recommend.css">
	<style>
		body{ background-image: url('http://localhost/Final_Project/OMDB_api/images/cropped-1366-768-509099.jpg');
				background-size: 1366px 1000px;}
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
					<li><a href="final_recommend_hindi.php" id="home">Recommendation</a></li>
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
<div class="container" id="main">
		<div class="col-sm-3" style="background-color:#F1F1F1;" id="quiz">
			<h4 id="top_questn">Please answer the following questions so that we can improve recommendation.</h4>
			<form method="POST" id="myform">
				<div class="form-group" id="1st_questn">
					<p>&#8226; Enter your full name:</p>
					<input type="text" class="form-control" id="usr" name="full_name" required>
				</div>
				<div class="form-group">
					<p>&#8226; What type of tv show do u like?</p>
					<div class="col-sm-12" style="margin-top:-5px;">
							<div class="col-sm-4">
								<div class="radio">
									<input type="radio" name="type" value="1">Drama
								</div>
							</div>	
							<div class="col-sm-4">
								<div class="radio">
									<input type="radio" name="type" value="10">Animation
								</div>
							</div>
							<div class="col-sm-4">
								<div class="radio">
									<input type="radio" name="type" value="8">Documentary
								</div>
							</div>
					</div>
				</div>				
				<div class="form-group" style="margin-top:-15px;">
				<p style="margin-top:80px;">&#8226; What kind of drama do u like?</p>
					<div class="col-sm-12" style="margin-top:-5px;margin-bottom:15px;">
							<div class="col-sm-4">
								<div class="radio">
									<input type="radio" name="genre" value="2">Comedy
								</div>
								<div class="radio">
									<input type="radio" name="genre" value="3">Romance
								</div>
								<div class="radio">
									<input type="radio" name="genre" value="4">Family
								</div>	
							</div>	
							<div class="col-sm-4">
								<div class="radio">
									<input type="radio" name="genre" value="5">Thriller
								</div>
								<div class="radio">
									<input type="radio" name="genre" value="6">Reality
								</div>
								<div class="radio">
									<input type="radio" name="genre" value="8">Fantasy
								</div>
							</div>
							<div class="col-sm-4">
								<div class="radio">
									<input type="radio" name="genre" value="9">Crime
								</div>
								
								<div class="radio">
									<input type="radio" name="genre" value="10">Action
								</div>
							</div>
					</div>
				</div>					
				<div class="form-group">
					<p style="margin-top:20px">&#8226; Which Bengali tv show you liked most?</p>
						<select class="form-control" id="sel1" name="ben_show">
						<option value="s1">মন থেকে দূরে নয়</option> <option value="s2">ক্রাইম পেট্রল একটি সত্য ঘটনা</option> <option value="s3">দহন</option> 
						<option value="s4">নীড় খোঁজে গাঙচিল</option> <option value="s5">রাজু ৪২০</option> <option value="s6">Bohubrihi</option> 
						<option value="s7">Kothao Keu Nei</option> <option value="s8">Aaj Robibar</option> <option value="s9">Bishaash</option> 
						<option value="s10">Badol Diner Prothom Kodom Ful</option> <option value="s11">দক্ষিণায়নের দিন</option> <option value="s12">অচেনা প্রতিবিম্ব</option>
						<option value="s13">তরুণ তুর্কি</option> <option value="s14">PITA</option> <option value="s15">BENE BOU</option>
						<option value="s16">Ki Kore Toke Bolbo</option> <option value="s17">Motu Patlu</option> <option value="s18">Dashi</option>
						<option value="s19">Dweep Jwele Jai</option> <option value="s20">STREE</option> <option value="s21">BHUTU</option>
						<option value="s22">RAADHA</option> <option value="s23">Dadagiri Unlimited</option> <option value="s24">Ichche Nodee</option>
						<option value="s25">Khokababu</option> <option value="s26">Rakhi Bandhan</option> <option value="s27">Potol Kumar Gaanwala</option> 						
						<option value="s28">GOPAL BHAR</option> <option value="s29">NUT BOLTU</option> <option value="s30">Alif Laila</option> <option value="s31">Mirakkel</option> <option value="s32">BANTUL THE GREAT</option> 						


						</select>	
				</div>
				<div class="form-group">
					<p style="margin-top:20px">&#8226; Which Hindi tv show you liked most?</p>
						<select class="form-control" id="sel1" name="hin_show">
						<option value="h1">Ye Hai Mohabbatein</option> <option value="h2">Naamkarann</option value="h3"> <option>Ishqbaaaz</option> 
						<option value="h4">Pardes Mein Hai Mera Dil</option> <option value="h5">Meri Durga</option> <option value="h6">Shakti — Astitva Ke 	Ehsaas Ki</option> 
						<option value="h7">Kasam</option> <option value="h8">UDAAN</option> <option value="h9">Devanshi</option> 
						<option value="h10">Ek Shringaar-Swabhiman</option> <option value="h11">Crime Patrol</option> <option value="h12">Beyhadh</option>
						<option value="h13">Ek Rishta Saajhedari Ka</option> <option value="h14">Peshwa Bajirao</option> <option value="h15">Kuch Rang Pyar Ke Aise Bhi</option>
						<option value="h16">Savdhaan India</option> <option value="h17">Har Mard Ka Dard</option> <option value="h18">Ghulaam</option>
						<option value="h19">Sanyukt</option> <option value="h20">Kumkum Bhagya</option> <option value="h21">Kaala Teeka</option>
						</select>	
				</div>
				<div class="form-group">
					<p style="margin-top:20px">&#8226; Which English tv show you liked most?</p>
						<select class="form-control" id="sel1" name="eng_show">
						<option value="tt0455275">Prison Break</option> <option value="tt1796960">Homeland</option> <option value="tt0369179">Two and a Half Men</option> 
						<option value="tt0320037">Jimmy Kimmel Live!</option> <option value="tt4428122">Quantico</option> <option value="tt0445883">Koffee with Karan</option> 
						<option value="tt4094300">Crazy Ex-Girlfriend</option> <option value="tt3205802">How to Get Away with Murder</option> <option value="tt1442437">Modern Family</option> 
						<option value="tt2741602">The Blacklist</option> <option value="tt0773262">Dexter</option> <option value="tt1475582">Sherlock</option>
						<option value="tt0460681">Supernatural</option> <option value="tt2191671">Elementary</option> <option value="tt0218787">Ripley's Believe It or Not</option>
						<option value="tt0096697">The Simpsons</option> <option value="tt0944947">Game of Thrones</option> <option value="tt0452046">Criminal Minds</option>
						<option value="tt2712740">The Goldbergs</option> <option value="tt1844624">American Horror Story</option> <option value="tt4052886">Lucifer</option>
						<option value="tt3107288">The Flash</option> <option value="tt2193021">Arrow</option> <option value="tt4532368">Legends of Tomorrow</option>
						<option value="tt3501584">iZombie</option> <option value="tt0182576">Family Guy</option> <option value="tt3228904">Empire</option>
						<option value="tt3749900">Gotham</option> <option value="tt1826940">New Girl</option> <option value="tt4798814">Son of Zorn</option>
						<option value="tt5345490">24: Legacy</option> <option value="tt1520211">The Walking Dead</option> <option value="tt0106179">The X-Files</option>
						<option value="tt0412142">House</option> <option value="tt0303461">Firefly</option> <option value="tt0436992">Doctor Who</option>
						<option value="tt1856010">House of Cards</option> <option value="tt1188927">Criminal Justice</option> <option value="tt2442560">Peaky Blinders</option>
						<option value="tt3636060">Poldark</option> <option value="tt2306299">Vikings</option> <option value="tt2245988">The Bible</option>
						<option value="tt5807292">Barbarians Rising</option> <option value="tt0413573">Grey's Anatomy</option> <option value="tt1843230">Once Upon a Time</option>
						<option value="tt2364582">Agents of S.H.I.E.L.D.</option> <option value="tt3475734">Agent Carter</option> <option value="tt1219024">Castle</option>
						<option value="tt0411008">Lost</option> <option value="tt0118276">Buffy the Vampire Slayer</option> <option value="tt0279600">Smallville</option>
						<option value="tt0343314">Teen Titans</option>

						</select>	
				</div>
				<button type="submit" class="btn btn-default" style="margin-bottom:50px">Submit</button>
			</form>	
		</div>
    <div class="col-sm-9" id="show_list"> <!--style="background-color:lavenderblush;"-->
		<?php
			include 'hindi_recommendation.php';
		?>
		<div class='container-fluid'>
		<div class="lang_link">
			<a href="final_recommend_bangla.php" class="btn btn-default" role="button">Bengali</a>
			<a href="final_recommend_hindi.php" class="btn btn-primary" role="button">Hindi</a>
			<a href="final_recommend_english.php" class="btn btn-default" role="button" id="eng_chan">English</a>
		</div>
		<?php 
			if(!( mysql_num_rows($get_answer) > 0) && !array_key_exists($user_name, $series)){
			echo "Please answer the questions on the left and also provide some ratings to the show you have watched.";
		}
		?>
		<div class="selector"><span id="selector">How many recommendation do you want: </span><select onChange="jsfunction(this.value)">
				<option value="0"><?php echo $_COOKIE['length']; ?></option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
			</select>
		</div>	
		<h1 id='channel_name'>Recommendation for you</h1>
		<?php
		if(!isset($_COOKIE['length'])) {
			setcookie('length', '10');
			$_COOKIE['length'] = '10';
		}
		if(isset($final_list)){
		for($i=0;$i<$_COOKIE['length'];$i++){ 
			if($i >= sizeOf($final_list)) {	break; }
		?>
			<div class="channel_list">
				<div class="image_content">
					<a title="<?php echo $title[$i];?>" alt="<?php echo $title[$i];?>">
						<img src="<?php echo $poster[$i];?>" class="poster"/>
					</a>
			</div>
			<div class="info">
				<p id='title'><a href="hin_show_detail.php?id=<?php echo $id[$i];?>" ><?php echo $title[$i];?></a></p>
				<?php 
				if(isset($result)){
				if(array_key_exists($final_list[$i], $result)) {?>
							<p id="predict_rating"><span class="predict_rating">Prediction for you: </span><?php echo number_format($result[$arrayKeys[$i]], 2, '.', ',');?>&nbsp;<span class='glyphicon glyphicon-star'></span></p>
					<?php }} ?>
			<p id="channel"><span class="channel">Channel: </span><span style="color:#167ac6;"><?php echo $channel[$i];?></span></p>
			</div>
		</div>
	<?php } } ?>	
		</div>
	</div>
</div>
<div id="loading">
</div>
<script>
			$("#eng_chan").click(function() {
				$('#loading').show();
                $("window").load(function(){
				$('#loading').hide();
            });
			});
			function jsfunction(value){
				document.cookie = "length=" + value + "; expires=Fri, 18 Dec 2020 12:00:00 UTC;path=/Final_Project/OMDB_api/;";
				window.location = './final_recommend_hindi.php';
				console.log("function called : "+value);
			}
			$("#myform").submit(function(e) {

				var url = "quiz_check.php"; // the script where you handle the form input.

				$.ajax({
					   type: "POST",
					   url: url,
					   data: $("#myform").serialize(), // serializes the form's elements.
					   success: function(data)
					   {
						   //alert(data); // show response from the php script.
						   window.location = './final_recommend_hindi.php';
					   }
					 });

				e.preventDefault(); // avoid to execute the actual submit of the form.
		});
</script>	
</script>
</body>
</html>	