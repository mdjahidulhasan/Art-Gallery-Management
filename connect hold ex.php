<?php

$title = filter_input(INPUT_POST, 'title');
$stime = filter_input(INPUT_POST, 'stime');
$etime  = filter_input(INPUT_POST, 'etime');
$cover = filter_input(INPUT_POST, 'cover');


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
  $sql = "INSERT INTO exhibition (ex_name, start_time, end_time, ex_image)
  values ('$title', '$stime', '$etime', '$cover')";
  
  if ($conn->query($sql)){
    echo '<br><h3>  Information of exhibition is stored successfully. Now you can add arts to this exhibition from current exhibition page.</h3>';
  }
  else{
    echo "Error: ". $sql ."
". $conn->error;
  }
	 
 }
 
?>