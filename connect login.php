<?php
$dbhost="localhost";  // hostname
$dbuser="root"; // mysql username
$dbpass=""; // mysql password
$db="artgallery"; // database you want to use
 

 
if( isset($_POST['Username']) and isset($_POST['Password']) ) {
		$conn=mysqli_connect( $dbhost, $dbuser, $dbpass, $db ) or die("Could not connect: " .mysqli_error($conn) );
		$Username=$_POST['Username'];
		$Password=$_POST['Password'];

		if (strpos($Username, "'or'1'='1") != false) {
			echo "HELLO HACKER";
		}

		else{
				$ret=mysqli_query( $conn, "SELECT * FROM customer WHERE Cus_Username='$Username' AND Cus_password='$Password' ") or die("Could not execute query: " .mysqli_error($conn));
				$row = mysqli_fetch_assoc($ret);
				if(!$row) {
					include('login.html');
					echo "Wrong Username and password";
				}
				else {
			        session_start();
			        $_SESSION['Username']=$Username;
			        $url = "after login.php";
			        header('Location: '.$url);
			        exit();
				}
			}
}
?>