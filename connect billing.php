<?php

$id = $_POST["id"];
$Ex_id = $_POST["Ex_id"];
$price = $_POST["price"];
$fullname = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');
$address = filter_input(INPUT_POST, 'address');
$num = filter_input(INPUT_POST, 'num');
$trx_id  = filter_input(INPUT_POST, 'tname');
$bkash_num= filter_input(INPUT_POST, 'bnum');


$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "artgallery";

$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  session_start();
  if(!isset($_SESSION['Username'])){
  header("Location: after login.php");
  exit();
}
$Username = $_SESSION['Username'];

  $sql = "INSERT INTO payment(Cus_Username, Cus_Fullname, Cus_Email_address,  Cus_Contact_num, Courier_address, Bkash_Trx_id, Bkash_num, pay_amount,  Arts_id, Ex_id)
  values ('$Username', '$fullname', '$email', '$num', '$address', '$trx_id', '$bkash_num','$price', '$id', '$Ex_id')";
  
  if ($conn->query($sql)){
     $update = "UPDATE arts set Arts_billing=1 WHERE Arts_id=$id";
     if ($conn->query($update)){
    echo '<br><h2>   Your order is in processing. Please wait for an email with your order confirmation notice. Thank You.</h2>';
     }
  }
  else{
    echo "Error: ". $sql ."
". $conn->error;
  }
 }
 
?>