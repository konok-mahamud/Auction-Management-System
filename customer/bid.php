  <?php
 
include("../dbCon.php");
include("../email.php");
		$con=connection();
 if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}

if(isset($_GET["id"])){
	$vehicleID=$_GET["id"];


$price=$_GET["bidprice"];
 $insertSQL=false;
 
$userid=$_SESSION["userid"];
date_default_timezone_set("Asia/Dhaka");
$nowtime=date("Y-m-d H:i:s");

$sql2="SELECT ID FROM `bidder` WHERE userID= '$userid' AND vehicleID='$vehicleID'";
	$result2 = $con->query( $sql2 );
	if ( $result2->num_rows > 0 ) {
		foreach ( $result2 as $row ) {
		$BidderID=($row["ID"]);
		$insertSQL=true;
		}
	}

if($insertSQL==true){
	$sql="UPDATE `bidder` SET   `biddingTime`='$nowtime',`price`='$price' WHERE `ID`='$BidderID'";
	$subject="update bidding price.";
}else{
	 $sql="INSERT INTO `bidder`(  `userID`, `vehicleID`, `biddingTime`, `price`) VALUES ( '$userid','$vehicleID','$nowtime','$price')";
	$subject="Bidding a vehicle";
	}
$to=$_SESSION["useremail"];
$content="your bidding price is ".$price.".  Please stay with us to know your bidding result.<br> Thank you.";

if($con->query($sql)){
	
		sendmail($to,$subject,$content);
	
		$_SESSION["bidmsg"]="Bidding successfully done";
		header("location:carDetails.php?id=$vehicleID");
	}else{
		echo("error");
	}

//notification
	$sql5="INSERT INTO `notification`(  `vehicleID`, `userID`, `role`) VALUES ( '$vehicleID','$userid',0)";
	$con->query($sql5);
}







//Showing top bid in vehicle details page
 if(isset($_GET["VID"])){
	 $vehicleID=($_GET["VID"]);
	 $sql4="SELECT MAX(`price`) FROM `bidder` WHERE `vehicleID`=$vehicleID";
						$result4 = $con->query( $sql4 );
							if ( $result4->num_rows > 0 ) {
								foreach ( $result4 as $row ) {
									$topBid=$row["MAX(`price`)"];
									$_SESSION["topbid"]=$topBid;
									if(empty($topBid)){
										echo("NO Bidding Yet");
									}else{
										echo($topBid);
									}
								}
								 
							}
 }
							
						
							
						 






     
                                  









 ?>