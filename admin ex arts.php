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
  $id = $_GET['id'];
}
$sql = mysqli_query($link,"SELECT * FROM exhibition WHERE id='".$id."'");
while($row=mysqli_fetch_array($sql))
{
	$title = $row["ex_name"];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title;?></title>
	<meta name="viewreport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style ex.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
</head>
<body>
	<header>
		<a id="back" class="square_btn">Back</a>
		<p><?php echo $title;?></p>
		<div class="box-with-text">
			EXHIBITION
		</div>
 </header>
 <div class="container">
 	<?php
 	$res = mysqli_query($link,"SELECT * FROM arts WHERE Ex_id='".$id."'");
 	while($row=mysqli_fetch_array($res))
 	{
?>
 	<div class="box">
 		<img src="<?php echo $image= $row["Arts_image"];?>">
        <h2><?php echo $title= $row["Arts_title"];?></h2>
		<p style="color: #A2A1A1;"><?php echo $description= $row["Arts_description"];?><br>Price: <?php echo $price= $row["Arts_price"];?></p>
        <a href="update ex art.php?id=<?php echo $row["Arts_id"]; ?>" class="button a">EDIT</a>
        <a href="delete ex art.php?id=<?php echo $row["Arts_id"]; ?>" class="button a">DELETE</a>
 	</div>
 	<?php
 }
 ?>
 </div>
 <center><a href="add ex.php?id=<?php echo $id; ?>" class="add"> ADD EXHIBITION ARTS +++</a></center>

</body>
</html>
<script type="text/javascript">
	let back = document.getElementById('back');
	back.addEventListener('click',backClicked);
	function backClicked(){
		window.history.back();
	}
</script>