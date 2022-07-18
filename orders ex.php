<?php
$link=mysqli_connect ("localhost","root","");
mysqli_select_db($link,"artgallery");
session_start();
$Username = $_SESSION['Username'];	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Exhibition Orders</title>
	<meta name="viewreport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style ex.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
</head>
<body>
<header>
		<a id="back" class="square_btn">Back</a>
		<p></p>
		<div class="box-with-text">
			EXHIBITION
		</div>
 </header>

<div class="abcd">
	<center><h1>ORDERS</h1></center>
	<hr class="c"><br><br><br>
	<ul>
<?php
$sql = mysqli_query($link,"SELECT * FROM payment WHERE Ex_id!=0 AND Confirmation is NULL");
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
	$Ex_id = $row["Ex_id"];
	?>
		<li> <b><?=$name?></b> (Username: <b><?=$user?></b> Email: <b><?=$email?></b> Contact No: <b><?=$num?></b> Address: <b><?=$add?></b>) has paid <?=$price?> to buy Art id <b><?=$art_id?></b> from Exhibition no <b><?=$Ex_id?></b>.<br> Bkash Number: <b><?=$bnum?></b> <br> Trx. Id: <b><?=$trx?></b><br> Confirm Order :
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