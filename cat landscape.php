<?php
 $link=mysqli_connect ("localhost","root","");
 mysqli_select_db($link,"artgallery");
 $Username = null;
 session_start();
 if(isset($_SESSION['Username'])){
  $Username = $_SESSION['Username'];
  $update = mysqli_query($link,"UPDATE views set views=views+1 WHERE category = 'landscape' and username = '$Username'");
}
 ?>
<html>
 <head>
 <title>Categories</title>
 <link rel="stylesheet" href="style cat oil.css">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"> 
 </head>
 <body>
 <div class="image"></div>

 <div class="container">

 <h1>Landscape</h1> 
 <p style="font-size: 20">The appreciation of nature for its own sake, and its choice as a specific subject for art, is a relatively recent phenomenon. Until the seventeenth century landscape was confined to the background of portraits or paintings dealing principally with religious, mythological or historical subjects (History painting).
In the work of the seventeenth-century painters Claude Lorraine and Nicholas Poussin, the landscape background began to dominate the history subjects that were the ostensible basis for the work. Their treatment of landscape however was highly stylised or artificial: they tried to evoke the landscape of classical Greece and Rome and their work became known as classical landscape. At the same time Dutch landscape painters such as Jacob van Ruysdael were developing a much more naturalistic form of landscape painting, based on what they saw around them.</p>
<div class="row">
<?php
 
 $res = mysqli_query($link,"SELECT * FROM arts WHERE Arts_category='landscape'");
 
 while($row=mysqli_fetch_array($res))

 { 
 	$id=$row["Arts_id"];

	 ?>
	 
<div class="column">
<div class="col-md-4 profile-pic text-center">
 <div class="textOverImage" 
 data-text = "<?php echo $row["Arts_title"]; ?>


 <?php echo $row["Arts_description"]; ?>">
 
 <img src="<?php echo $image= $row["Arts_image"];?>"  class="img-responsive">
 </div>
</div>
 <p>Price:<?php echo $row["Arts_price"]; ?></p>
<a class="btn btn-primary" href="view.php?id=<?php echo $id; ?>" role="button">VIEW</a>
  
   </div>
 
	 <?php

 }

 ?>
 </div>
 </div>
 </body>
 </html>