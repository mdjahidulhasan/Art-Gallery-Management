<?php

$id = $_POST['id'];
$title = filter_input(INPUT_POST, 'title');
$stime  = filter_input(INPUT_POST, 'stime');
$etime  = filter_input(INPUT_POST, 'etime');
$cover  = filter_input(INPUT_POST, 'cover');


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

  $sql = "UPDATE exhibition SET ex_name='$title', start_time='$stime', end_time='$etime', ex_image='$cover' WHERE id='$id'";
  
  if ($conn->query($sql)){
    echo "New record is updated sucessfully";
  }
  else{
    echo "Error: ". $sql ."
". $conn->error;
  }
	 
 }
 
?>