<?php
 $link=mysqli_connect ("localhost","root","");
 mysqli_select_db($link,"artgallery");

?>
<html>
 <head>
 <title>Categories</title>
 <link rel="stylesheet" href="style admin cat oil.css">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
 </head>
 <body>
 <div class="image"></div>

 <div class="container">

 <h1>Oil Painting</h1> 
 <p style="font-size: 20">Oil painting is the process of painting with pigments with a medium of drying oil as the binder. Commonly used drying oils include linseed oil, poppy seed oil, walnut oil, and safflower oil.  Certain differences, depending on the oil, are also visible in the sheen of the paints. Although oil paint was first used for Buddhist paintings by painters in western Afghanistan sometime between the fifth and tenth centuries, it did not gain popularity until the 15th century. Its practice may have migrated westward during the Middle Ages. </p>
<div class="row">
<?php
 
 $res = mysqli_query($link,"SELECT * FROM arts WHERE Arts_category='oil'");
 
 while($row=mysqli_fetch_array($res))

 {
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