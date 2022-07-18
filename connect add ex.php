<?php

$id = $_POST['id'];
$title = filter_input(INPUT_POST, 'title');
$description = filter_input(INPUT_POST, 'description');
$price  = filter_input(INPUT_POST, 'price');
$image = filter_input(INPUT_POST, 'image');


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
  $sql = "INSERT INTO arts (Arts_title, Arts_description, Arts_price, Arts_image, Ex_id)
  values ('$title', '$description', '$price', '$image', '$id')";
  
  if ($conn->query($sql)){
      echo "New exhibition art is inserted sucessfully";
  }
  else{
    echo "Error: ". $sql ."
". $conn->error;
  }	 
}

 
?>