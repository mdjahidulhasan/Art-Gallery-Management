<?php
$link=mysqli_connect ("localhost","root","");
mysqli_select_db($link,"artgallery");
session_start();
if(!isset($_SESSION['Username'])){
  header("Location: admin panel.php");
  exit();
}
$Username = $_SESSION['Username'];
if(isset($_GET['id'])){
  $art_id = $_GET['id'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Art</title>
	<meta name="viewreport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style ex.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
</head>
<body>
	<header>
		<a href="admin panel.php" class="square_btn">Home</a>
		<p>Update Art</p>
		<div class="box-with-text">
			EXHIBITION
		</div>
 </header>
 
 <div class="abc">
 	<form action="connect update category.php" method="post">
 	    <label for="title"><b style="font-size: 20px">Art Title</b></label>
		<input type="text" placeholder="Enter Title" name="title" required>
		<label for="description"><b style="font-size: 20px">Art Description</b></label>
		<input type="text" placeholder="Enter Description" name="description" required>
		<label for="price"><b style="font-size: 20px">Art Price</b></label>
		<input type="text" placeholder="Enter Price" name="price" required>
		<input type="hidden" name="id" value="<?= $art_id ?>">
		<input type="submit" value="UPDATE" class="btn">
	</form>
 </div>

</body>
</html>