<?php
$link=mysqli_connect ("localhost","root","");
mysqli_select_db($link,"artgallery");

session_start();

if(!isset($_SESSION['Username'])){
  header("Location: index.html");
  exit();
}
$Username = $_SESSION['Username'];


function xFactor($x, $y) {
	return ( $y[1]-$x[1] );
}

function match($u1, $u2) {
	global $link;

	$count = 0;

	$sql = "SELECT * FROM buy WHERE username='$u1'";
	$query = mysqli_query($link, $sql);
	while( $result = mysqli_fetch_assoc($query) ) {
		$Arts_id = $result['Arts_id'];

		$sql_1 = "SELECT * FROM buy WHERE username='$u2' AND Arts_id='$Arts_id'";
		$query_1 = mysqli_query($link, $sql_1);
		if( mysqli_num_rows($query_1) ) {
			$count++;
		}
	}

	return $count;
}

function similar($username) {
	global $link;

	$store = array();

	$sql = "SELECT DISTINCT username FROM buy";
	$query = mysqli_query($link, $sql);

	while( $result = mysqli_fetch_assoc($query) ) {

		if( $result['username']!=$username) {

			$count = match( $username, $result['username'] );
			if( $count ) {
				array_push( $store, array($result['username'], $count) );
			}
		}
	}

	usort($store, "xFactor");

	// print_r($store);

	if( empty($store) )
		return "NOTHING";
	else
		return $store[0][0];
}

$name = similar($Username);
// print( $name );

$sql = "SELECT * FROM buy WHERE username = '$Username'";
$query = mysqli_query($link, $sql);
 

$id1 = array();
while ( $result = mysqli_fetch_assoc($query) ) {

	$id1[] = $result['Arts_id'];

}

$id2 = array();
$sql_1 = "SELECT * FROM buy WHERE username = '$name'";
$query_1 = mysqli_query($link, $sql_1);

while ( $res = mysqli_fetch_assoc($query_1) ) {

	if (in_array ( $res['Arts_id'], $id1 )) {}
	else{

		$id2[] = $res['Arts_id'];
	}	
		
}
// print_r($id2);
$arrlen = count($id2);


?>

<!DOCTYPE html>
<html>
<head>
<title>RECOMMENDATION</title>
<meta name="viewreport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style_recommendation.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
<script type="text/javascript"></script>
</head>
<body>

	<header>
		<a id="back" class="square_btn">Back</a>
		<div class="box-with-text">
			RECOMMENDATION
		</div>
 </header>
 	
 		<marquee behavior = "alternate" bgcolor = "black">Recommended arts for you.</marquee>
 		<div class="container">
 		<?php

 		for ($i=0; $i < $arrlen ; $i++) {

 			$res = mysqli_query($link,"SELECT * FROM arts WHERE Arts_id = '$id2[$i]'");
 			while($row=mysqli_fetch_array($res))
 			{
 			?>

 			<div class="box">
			<img src="<?php echo $image= $row["Arts_image"];?>">
			<p>Recommended for you from <?php echo $row["Arts_category"]; ?> category.</p>
			<a href="view.php?id=<?php echo $row["Arts_id"]; ?>" class="button">View</a>
			</div>
			<?php
		}
		
  	} 
	?>
	</div>
	 <h2><center>Want to explore more?<br>Here is our latest collection and most liked arts in our art gallery.<br>Please <a href="user_recommendation.php?flag=0">Click here</a>.</center></h2>

</body> 
</html>
<script>
	let back = document.getElementById('back');
	back.addEventListener('click',backClicked);
	function backClicked(){
		window.history.back();
	}
</script>