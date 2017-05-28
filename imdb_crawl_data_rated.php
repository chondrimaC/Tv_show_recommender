<?php
error_reporting(E_ERROR | E_PARSE);

//getting all the top rated tv show names of page 1
$page = $_COOKIE['page'];
if($page==null){
	echo "
            <script type=\"text/javascript\">
            document.cookie='page=1; path=/';
            </script>
        ";
		$page = $_COOKIE['page'];
}
//$page = 2;
$page1_tvShow_list = file_get_contents('http://api.themoviedb.org/3/tv/top_rated?api_key=2f13f07242bf72239c2dd119a7f302ee&page='.$page);
//decoding the recorded json response from tmdb api
$data = json_decode($page1_tvShow_list, TRUE);
	$ID_imdb = array();
	$ID_tmdb = array();
	$name = array();
	$year = array();
	$runtime = array();
	$genre = array();
	$rating = array();
	$poster = array();
	$released = array();
	$imdbVotes = array();
	$writer = array();
//looping for get the name of each tv show
for($i=0;$i<10;$i++){
	//relacing the spaces of name with + sign as format requried for api validation
	$current_name = preg_replace('/\s+/', '+', $data['results'][$i]['name']);
	//calling the id through name from omdb api
	$id = file_get_contents('https://www.omdbapi.com/?t='.$current_name.'&type=series&y=&plot=full&r=json');
	//decoding the json format incoming from omdb api
	$id = json_decode($id, TRUE);
	
	if($id['Response']=="False"){
		$ID_imdb[$i] = "N/A";
		$name[$i] = "N/A";
		$poster[$i] = "https://cdn3.iconfinder.com/data/icons/monosign/142/delete-128.png";
		$year[$i] = "N/A";
		$runtime[$i] = "N/A";
		$genre[$i] = "N/A";
		$rating[$i] = "N/A";
		$released[$i] = "N/A";
		$imdbVotes[$i] = "N/A";
		$writer[$i] = "N/A";
	}
	else{
		$ID_imdb[$i] = $id['imdbID'];
		$ID_tmdb[$i] = $data['results'][$i]['id'];
		$name[$i] = $data['results'][$i]['name'];
		$poster[$i] = $id['Poster'];
		$year[$i] = $id['Year']; 
		$runtime[$i] = $id['Runtime'];
		$genre[$i] = $id['Genre']; 
		$rating[$i] = $id['imdbRating'];
		$released[$i] = $id['Released']; 
		$imdbVotes[$i] = $id['imdbVotes'];
		$writer[$i] = $id['Writer']; 
		if($id['Poster']=="N/A") {
		$poster[$i] = "https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQInHTb4ubOYQUj2MdqzsRBGDOu8QgA46y-D4PZNTyAo6HkZbiM";
	}
	}
	
}
?>