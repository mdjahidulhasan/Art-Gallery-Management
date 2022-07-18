<?php
$link=mysqli_connect ("localhost","root","");
mysqli_select_db($link,"artgallery");
session_start();
if(!isset($_SESSION['Username'])){
  header("Location: admin panel.php");
  exit();
}
$Username = $_SESSION['Username'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Current Exhibitions</title>
	<meta name="viewreport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style ex.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
</head>
<body>
	<header>
		<a id="back" class="square_btn">Back</a>
		<p>Current Exhibitions</p>
		<div class="box-with-text">
			EXHIBITION
		</div>
 </header>
 <div class="container">
 	<?php
 	$res = mysqli_query($link,"SELECT * FROM exhibition");
 	while($row=mysqli_fetch_array($res))
 	{
 		$id = $row["id"];
?> 		
        <div class="box"><a href="admin ex arts.php?id=<?php echo $id; ?>">
        	<img src="<?php echo $image= $row["ex_image"];?>"></a>
        	<h2><?php echo $title= $row["ex_name"];?></h2>
			<p style="color: #A2A1A1;">Start Time: <?php echo $stime= $row["start_time"];?><br>End Time: <?php echo $etime= $row["end_time"];?></p>
            <a href="update ex.php?id=<?php echo $id; ?>" class="button a">EDIT</a>
            <a href="delete ex.php?id=<?php echo $id; ?>" class="button a">DELETE</a>
        </div>

 	<?php
 }
 ?>
</div>
</body>
</html>
<script type="text/javascript">
    let back = document.getElementById('back');
    back.addEventListener('click',backClicked);
    function backClicked(){
        window.history.back();
    }
</script>