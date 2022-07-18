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
	<title>Update Category</title>
	<style>
		*
		{
			font-family: Comic Sans MS;
		}
		.img-responsive
		{
			display: block;
			margin-top: 10px;
			margin-left: auto;
			margin-right: auto;
			width: 250px;
			height: 250px;	
		}
		.abc input[type=text]
		{
			width: 100%;
			padding: 15px;
			margin: 5px 0 22px 0;
			border: none;
			background: #f1f1f1;
		}
		.abc input[type=text]:focus
		{
			background-color: #ddd;
            outline: none;
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
	<center><b style="font-size: 30px">Update Art</b></center>
	<img src="<?php echo $image;?>"  class="img-responsive">
	<div class="abc">
	<form action="connect update category.php" method="post">
		<label for="title"><b style="font-size: 20px">Art Title</b></label>
		<input type="text" placeholder="Enter Title" name="title" required>
		<label for="description"><b style="font-size: 20px">Art Description</b></label>
		<input type="text" placeholder="Enter Description" name="description" required>
		<label for="price"><b style="font-size: 20px">Art Price</b></label>
		<input type="text" placeholder="Enter Price" name="price" required>
		<input type="hidden" name="id" value="<?= $id ?>">
		<input type="submit" value="UPDATE" class="btn">
    </form>
</div>
</body>
</html>