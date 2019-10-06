 <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
 <div id="ccc"></div>
<?php  
include("../dbCon.php");
		$con=connection();

?>

  <?php
	date_default_timezone_set("Asia/Dhaka");
	$today=date("Y-m-d");
	$Product2=[];
	if(isset($_POST["hidName"])){
		$checkdate=($_POST["hidName"]);
		$sql2="SELECT vehicle.name, MAX(bidder.price) as price FROM `bidder` INNER JOIN vehicle ON vehicle.ID=bidder.vehicleID WHERE bidder.biddingTime > '$checkdate' GROUP BY bidder.vehicleID";
		
		$result1 = $con->query( $sql2 );
			if ( $result1->num_rows > 0 ) {
				foreach ( $result1 as $row ) {
					$Product2[] = array("y" => $row["price"], "label" => $row["name"] ); 
				}
			}
	}else{
		$endDate=strtotime("-1 weeks");
		$endDate=date("Y-m-d",$endDate);
		$sql2="SELECT vehicle.name, MAX(bidder.price) as price FROM `bidder` INNER JOIN vehicle ON vehicle.ID=bidder.vehicleID WHERE bidder.biddingTime > '$endDate' GROUP BY bidder.vehicleID";
		
		$result1 = $con->query( $sql2 );
			if ( $result1->num_rows > 0 ) {
				foreach ( $result1 as $row ) {
					$Product2[] = array("y" => $row["price"], "label" => $row["name"] ); 
				}
			}
	}
?>




<script>
var chart = new CanvasJS.Chart("ccc", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Vehicle top bidding price <?php if(!isset($_POST["hidName"])){ echo("(Last 7 days )");} ?> " 
	},
	axisY: {
		title: "Price (BDT)"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.##",
		dataPoints: <?php echo json_encode($Product2, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

</script>
<?php header("location:report.php"); ?>