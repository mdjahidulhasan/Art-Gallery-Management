<?php
$link=mysqli_connect ("localhost","root","");
mysqli_select_db($link,"artgallery");
session_start();
if(isset($_SESSION['Username'])){
  $Username = $_SESSION['Username'];
}
if(isset($_GET['id'])){
  $id = $_GET['id'];
}
$qry = mysqli_query($link,"SELECT * FROM arts WHERE Arts_id=$id");
while($row=mysqli_fetch_array($qry)){
	$title = $row["Arts_title"];
	$des = $row["Arts_description"];
	$cat = $row["Arts_category"];
	$price= $row["Arts_price"];
	$bill= $row["Arts_billing"];
	$Ex_id = $row["Ex_id"];
	$image= $row["Arts_image"];
}
$update = mysqli_query($link,"UPDATE arts set view_count=view_count+1 WHERE Arts_id = $id");
?>
<!DOCTYPE html>
<html>
<head>
<title>View Art</title>
<meta name="viewreport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="view.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
</head>
<body onload="startTimer()">
	<header>
		<a id="back" class="square_btn">Back</a>
		<p><?php echo $title; ?></p>
		<div class="box-with-text">
			<h2><?php echo $cat; ?> PAINTING</h2>
		</div>
	</header>
	<div class="container">
		<div class="box">
			<img src="<?php echo $image ?>">
			<p><?php echo $des; ?></p>
			<a href="" id="fav" class="button a">ADD TO FAVOURITES</a>
			<a href="billing.php?id=<?php echo $id; ?>" class="button b">BUY</a>
		</div>
	</div>
</body>
</html>
<script>
	let back = document.getElementById('back');
	back.addEventListener('click',backClicked);
	function backClicked(){
		window.history.back();
	}
	var id = "<?php echo $id ?>";
	var start;
	var end;
	function startTimer() {
		start = window.performance.now();
		console.log(start);
	}
	$(window).unload(function() {
		end = window.performance.now();
		console.log(end - start);
		seconds = (end - start) / 1000;
		if (seconds>=300) {
			seconds = 300;
		}

		var data;
		data = "second=" + seconds.toFixed(2) + "&id=" + id;

		$.ajax({
			cache:false,
			url:"timer.php",
		    type:"post",
		    data: data,
		    success: function(phpresponse){

		    }
		});
	});
	$( "#fav" ).click(function(){
		var data;
		data = "id=" + id;

		$.ajax({
			cache:false,
			url:"favourite.php",
		    type:"post",
		    data: data,
		    success: function(phpresponse){
		    	
		    }
		});
	});
</script>
