<?php
$link=mysqli_connect ("localhost","root","");
mysqli_select_db($link,"artgallery");

session_start();

if(!isset($_SESSION['Username'])){
  header("Location: index.html");
  exit();
}
else{
	$searchq = $_SESSION['Username'];
	$query = mysqli_query($link,"SELECT * FROM customer WHERE Cus_Username LIKE '%$searchq%'")or die ("Could Not Search!!! Search Correctly!!!"); 
}
$Username = $_SESSION['Username'];
$url = "userprofile.php?Username=" .$Username;

?>
<!DOCTYPE html>
<html>
<head>
	<title>User Profile</title>
	<link rel="stylesheet" type="text/css" href="profile.css">
</head>
<body>

	<div class="image"></div>

	<a href = "after login.php"><button class="btn home">Home</button></a>

	<div class="card">
		<?php
		while($row = mysqli_fetch_array($query)){
			?>
		<div class="upper">
			<?php
            $image = $row['Cus_dp'];
            echo '<img src="'.$image.'" />' ?>
		</div>
		<h2><?php echo $row['Cus_name']; ?></h2>
		<div class="right">
			<div class="info_data">
				<div class="data">
					<h4>Username</h4>
					<p><?php echo $row['Cus_Username']; ?></p>
					<h4>Email</h4>
					<p><?php echo $row['Cus_Email_address']; ?></p>
					<h4>Password</h4>
					<p><?php echo $row['Cus_password']; ?></p>
				</div>
			</div>
			<a href="update userprofile.html"><button class="button">Change</button></a>
		</div>
		<?php 
           }
           ?>
	</div>
	<div class="line">
		<p>"Art washes away from the soul the dust of every day life."</p>
		<h5>-Picasso</h5>
	</div>

</body>
</html>