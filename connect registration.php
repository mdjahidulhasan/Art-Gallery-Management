<?php

$fullname = filter_input(INPUT_POST, 'fullname');
$username = filter_input(INPUT_POST, 'username');
$email  = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
$image = filter_input(INPUT_POST, 'image');

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
  $sql = "INSERT INTO customer (Cus_name, Cus_Username, Cus_Email_address, Cus_password, Cus_dp)
  values ('$fullname', '$username', '$email', '$password', '$image')";
  

  
  if ($conn->query($sql)){
    echo "New record is inserted sucessfully";
    $res = "INSERT INTO views (username, category, views, favourites, buy)
    values ('$username', 'oil', 0, 0, 0),('$username', 'watercolor', 0, 0, 0),('$username', 'canvas', 0, 0, 0),('$username', 'portrait', 0, 0, 0),('$username', 'sculpture', 0, 0, 0),('$username', 'landscape', 0, 0, 0)";
    if ($conn->query($res)){
      echo "success";
    }
  }
  else{
    echo "Error: ". $sql ."
". $conn->error;
  }
	 
 }
 
?>