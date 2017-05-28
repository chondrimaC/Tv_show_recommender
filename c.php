<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	<link rel="stylesheet" href="css/form_style.css">

</head>
<body>
<?php
	$title = $_POST['search'];
	$lang = $_POST['search_lang'];
	if($lang == "Bengali"){ 
		$file = "bangla_channel_list.json";
		$jsonStr = file_get_contents($file);
		$array = json_decode($jsonStr);
		foreach($array as $key => $val){
			if($val->title == $title){
		?>
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
<?php } } } ?>	
	
</body>	
</html>	