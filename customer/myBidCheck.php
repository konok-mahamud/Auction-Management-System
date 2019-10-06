  <?php
 
include("../dbCon.php");
		$con=connection();
 if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}

date_default_timezone_set("Asia/Dhaka");
$today=date("Y-m-d");
 



$userID=$_SESSION["userid"];
$sql="SELECT vehicle.ID,vehicle.name,vehicle.EndDate,vehicle.image,vehicle.price as `baseprice`, vehicle.status , bidder.biddingTime,MAX(bidder.price) as `bidprice`, bidder.confirmbid FROM `bidder` INNER JOIN vehicle ON vehicle.ID=bidder.vehicleID INNER JOIN user ON bidder.userID=user.ID WHERE user.ID='$userID' GROUP BY bidder.vehicleID ORDER BY `bidder`.`biddingTime` DESC";
$result = $con->query( $sql );
	if ( $result->num_rows > 0 ) {
		foreach ( $result as $row ) {
			$enddate=$row["EndDate"];
			$bidprice=$row["bidprice"];
			$vehicleID=$row["ID"];
			$confirmbid=$row["confirmbid"];
			$status=$row["status"];

?>




	<tr style="text-align: center;">
        <td><?=$row["name"]?></td>
        <td><?=$row["EndDate"]?></td>
        <td><img style="max-width: 200px; max-height: 200px;" src="<?=$_SESSION["directory"]?>img/vehicle/<?=$row["image"]?>" ></td>
        <td><?=$row["baseprice"]?></td>
        <td><?=$row["bidprice"]?></td>
        <td> <?=$row["biddingTime"]?></td>
        <td> <?php if($today>$enddate ){
				$sql2="SELECT MAX(price) as 'topbidprice' FROM `bidder` WHERE vehicleID='$vehicleID'";
				$result2 = $con->query( $sql2 );
					if ( $result2->num_rows > 0 ) {
						foreach ( $result2 as $row2 ) {
								$topbidPrice=$row2["topbidprice"];
				
						}
					}
			 
				if($topbidPrice>$bidprice){
					echo("Lose");
				}elseif($status==1){echo("Bidding closed by authority");}
				else{ ?> <a href="<?=$_SESSION["directory"]?>customer/winner.php?id=<?=$vehicleID?>"><?php echo("Win"); if ($confirmbid==1){echo("(Confirmed)");} ?></a>   <?php }
				;}elseif($status==1){echo("Bidding closed by authority");}
			else{echo("Continue...");} ?></td>
      </tr>
      
      
   <?php  } 
	}else{echo("......NO BIDDING DATA.......");} ?>