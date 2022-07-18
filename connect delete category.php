<?php

$id = $_POST['id'];

	
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
  $sql = "DELETE FROM arts WHERE Arts_id='$id'";
 
  
  if ($conn->query($sql)){
    echo "Deleted sucessfully";
  }
  else{
    echo "Error: ". $sql ."
". $conn->error;
  }
	 
 }


?>