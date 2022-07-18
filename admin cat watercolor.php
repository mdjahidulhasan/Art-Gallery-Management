<?php
 $link=mysqli_connect ("localhost","root","");
 mysqli_select_db($link,"artgallery");
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

 <h1>Watercolor Painting</h1> 
 <p style="font-size: 20">Watercolor painting is extremely old, dating perhaps to the cave paintings of paleolithic Europe, and has been used for manuscript illustration since at least Egyptian times but especially in the European Middle Ages. However, its continuous history as an art medium begins with the Renaissance. The German Northern Renaissance artist Albrecht Dürer (1471–1528), who painted several fine botanical, wildlife, and landscape watercolors, is generally considered among the earliest exponents of watercolor.</p>
<div class="row">
<?php
 

 $res = mysqli_query($link,"select * from arts WHERE Arts_category='watercolor'");
 
 while($row=mysqli_fetch_array($res))

 {
	 ?>
	 
<div class="column">
<div class="col-md-4 profile-pic text-center">
 <div class="textOverImage" 
 data-text = "<?php echo $row["Arts_title"]; ?>


 <?php echo $row["Arts_description"]; ?>">
 
 <img src="<?php echo $image= $row["Arts_image"];?>" width="300px" height="300px" class="img-responsive">
 </div>
</div>
 <p>Price:<?php echo $row["Arts_price"]; ?></p>
 <form action="update category.php" method="post">
      <input type="hidden" name="id" value="<?= $row["Arts_id"] ?>">
      <input type="hidden" name="title" value="<?= $row["Arts_title"] ?>">
      <input type="hidden" name="image" value="<?= $row["Arts_image"] ?>">
      <input type="hidden" name="description" value="<?= $row["Arts_description"] ?>">
      <input type="hidden" name="price" value="<?= $row["Arts_price"] ?>">
      <input type="submit" value="EDIT">
    </form>
    <form action="delete category.php" method="post">
      <input type="hidden" name="id" value="<?= $row["Arts_id"] ?>">
      <input type="hidden" name="title" value="<?= $row["Arts_title"] ?>">
      <input type="hidden" name="image" value="<?= $row["Arts_image"] ?>">
      <input type="hidden" name="description" value="<?= $row["Arts_description"] ?>">
      <input type="hidden" name="price" value="<?= $row["Arts_price"] ?>">
      <input type="submit" value="DELETE">
    </form>
  </div>
 
	 <?php
	 }
 ?>
 </div>
 <a href="add category.html" class="add"> ADD MORE ARTS +++</a>
 </div>
 </body>
 </html>