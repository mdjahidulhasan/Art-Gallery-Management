<?php
 $link=mysqli_connect ("localhost","root","");
 mysqli_select_db($link,"artgallery");
 $Username = null;
 session_start();
 if(isset($_SESSION['Username'])){
  $Username = $_SESSION['Username'];
  $update = mysqli_query($link,"UPDATE views set views=views+1 WHERE category = 'canvas' and username = '$Username'");
}
 ?>
<html>
 <head>
 <title>Categories</title>
 <link rel="stylesheet" href="style cat oil.css">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
 </head>
 <body>
 <div class="image"></div>

 <div class="container">

 <h1>Canvas</h1> 
 <p style=" font-size: 20">As an artist, one of the best ways to display your talents is on canvas. From masterful oil paintings to photo canvas prints, there’s just something about this material that gives a sense of prestige.While hemp and linen were classically used to make canvas—and can still be found today—most industrial canvases are created using cotton.Using HP latex printing technology, the canvas prints are also environmentally friendly, as the inks are water-based and solvent free.</p>
 <div class="row">
<?php
 
 $res = mysqli_query($link,"SELECT * FROM arts WHERE Arts_category='canvas'");
 
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