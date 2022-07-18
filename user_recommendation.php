<?php
$link=mysqli_connect ("localhost","root","");
mysqli_select_db($link,"artgallery");

if(isset($_GET['flag'])){
  $flag = $_GET['flag'];
}
else{
	$flag = 0;
}

include("recommendation.php");
session_start();

if(!isset($_SESSION['Username'])){
  header("Location: index.html");
  exit();
}
$Username = $_SESSION['Username'];

$cats = mysqli_query($link,"SELECT * FROM views");
$matrix = array();

while ($cat = mysqli_fetch_array($cats)) {
	$matrix[$cat['username']][$cat['category']] = $cat['views'];
}

$recommend = array();

$recommend = getRecommendation($matrix,$Username);

//echo reset($recommend);
//echo key($recommend);

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
 <?php

if ($flag == 0) {

 ?>
 <h3>Showing Recommended arts on basis of latest uploaded arts is our art gallery. To view recommended arts on basis of favourites <a href="user_recommendation.php?flag=1">click here</a>.</h3>
 
 	
 	<?php 

 	foreach ($recommend as $cat => $views) {

 		?>
 		<marquee behavior = "alternate" bgcolor = "black">Recommended arts from <?php echo $cat; ?> category.</marquee>
 		<div class="container">
 		<?php

 		$res = mysqli_query($link,"SELECT * FROM arts WHERE Arts_category='$cat' ORDER BY insert_date DESC LIMIT 2");
 		while($row=mysqli_fetch_array($res))
 		{
 	?>

	<div class="box">
		<img src="<?php echo $image= $row["Arts_image"];?>">
		<p>Recommended for you from <?php echo $row["Arts_category"]; ?> category on basis of date.</p>
		<a href="view.php?id=<?php echo $row["Arts_id"]; ?>" class="button">View</a>
	</div>

	<?php
	}
	?>
	</div>
	<?php
  } 
}
else{

	?>

	<h3>Showing Recommended arts on basis of favourite arts is our art gallery. To view recommended arts on basis of latest uploaded arts <a href="user_recommendation.php?flag=0">click here</a>.</h3>

	<?php

	foreach ($recommend as $cat => $views) {

 		?>
 		<marquee behavior = "alternate" bgcolor = "black">Recommended arts from <?php echo $cat; ?> category.</marquee>
 		<div class="container">
 		<?php
	$fav = mysqli_query($link,"SELECT * FROM arts WHERE Arts_category='$cat' ORDER BY Fav_count DESC LIMIT 2");
	while($row=mysqli_fetch_array($fav))
 		{
 	?>

 	<div class="box">
		<img src="<?php echo $image= $row["Arts_image"];?>">
		<p>Recommended for you from <?php echo $row["Arts_category"]; ?> category on basis of favourites.</p>
		<a href="view.php?id=<?php echo $row["Arts_id"]; ?>" class="button">View</a>
	</div>

 	<?php
    }
    ?>
    </div>
    <?php
  }
}
?>

</body> 
</html>
<script>
	let back = document.getElementById('back');
	back.addEventListener('click',backClicked);
	function backClicked(){
		window.history.back();
	}
</script>