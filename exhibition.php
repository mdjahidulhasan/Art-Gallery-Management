<?php
$link=mysqli_connect ("localhost","root","");
mysqli_select_db($link,"artgallery");
date_default_timezone_set("Asia/Dhaka");
session_start();
if(!isset($_SESSION['Username'])){
  header("Location: index.html");
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
	$stime = $row["start_time"];
	$etime = $row["end_time"];
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
		<a href="after login.php" class="square_btn">Home</a>
		<p><?php echo $title;?></p>
		<div class="box-with-text">
			EXHIBITION
		</div>
 </header>
<?php
$today_date = date('Y-m-d H:i:s', time());
$current_ts = strtotime($today_date);
$st_time = strtotime($stime);
$et_time = strtotime($etime);

if ($st_time>$current_ts) {
	echo '<h2>The Exhibition has not started yet. Please come again later. Thank You. </h2>';
}
else if($st_time<$current_ts && $current_ts<$et_time){
?>
 <div class="container">
 	<?php
 	$res = mysqli_query($link,"SELECT * FROM arts WHERE Ex_id='".$id."'");
 	while($row=mysqli_fetch_array($res))
 	{
 		$art_id = $row["Arts_id"];
?>
 	<div class="box">
 		<img src="<?php echo $image= $row["Arts_image"];?>">
        <h2><?php echo $title= $row["Arts_title"];?></h2>
		<p style="color: #A2A1A1;"><?php echo $description= $row["Arts_description"];?><br>Price: <?php echo $price= $row["Arts_price"];?></p>
		<?php if($row["Arts_billing"]==null)
		{
			?>
            <a href="billing.php?id=<?php echo $art_id; ?>" class="button b">BUY</a>
 	    <?php 
 	    }
 	    else{
 	    ?>
 	    <a href="" class="button ab">SOLD OUT</a>
 	    <?php } ?>
 	</div>
 	<?php
 }
}
elseif ($current_ts>$et_time) {
	echo '<h2> The Exhibition has been Ended. </h2>';
}
else{
	include('after login.php');
}
 ?>
 </div>
</body>
</html>
