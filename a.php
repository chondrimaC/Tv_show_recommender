<!doctype html>
<html>
	<head>

	</head>
<body>


<div>Select: <select class="selector" id="selector" onChange="jsfunction(this.value)">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
</select>
</div>	
<?php
		if(!isset($_COOKIE['length'])) {
			setcookie('length', '10');
			$_COOKIE['length'] = '10';
		}
		echo $_COOKIE['length'];
		for($i=0;$i<$_COOKIE['length'];$i++){ 
		echo "a";
		}
?>
		
<script type="text/javascript">
function jsfunction(value){
			
			document.cookie = "length=" + value + "; expires=Fri, 18 Dec 2020 12:00:00 UTC;path=/Final_Project/OMDB_api/;";
			window.location = './a.php';
			console.log("function called : "+value);
	}
</script>

</body>
</html>	