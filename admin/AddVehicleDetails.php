<?php include("../header.php"); ?>
<?php
if((isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"]==false) || (isset($_SESSION["role"])&& $_SESSION["role"]==0)){
	?>
<script>
	location.href="<?=$_SESSION["directory"]?>index.php";
</script>
	<?php
}
?>	
<?php
//include("../dbCon.php");
	//	$con=connection();


 if(isset($_GET["id"])){
	$vehicleID=$_GET["id"];
	$updateChecking=false;
	 
	$sql3="SELECT * FROM `vehicledetails` WHERE `vehicleID`='$vehicleID' AND `updateStatus`= 1";
	$result = $con->query( $sql3 );
	if ( $result->num_rows > 0 ) {
		$updateChecking=true;
		foreach ( $result as $row ) {
			$description=$row["description"];
			 
			$make=$row["make"];
			$model=$row["model"];
			$kilometers=$row["kilometers"];
			$BodyType=$row["BodyType"];
			$Engine=$row["Engine"];
			$fueltype=$row["fueltype"];
			$year=$row["year"];
			$Transmission=$row["Transmission"];
			$passenger=$row["passenger"];
			$break=$row["break"];
			 
			 
					}
				}
}


if(isset($_POST["submit"])){
		
	
	$okFlag=TRUE;
	
		if(!isset($_REQUEST["break"]) || $_REQUEST["break"]==''){
			$message="please type  name.";
			$okFlag=FALSE;
		}
		if(!isset($_REQUEST["brand"]) || $_REQUEST["brand"]==''){
			$message="please type base price.";
			$okFlag=FALSE;
		}
		if(!isset($_REQUEST["model"]) || ($_REQUEST["model"])==''){
			$message="please type  startDate.";
			$okFlag=FALSE;
		}
		if(!isset($_REQUEST['km']) || ($_REQUEST['km'] == '')){
				$message .= 'Please type  End Date.<br>';
				$okFlag = FALSE;
			}
		if(!isset($_REQUEST['type']) || ($_REQUEST['type'] == '')){
				$message .= 'Please insert bike type.<br>';
				$okFlag = FALSE;
			}
		if(!isset($_REQUEST['engine']) || ($_REQUEST['engine'] == '')){
			$message .= 'Please Select catagory.<br>';
			$okFlag = FALSE;
		}
	
	// image upload
			
			$target_dir = "../img/vehicle/";
			$newName=date('YmdHis_');
			$newName .=basename($_FILES["fileToUpload"]["name"]);
			$target_file = $target_dir.$newName;
		
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			
				$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				if($check !== false) {
					//echo "File is an image - " . $check["mime"] . ".";
					$uploadOk = 1;
				} else {
					$message= "File is not an image.";
					$uploadOk = 0;
				}
			
			// Check if file already exists
			if (file_exists($target_file)) {
				$message = "Sorry, file already exists.";
				$uploadOk = 0;
			}
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 200000000) {
				$message= "Sorry, your file is too large. upload image within 2MB";
				$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
				$message = "Sorry, only jpg, JPEG, png & GIF files are allowed.";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				$message = "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					$message = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
					
				} else {
					$message = "Sorry, there was an error uploading your file.";
				}
			}
			
	// image upload
			
			$target_dir = "../img/vehicle/";
			$newName2=date('YmdHis_');
			$newName2 .=basename($_FILES["fileToUpload_2"]["name"]);
			$target_file = $target_dir.$newName2;
		
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			
				$check = getimagesize($_FILES["fileToUpload_2"]["tmp_name"]);
				if($check !== false) {
					//echo "File is an image - " . $check["mime"] . ".";
					$uploadOk = 1;
				} else {
					$message= "File is not an image.";
					$uploadOk = 0;
				}
			
			// Check if file already exists
			if (file_exists($target_file)) {
				$message = "Sorry, file already exists.";
				$uploadOk = 0;
			}
			// Check file size
			if ($_FILES["fileToUpload_2"]["size"] > 200000000) {
				$message= "Sorry, your file is too large. upload image within 2MB";
				$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
				$message = "Sorry, only jpg, JPEG, png & GIF files are allowed.";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				$message = "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["fileToUpload_2"]["tmp_name"], $target_file)) {
					$message = "The file ". basename( $_FILES["fileToUpload_2"]["name"]). " has been uploaded.";
					
				} else {
					$message = "Sorry, there was an error uploading your file.";
				}
			}
			
	// image upload
			
			$target_dir = "../img/vehicle/";
			$newName3=date('YmdHis_');
			$newName3 .=basename($_FILES["fileToUpload_3"]["name"]);
			$target_file = $target_dir.$newName3;
		
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			
				$check = getimagesize($_FILES["fileToUpload_3"]["tmp_name"]);
				if($check !== false) {
					//echo "File is an image - " . $check["mime"] . ".";
					$uploadOk = 1;
				} else {
					$message= "File is not an image.";
					$uploadOk = 0;
				}
			
			// Check if file already exists
			if (file_exists($target_file)) {
				$message = "Sorry, file already exists.";
				$uploadOk = 0;
			}
			// Check file size
			if ($_FILES["fileToUpload_3"]["size"] > 200000000) {
				$message= "Sorry, your file is too large. upload image within 2MB";
				$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
				$message = "Sorry, only jpg, JPEG, png & GIF files are allowed.";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				$message = "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["fileToUpload_3"]["tmp_name"], $target_file)) {
					$message = "The file ". basename( $_FILES["fileToUpload_3"]["name"]). " has been uploaded.";
					
				} else {
					$message = "Sorry, there was an error uploading your file.";
				}
			}
			
	
	
	
		
	 
	if($okFlag){
	
		$getID=$_GET["id"];
		$brand=$_REQUEST["brand"];
		 
		$model=$_REQUEST["model"];
		$km=$_REQUEST["km"];
		$engine=$_REQUEST["engine"];
		$type=$_REQUEST["type"];
		$fuel=$_REQUEST["fuel"];
		$transmission=$_REQUEST["Transmission"];
		$year=$_REQUEST["year"];
		$passengers=$_REQUEST["passengers"];
		$break=$_REQUEST["break"];
		$description=$_REQUEST["description"];
		$image=$newName;
		$image2=$newName2;
		$image3=$newName3;

		if($updateChecking==true){
		$sql="UPDATE `vehicledetails` SET  `description`='$description',`make`='$brand',`model`='$model',`kilometers`='$km',`BodyType`='$type',`Engine`='$engine',`fueltype`='$fuel',`year`='$year',`Transmission`='$transmission',`passenger`='$passengers',`break`='$break',`updateStatus`=1 WHERE `vehicleID`='$getID'";
		
		$sql2="UPDATE `vehicleimage` SET  `name`='$image',`name2`='$image2',`name3`='$image3' WHERE `vehicleID`='$getID'";
		}else{
			$sql="INSERT INTO `vehicledetails`( `vehicleID`, `description`, `make`, `model`, `kilometers`, `BodyType`, `Engine`, `fueltype`, `year`, `Transmission`, `passenger`, `break`,`updateStatus`) VALUES ('$getID','$description','$brand','$model','$km','$type','$engine','$fuel','$year','$transmission','$passengers','$break',1)";
			
		$sql2="INSERT INTO `vehicleimage`(  `vehicleID`, `name`, `name2`, `name3`) VALUES ( '$getID','$image','$image2','$image3')";
		}
		 
		 
		if(($con->query($sql)) && ($con->query($sql2))){
			$_SESSION["msg"]="Successfully update vehicle";
		}else{
			$_SESSION["msg"]="database error.";
		};
		
	}
		
}







