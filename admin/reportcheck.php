
<?php include("../header.php");
//include("../dbCon.php");
//		$con=connection();

?>

 


	<!-- Footer Section -->
	<?php

	include("../footer.php");
	?>D
	<!-- Footer Section /- -->


<script type="text/javascript">
   var cc=new Array();
	//$("#show").load("report.php");
 setInterval(function(){$.get('reportcheck1.php',function(dat){
					//	$("#show").html(data);
	 	  cc=(dat);
	var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	
	title:{
		text:"Fortune 500 Companies by Country"
	},
	axisX:{
		interval: 1
	},
	axisY2:{
		interlacedColor: "rgba(1,77,101,.2)",
		gridColor: "rgba(1,77,101,.1)",
		title: "Number of Companies"
	},
	data: [{
		type: "bar",
		name: "companies",
		axisYType: "secondary",
		color: "#014D65",
		dataPoints: cc
	}]
});
chart.render();
	 			
					});},1000);
	

</script>


<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {
	


}
</script>
</head>
<body>
<div id="chartContainer" style="height: 300px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>