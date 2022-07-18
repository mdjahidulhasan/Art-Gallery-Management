<?php
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
  header("Location: index.html");
  exit();
}
$Username = $_SESSION['Username'];
$url = "userprofile.php?Username=" .$Username;

        $fullname = filter_input(INPUT_POST, 'fullname');
        $user = filter_input(INPUT_POST, 'user');
        $email  = filter_input(INPUT_POST, 'email');
        $password  = filter_input(INPUT_POST, 'password');
        $image  = filter_input(INPUT_POST, 'image');
		$sql = "UPDATE customer SET Cus_name='$fullname',Cus_Username='$user',Cus_Email_address='$email',Cus_password='$password',Cus_dp='$image' WHERE Cus_Username='$Username'";
		
		if ($conn->query($sql)){
			echo "New record is updated sucessfully";
			$_SESSION['Username']=$user;
	        $url = "after login.php";
	        header('Location: '.$url);
	        exit();

		}
		else{
			echo "Error: ". $sql ."". $conn->error;
  }
}

?>