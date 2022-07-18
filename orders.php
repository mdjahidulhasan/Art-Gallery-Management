<?php
$link=mysqli_connect ("localhost","root","");
mysqli_select_db($link,"artgallery");
session_start();
$Username = $_SESSION['Username'];	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Orders</title>
	<link rel="stylesheet" href="style admin panel.css">
</head>
<body>
<div id="header">
<button id="back" class="btn home">Back</button>
<a href = "connect logout.php"><button class="btn logout">Log Out</button></a>
<center><img src="images/admin1.png" class="img-responsive"><h4>Welcome Admin <?php echo "$Username";?>!</h4>
</center>
</div>

<div class="abc">
	<center><h1>ORDERS</h1></center>
	<hr class="a"><br><br><br>
	<ul>
<?php	
$sql = mysqli_query($link,"SELECT * FROM payment WHERE Confirmation = 0");
while($row=mysqli_fetch_array($sql))
{
	$order_id = $row["id"];
	$user = $row["Cus_Username"];
	$name = $row["Cus_Fullname"];
	$email = $row["Cus_Email_address"];
	$num = $row["Cus_Contact_num"];
	$add = $row["Courier_address"];
	$trx = $row["Bkash_Trx_id"];
	$bnum = $row["Bkash_num"];
	$price = $row["pay_amount"];
	$art_id = $row["Arts_id"];
	?>
		<li> <b><?=$name?></b> (Username: <b><?=$user?></b> Email: <b><?=$email?></b> Contact No: <b><?=$num?></b> Address: <b><?=$add?></b>) has paid <?=$price?> to buy Art id <b><?=$art_id?></b>.<br> Bkash Number: <b><?=$bnum?></b> <br> Trx. Id: <b><?=$trx?></b><br> Confirm Order :
		<form action="connect orders.php" method="post">
		<input type="hidden" name="oid" value="<?= $order_id ?>">
		<input type="hidden" name="aid" value="<?= $art_id ?>">
        <input type="submit" name="yes" value="Yes">
        <input type="submit" name="no" value="No">
        </form>
        </li>
        <br>
        <?php 
        }
        ?>	
	</ul>
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