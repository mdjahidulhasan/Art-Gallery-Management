<?php
$link=mysqli_connect ("localhost","root","");
mysqli_select_db($link,"artgallery");
session_start();
if(!isset($_SESSION['Username'])){
  header("Location: index.html");
  exit();
}
$Username = $_SESSION['Username'];

?>

<html>
<head>
<title>Admin Panel</title>
<link rel="stylesheet" href="style admin panel.css">
</head>
<body>

<div id="header">
<button id="back" class="btn home">Back</button>
<a href = "connect logout.php"><button class="btn logout">Log Out</button></a>
<center><img src="images/admin1.png" class="img-responsive"><h4>Welcome Admin <?php echo "$Username";?>!</h4>
</center>
</div>

<div class="card">
		<div class="right">
			<div class="info_data">
				<div class="data">
					<h4>CATEGORIES</h4>
					<a href="admin cat oil.php"><p>Oil</p></a>
					<a href="admin cat watercolor.php"><p>Watercolor</p></a>
					<a href="admin cat canvas.php"><p>Canvas</p></a>
					<a href="admin cat portrait.php"><p>Portrait</p></a>
					<a href="admin cat sculpture.php"><p>Sculpture</p></a>
					<a href="admin cat landscape.php"><p>Landscape</p></a>
				</div>
			</div>
		</div>
	</div>

<div class="card ex">
		<div class="right">
			<div class="info_data">
				<div class="data">
					<h4>EXHIBITION</h4>
					<a href="admin hold ex.php"><p>Hold An Exhibition</p></a>
					<a href="admin current ex.php"><p>Current Exhibitions</p></a>
					<a href="orders ex.php"><p>Orders</p></a>
				</div>
			</div>
		</div>
	</div>	

<div class="card sell">
		<div class="right">
			<div class="info_data">
				<div class="data">
					<h4>ORDERS</h4>
					<a href="orders.php"><p>Order Requests</p></a>
					<a href="confirmed orders.php"><p>Confirmed Orders</p></a>
				</div>
			</div>
		</div>
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

