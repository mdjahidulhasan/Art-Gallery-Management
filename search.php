<html>
<head>
<title>Search Result</title>
<link rel="stylesheet" href="style search.css">
</head>
<body>

<?php
$link=mysqli_connect ("localhost","root","");
mysqli_select_db($link,"artgallery");
session_start();
$Username = null;
if(isset($_SESSION['Username'])){
  $Username = $_SESSION['Username'];
}
$output = '';
//collect
if(isset($_POST['search'])){
	$searchq = $_POST['search'];
	if($Username==null){
	?>
	<a href = "index.html"><button class="btn home">Home</button></a> 
    <?php }
    else{
	?>
	<a href = "after login.php"><button class="btn home">Home</button></a>
<?php } ?>
	<h2> Search Results For : <?php echo $searchq; ?> </h2>
	<h1> Search Again: </h1>
	<div class = "box">
	<form action="search.php" method="post">
    <input type="text" name="search" placeholder="search category">
    <input type="submit" value="search">
    </form>
	</div>
	
	
<?php	
	$searchq = preg_replace("#[^0-9 a-z]#i","",$searchq);
	$query = mysqli_query($link,"SELECT * FROM arts WHERE (Arts_title LIKE '%$searchq%' OR Arts_category LIKE '%$searchq%') AND Ex_ID=0 ORDER BY Arts_title ASC")or die ("Could Not Search!!! Search Correctly!!!"); 
	$count = mysqli_num_rows($query);
	if($count == 0){
	    $output = 'There was no search results!';
		echo $output;
	}
	else{
		?>
		<table style=\"width:95%;\">
        <tr><th>CATEGORY</th>
		<th>TITLE</th>
		<th>DESCRIPTION</th>
		<th>PRICE</th>
		<th>ARTS</th>
		<th>BUY</th>
		</tr>
		<?php
		while($row = mysqli_fetch_array($query)){
			?>
			<tr><td>
	        <?php echo $row['Arts_category']; ?>
	        </td><td>
		
	        <?php echo $row['Arts_title']; ?>
	        </td><td>

	        <?php echo $row['Arts_description']; ?>
	        </td><td>
	        <?php echo $row['Arts_price'];?>
	        </td><td>

            <?php
            $image = $row['Arts_image'];
            echo '<img height="200" width="200" src="'.$image.'" />' ?>
            </td><td>
	<?php
	if($Username==null){
 	if($row["Arts_billing"]==null){ ?>
 	<a class="button" href="registration.html" role="button">BUY</a>
 	<?php }
 	else{ ?>
 	<a class="button" role="button">SOLD OUT</a>
 	<?php
 }
}
else{
	if($row["Arts_billing"]==null){
		$id=$row["Arts_id"];
	?>
 	<a class="button" href="billing.php?id=<?php echo $id; ?>" role="button">BUY</a>
 	<?php }
 	else{ ?>
 	<a class="button" role="button">SOLD OUT</a>
	<?php
 }
}
}
  ?>
    </table>
    <?php 
 }
}
?> 
</body>
</html>