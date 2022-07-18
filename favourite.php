<?php
$id =  $_POST['id'];
$link=mysqli_connect ("localhost","root","");
mysqli_select_db($link,"artgallery");

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
	session_start();
	if(isset($_SESSION['Username'])){
		$Username = $_SESSION['Username'];
}
	else{
		header("Location: registration.php");
		exit();
	}
	$update = mysqli_query($link,"INSERT INTO favourites(Username,Arts_id) values('$Username','$id')");
	$sql = mysqli_query($link,"UPDATE arts set Fav_count = Fav_count + 1 WHERE Arts_id = $id");
	echo "Added To Favourites";
}
?>