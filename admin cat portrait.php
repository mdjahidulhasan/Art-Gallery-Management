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

 <h1>Portrait</h1> 
 <p style="font-size: 20">In fine art, a portrait can be a sculpture, a painting, a form of photography or any other representation of a person, in which the face is the main theme. Traditional easel-type portraits usually depict the sitter head-and-shoulders, half-length, or full-body. There are several varieties of portraits, including: the traditional portrait of an individual, a group portrait, or a self portrait. In most cases, the picture is specially composed in order to portray the character and unique attributes of the subject. Among Western Art's great exponents of portraiture are the Old Masters of the Renaissance such as the Florentines Leonardo da Vinci (1452-1519), Michelangelo (1475-1564), and Bronzino (1503-72), the Tuscan Raphael (1483-1520), and the Venetian Titian (1487-1576).</p>
<div class="row">
<?php
 
 $res = mysqli_query($link,"SELECT * FROM arts WHERE Arts_category='portrait'");
 
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