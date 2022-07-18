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
	<title>Delete Art</title>
	<meta name="viewreport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style ex.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
</head>
<body>
	<header>
		<a href="admin panel.php" class="square_btn">Home</a>
		<p>Delete Art</p>
		<div class="box-with-text">
			EXHIBITION
		</div>
 </header>
 
 <div class="abc">
 	<center><b style="font-size: 30px">Do you want to delete this art?</b></center>
		<form action="connect delete category.php" method="post">
			<input type="hidden" name="id" value="<?= $art_id ?>">
		    <input type="submit" value="YES" class="btn">
		</form>
 </div>

</body>
</html>