?>

	<div style="background: #333;">
		<div class="container">
			<div class="row">
				<div style="color: aliceblue;" class="login-check">
					<div class="checkout-form" >

						<?php if(isset($_SESSION["msg"])){ ?>
							<div class="alert alert-success" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <strong> <?=$_SESSION["msg"]?></strong>
							</div>
							<script>
								window.setTimeout(function() {
								    $(".alert").fadeTo(500, 0).slideUp(500, function(){
								        $(this).remove(); 
								    });
								}, 4000);
							</script>
							
						<?php
							unset($_SESSION["msg"]);
							}
						
						?>


						<form action="" method="post" enctype="multipart/form-data">
							<div class="  form-group col-md-12">
								<h3 ><?php if($updateChecking == true){echo("Update Vehicle Details");}else{echo("Add Vehicle Details");} ?></h3>
								<div class="billing-field">

									<div class="col-md-6 form-group">
										<label> Company</label>
										<input type="text" class="form-control" name="brand" value=" <?php if(isset($make)){echo($make);} ?>"  required/>
									</div>
									<div class="col-md-6 form-group">
										<label>Model</label>
										<input type="text" class="form-control" name="model" value=" <?php if(isset($model)){echo($model);} ?>"   required/>
									</div>

									

										<div class="col-md-6 form-group">
										<label>KM running</label>
										<input type="number" class="form-control" name="km" value="<?php if(isset($kilometers)){echo(intval($kilometers));} ?>" required  />
									</div>

									<div class="col-md-6 form-group">
										<label>body type</label>
										 <select class="form-control" name="type" required>
											<option value="<?php if(isset($BodyType) && $BodyType=="Plastic"){echo($BodyType); }else{echo("Plastic");} ?>" <?php if(isset($BodyType) && $BodyType=="Plastic"){ ?>selected <?php } ?>>Plastic</option>
											
											<option value="<?php if(isset($BodyType)&& $BodyType=="Aluminium sheet"){echo($BodyType); }else{echo("Aluminium sheet");} ?>" <?php if(isset($BodyType)&& $BodyType=="Aluminium sheet"){ ?>selected <?php } ?>>Aluminium sheet</option>
											
											<option value="<?php if(isset($BodyType)&& $BodyType=="Canister"){echo($BodyType); }else{echo("Canister");} ?>" <?php if(isset($BodyType)&& $BodyType=="Canister"){ ?>selected <?php } ?> >Canister</option>
										</select>
									</div>
									<div class="col-md-6 form-group">
										<label>Engine</label>
										<select class="form-control" name="engine" required>
											<option value="<?php if(isset($Engine) && $Engine =="4 Stock"){echo($Engine); }else{echo("4 Stock");} ?>" <?php if(isset($Engine)&& $Engine =="4 Stock"){ ?>selected <?php } ?> >4 Stock</option>
											
											<option value="<?php if(isset($Engine) && $Engine =="VVT-i"){echo($Engine); }else{echo("VVT-i");} ?>" <?php if(isset($Engine)&& $Engine =="VVT-i"){ ?>selected <?php } ?>>VVT-i</option>
											
											<option value="<?php if(isset($Engine)&& $Engine =="Tata"){echo($Engine); }else{echo("Tata");} ?>" <?php if(isset($Engine)&& $Engine =="Tata"){ ?>selected <?php } ?>>Tata</option>
										</select>
									</div>
									<div class="col-md-6 form-group">
										<label>Fuel Type</label>
										<select class="form-control" name="fuel" required>
											<option value="<?php if(isset($fueltype)){echo($fueltype); }else{echo("Disel");} ?>" <?php if(isset($fueltype) && $fueltype=="Disel"){ ?>selected <?php } ?> >Disel</option>
											
											<option value="<?php if(isset($fueltype)){echo($fueltype); }else{echo("Octen");} ?>" <?php if(isset($fueltype)&& $fueltype=="Octen"){ ?>selected <?php } ?>>Octen</option>
											
											<option value="<?php if(isset($fueltype)){echo($fueltype); }else{echo("Petrol");} ?>" <?php if(isset($fueltype)&& $fueltype=="Petrol"){ ?>selected <?php } ?>>Petrol</option>
										</select>
									</div>
									<div class="col-md-6 form-group">
										<label>Transmission</label>
										<select class="form-control" name="Transmission" required>
											<option value="<?php if(isset($Transmission)){echo($Transmission); }else{echo("Manual");} ?>" <?php if(isset($Transmission)&& $Transmission=="Manual"){ ?>selected <?php } ?>>Manual</option>
											<option value="<?php if(isset($Transmission)){echo($Transmission); }else{echo("Auto");} ?>" <?php if(isset($Transmission)&& $Transmission=="Auto"){ ?>selected <?php } ?>>Auto</option>
											 
										</select>
									</div>
										<div class="col-md-6 form-group">
										<label>Making year</label>
										<input type="text" class="form-control" name="year"  value=" <?php if(isset($year)){echo($year);} ?>"   required/>
									</div>
										<div class="col-md-6 form-group">
										<label>passengers</label>
										<input type="number" class="form-control" name="passengers"  value="<?php if(isset($passenger)){echo($passenger);} ?>"   required/>
									</div>
									<div class="col-md-6 form-group">
										<label>Break Type</label>
										<select class="form-control" name="break" required>
											<option value="<?php if(isset($break)){echo($break); }else{echo("Disk");} ?>" <?php if(isset($break)&& $break=="Disk"){ ?>selected <?php } ?> >Disk</option>
											
											<option value="<?php if(isset($break)){echo($break); }else{echo("Dram");} ?>" <?php if(isset($break)&& $break=="Dram"){ ?>selected <?php } ?>>Dram</option>
											
											<option value="<?php if(isset($break)){echo($break); }else{echo("Air hydrolic");} ?>" <?php if(isset($break)&& $break=="Air hydrolic"){ ?>selected <?php } ?>>Air hydrolic</option>
											 
										</select>
									</div>	
									
							
										
							
								
								<div class="col-md-6 form-group">
										<label>Image</label>
										<input type="file" class="form-control " name="fileToUpload"   />
									</div>
								 
								<div class="col-md-6 form-group">
										<label>Image</label>
										<input type="file" class="form-control " name="fileToUpload_2"   />
								</div>
								 
								<div class="col-md-6 form-group">
										<label>Image</label>
										<input type="file" class="form-control " name="fileToUpload_3"   />
								</div>
								<div class="col-lg-12 form-group">
										<label>Description</label>
										<textarea class="col-lg-12 form-control" name="description" rows="4"><?php if(isset($description)){echo($description);} ?></textarea>
									</div>
								<div class="col-md-3 form-group" >
									 <input  style="margin-left: 130%"   class="btn btn-success   form-control" type="submit" value="<?php if($updateChecking == true){echo("Update");}else{echo("Add");} ?>" name="submit"/> 
								</div>
								
						 
							
								</div>
									
								</div>
						</form>
					 </div>
				</div>	
			</div>
		</div>
	</div>
	
	
																		

	<!-- Footer Section -->
	<?php

	include("../footer.php");
	?>D
	<!-- Footer Section /- -->
	




