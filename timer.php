<?php 

$second = $_POST['second'];
$id =  $_POST['id'];

$link=mysqli_connect ("localhost","root","");
mysqli_select_db($link,"artgallery");

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  session_start();
  if(isset($_SESSION['Username'])){
  	$Username = $_SESSION['Username'];
  }
$qry = mysqli_query($link,"SELECT * FROM arts WHERE Arts_id=$id");
while($row=mysqli_fetch_array($qry)){
	$time = $row["Time_spent"];
}
$tt_time = $second + $time;
$sql = mysqli_query($link,"UPDATE arts set Time_spent= $tt_time WHERE Arts_id = $id");
echo "Time Updated";
}
?> 