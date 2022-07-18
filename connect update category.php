<?php

$id = $_POST['id'];
$title = filter_input(INPUT_POST, 'title');
$description = filter_input(INPUT_POST, 'description');
$price  = filter_input(INPUT_POST, 'price');


$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "artgallery";

// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{

  $sql = "UPDATE arts SET Arts_title='$title',Arts_description='$description',Arts_price='$price' WHERE Arts_id='$id'";
  
  if ($conn->query($sql)){
    echo "New record is updated sucessfully";
  }
  else{
    echo "Error: ". $sql ."
". $conn->error;
  }
	 
 }
 
?>