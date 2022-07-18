<?php
$link=mysqli_connect ("localhost","root","");
mysqli_select_db($link,"artgallery");

session_start();

if(!isset($_SESSION['Username'])){
  header("Location: index.html");
  exit();
}
$Username = $_SESSION['Username'];
$url = "after login about.php?Username=" .$Username;

?> 

<html>
<head>
<title>Art Gallery</title>
<link rel="stylesheet" href="index.css">

<link rel="stylesheet"
 href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<link rel="stylesheet"
href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script 
src="https://code.jquery.com/jquery-3.3.1.slim.min.js"> </script>
<script
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" ></script>
<script 
src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"> </script>

</head>
<body>
<!----NavigationBar---->
<section id="nav-bar">
 <nav class="navbar navbar-expand-lg navbar-light">
 <a class="navbar-brand" href="#"><img src="images/logo.png"></a>
  <div class="collapse navbar-collapse" id="navbarNav">
  	<?php
    echo "Welcome $Username";
    ?>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="after login.php">HOME</a>
      </li>
	    <li class="nav-item">
        <a class="nav-link" href="userprofile.php">PROFILE</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="user_recommendation.php">RECOMMENDATION</a>
      </li> 
       <li class="nav-item">
        <a class="nav-link" href="index.html">LOG OUT</a>
      </li>
      <li class="nav-item">
  <a class="box"><form action="search.php" method="post">
 <input type="text" name="search" placeholder="search category">
 <input type="submit" value="search">
 </form>
  </li>   
    </ul>
  </div>
</nav>
</section>


<!--------ABOUT-------->
<section id="about">
<div class="container">


<h2>About The Gallery</h2>
<div class="about-content">
<p>As a premier art gallery in Bangladesh, Art Gallery promotes and showcases the work of hundreds of artists. Our work involves showcasing new and emerging artists alongside classic, well-established pieces. By providing a space in which to display their latest works, artists appreciate our role in sharing their creative aspirations with a wider audience. Come check us out for yourself.</p>
</div>


</div>

</section>
<!----------Contact Us--------->
<section id="contact">
<div class="container">
<h2>Contact Us</h2>
<center>
<div class="row">
<div class="col-md-6 contact-info">
<div class="follow"><b>Phone:</b><i class="fa fa-phone"></i> 01552397694</div>
<div class="follow"><b>Email:</b><i class="fa fa-envelope"></i> artgallery@gmail.com</div>
<div class="follow"><label><b> Get Social:</b></label>
<a href="#"><i class="fa fa-facebook"></i></a>
<a href="#"><i class="fa fa-youtube-play"></i></a>
<a href="#"><i class="fa fa-twitter"></i></a>
<a href="#"><i class="fa fa-google-plus"></i></a>
</div>
</div>
</div>
</center>
</div>
</section>
</body>
</html>

<?php 
  
session_start(); 
$views = $_SESSION['views'];  
   
unset($_SESSION['views']);  

?>