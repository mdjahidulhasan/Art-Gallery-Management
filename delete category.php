<?php 
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "artgallery";

// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}

$id = $_POST["id"];
$title = $_POST["title"];
$image = $_POST["image"];
$description = $_POST["description"];
$price = $_POST["price"];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Delete Category</title>
	<style>
		*
		{
			font-family: Comic Sans MS;
		}
		.img-responsive
		{
			display: block;
			margin-top: 10px;
			margin-bottom: 20px;
			margin-left: auto;
			margin-right: auto;
			width: 250px;
			height: 250px;	
		}
		.abc .btn 
        {
        	background-color: #4CAF50;
        	color: white;
        	padding: 16px 20px;
        	border: none;
        	cursor: pointer;
        	width: 100%;
        	margin-bottom:10px;
        	opacity: 0.8;
        }
        .abc .btn:hover 
        {
        	opacity: 1;
        }
	</style>
</head>
<body>
	<center><b style="font-size: 30px">Delete Art</b></center>
	<img src="<?php echo $image;?>"  class="img-responsive">
	<div class="abc">
		<center><b style="font-size: 30px">Do you want to delete this art?</b></center>
		<form action="connect delete category.php" method="post">
			<input type="hidden" name="id" value="<?= $id ?>">
		    <input type="submit" value="YES" class="btn">
		</form>
	</div>

</body>
</html>