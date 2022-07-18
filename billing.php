<?php
$link=mysqli_connect ("localhost","root","");
mysqli_select_db($link,"artgallery");
session_start();
if(!isset($_SESSION['Username'])){
  header("Location:registration.html");
  exit();
}
$Username = $_SESSION['Username'];
if(isset($_GET['id'])){
  $id = $_GET['id'];
}
$qry = mysqli_query($link,"SELECT * FROM arts WHERE Arts_id=$id");
while($row=mysqli_fetch_array($qry)){
	$price=$row["Arts_price"];
	$bill=$row["Arts_billing"];
  $Ex_id = $row["Ex_id"];
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Payment</title>
 <link rel="stylesheet" href="style billing.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<form action="connect billing.php" method="post">

<div class="row">
  <div class="col-75">
    <div class="container">
      
      
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Fullname</label>
            <input type="text" name="name" value=""required>
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" name="email" value=""required>
            <label for="adr"><i class="fa fa-address-card-o"></i> Courier Address (Sundarban Paribahan)</label>
            <input type="text" name="address" value=""required>
            <label for="num"><i class="fa fa-phone"></i> Conatct Number</label>
            <input type="text" name="num" value=""required> 
          </div>

          <div class="col-50">
            <h3>Payment <b style="color: red">bKash</b></h3>
            <div class="icon-container">
             <p style="font-size: 18px">Please pay <?php echo $price; ?> to +8801624733216 (Send Money) & complete the following.</p>
            </div>
            <label for="tname">Transaction ID</label>
            <input type="text" name="tname" value=""required>
            <label for="bnum">bKash Number</label>
            <input type="text" name="bnum" value=""required>
          </div>
          
        </div>
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="hidden" name="Ex_id" value="<?= $Ex_id ?>">
        <input type="hidden" name="price" value="<?= $price ?>">
        <input type="submit" value="Continue to checkout" class="btn">
    </div>
  </div>
  
</div>
</form>
</body>
</html>
