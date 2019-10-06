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
if(isset($_POST["submit"])){
		
	
	$okFlag=TRUE;
	
		if(!isset($_REQUEST["name"]) || $_REQUEST["name"]==''){
			$message="please type your name.";
			$okFlag=FALSE;
		}
		if(!isset($_REQUEST["startDate"]) || ($_REQUEST["startDate"])==''){
			$message="please type your startDate.";
			$okFlag=FALSE;
		}
		if(!isset($_REQUEST['EndDate']) || ($_REQUEST['EndDate'] == '')){
				$message .= 'Please type your End Date.<br>';
				$okFlag = FALSE;
			}
		if(!isset($_REQUEST['type']) || ($_REQUEST['type'] == '')){
				$message .= 'Please insert bike type.<br>';
				$okFlag = FALSE;
			}
		if(!isset($_REQUEST['catagory']) || ($_REQUEST['catagory'] == '')){
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
			if($imageFileType != "jpg" && $imageFileType != "PNG" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
				$message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
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
			
	
	
	
	
	if($okFlag){

		$name=$_REQUEST["name"];
		 
		$startDate=$_REQUEST["startDate"];
		$EndDate=$_REQUEST["EndDate"];
		$catagory=$_REQUEST["catagory"];
		$type=$_REQUEST["type"];
		$price=$_REQUEST["price"];
		$image=$newName;


		$sql="INSERT INTO `vehicle`(  `name`, `type`, `catagory`, `startDate`, `EndDate`, `image`,`price`, `status`) VALUES ( '$name','$type','$catagory','$startDate','$EndDate','$image','$price','1')";
		
		if($con->query($sql)){
			$_SESSION["msg"]="Successfully added product";
		}else{
			$_SESSION["msg"]="database error.";
		};
		
	}
	
	

	
}


?>

	<div style="background: #333; padding-top: 200px; padding-bottom: 50px;">
		<div class="container">
			<div class="row">
				<div style="color: aliceblue;" class="login-check">
					<div class="checkout-form" >

						<?php if(isset($_SESSION["msg"])){ ?>
							<div class="alert alert-success" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <strong>Success!</strong> <?=$_SESSION["msg"]?>
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
								<h3 >Add Vehicle</h3>
								<div class="billing-field">

									<div class="col-md-6 form-group">
										<label> Vehicle Name</label>
										<input type="text" class="form-control" name="name"  required/>
									</div>

									<div class="col-md-6 form-group">
										<label>Image</label>
										<input type="file" class="form-control " name="fileToUpload" required />
									</div>

										<div class="col-md-6 form-group">
										<label>start Date</label>
										<input type="date" class="form-control" name="startDate" required/>
									</div>

									<div class="col-md-6 form-group">
										<label>End Date</label>
										<input type="date" class="form-control" name="EndDate" required/>
									</div>
									<div class="col-md-6 form-group">
										<label>Price</label>
										<input type="number" class="form-control" name="price" required/>
									</div>
									<div class="col-md-6 form-group">
										<label>Type</label>
										<select class="form-control" name="type" required id="Type" onChange="SelectCatagory()">
											<option value="Car">Car</option>
											<option value="Bike">Bike</option>
										</select>
									</div>
									
								<div class="col-md-6 form-group">
										<label>Catagory</label>
										<select class="form-control" name="catagory" required  id="Catagory">

											
										</select>
									</div>
							
								</div>
								<div>
									<input style="   min-width: 100px; margin-left: 45%;" class="btn btn-success" type="submit" value="Add" name="submit"/>
									 
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
	?>
	<!-- Footer Section /- -->
	


<script>
function SelectCatagory(){
	//$("#Type").on('change',function(){ 
	var value= $("#Type").val();
		$.get('<?=$_SESSION["directory"]?>admin/AddVehiclecatagory.php',{Count:value},function(data){
		$("#Catagory").html(data);
			
	});

	
}
		
setTimeout(function(){SelectCatagory();},1000);
</script>