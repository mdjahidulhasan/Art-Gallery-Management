<?php
 $link=mysqli_connect ("localhost","root","");
 mysqli_select_db($link,"artgallery");
 $Username = null;
 session_start();
 if(isset($_SESSION['Username'])){
  $Username = $_SESSION['Username'];
  $update = mysqli_query($link,"UPDATE views set views=views+1 WHERE category = 'watercolor' and username = '$Username'");
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

 <h1>Watercolor Painting</h1> 
 <p style="font-size: 20">Watercolor painting is extremely old, dating perhaps to the cave paintings of paleolithic Europe, and has been used for manuscript illustration since at least Egyptian times but especially in the European Middle Ages. However, its continuous history as an art medium begins with the Renaissance. The German Northern Renaissance artist Albrecht Dürer (1471–1528), who painted several fine botanical, wildlife, and landscape watercolors, is generally considered among the earliest exponents of watercolor.</p>
<div class="row">
<?php
 

 $res = mysqli_query($link,"select * from arts WHERE Arts_category='watercolor'");
 
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