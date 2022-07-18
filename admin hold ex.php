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
	<title>Hold Exhibition</title>
	<meta name="viewreport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style ex.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
</head>
<body>
	<header>
		<a id="back" class="square_btn">Back</a>
		<p>Hold An Exhibition</p>
		<div class="box-with-text">
			EXHIBITION
		</div>
 </header>

 <div class="abc">
 	<form action="connect hold ex.php" method="post">
 	    <label for="title"><b style="font-size: 20px">Exhibition Title</b></label>
		<input type="text" placeholder="Enter Title" name="title" required>
		<label for="start time"><b style="font-size: 20px">Start Time</b></label>
		<input type="datetime-local" name="stime" required>
		<label for="end time"><b style="font-size: 20px">End Time</b></label>
		<input type="datetime-local" name="etime" required>
		<label for="cover"><b style="font-size: 20px">Cover Image</b></label>
		<input type="file" name="cover" required>
		<input type="submit" value="SUBMIT" class="btn">
	</form>
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