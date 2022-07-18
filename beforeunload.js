document.addEventListener('DOMContentLoaded', init);

function init(){
$(document).ready(function() {

});


var id = "<?php echo $id ?>";
var start;
var end;
function startTimer() {
	start = window.performance.now();
	console.log(start);
}
function showElapsedTime() {
	end = window.performance.now();
	console.log(end - start);
	seconds = (end - start) / 1000;

	var data = "second=" + seconds.toFixed(2) + "&id=" + id;

	$.ajax({

		cache:false,
		url:"timer.php",
		type:"post",
		data: data,
		success: function(phpresponse){

			alert(phpresponse);

		}


	});
}
}