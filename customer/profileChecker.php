 <?php
  
include( "../dbCon.php" );
$con = connection();

	if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
 
if(isset($_GET["id"]) && $_GET["img"]==1){
	$id=$_GET["id"];
	
	
	// image upload
			
			$target_dir = "../img/userimg/";
			$newName=date('YmdHis_');
			$newName .=basename($_FILES["fileToUpload"]["name"]);
			$target_file = $target_dir.$newName;
		
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			
				 
			
			// Check if file already exists
			if (file_exists($target_file)) {
				$message = "Sorry, file already exists.";
				$uploadOk = 0;
			}
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 200000000) {
				$_SESSION["ok"]= "Sorry, your file is too large. upload image within 2MB";
				$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "JPG" ) {
				$_SESSION["ok"] = "Sorry, only jpg, png, jpeg & gif files are allowed.";
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
	
	$image=$newName;
	$sql="UPDATE `user` SET `image`='$image'  WHERE `ID`=$id";
	if($con->query($sql)){
		$_SESSION["ok"]="Update profile image successfully done.";
		echo($message);
		
		header("Location:profile.php");
	}else{
		$_SESSION["ok"]="database error";
	}
	
}
	 
if(isset($_GET["id"]) && $_GET["img"]==0){
	$id=$_GET["id"];
	
	$email=$_REQUEST["email"];
	$Name=$_REQUEST["name"];
	$address=$_REQUEST["address"];
	$phone=$_REQUEST["phone"];
	$pass=md5($_REQUEST["pass"]);
	$repeatpass=md5($_REQUEST["repeatpass"]);
	 if($pass ==$repeatpass){
		$sql="UPDATE `user` SET  `email`='$email',`password`='$pass',`name`='$Name',`address`='$address',`phone`='$phone' WHERE `ID`=$id";
	if($con->query($sql)){
		$_SESSION["ok"]="Update profile successfully done.";
		echo($message);
		
		header("Location:profile.php");
	}else{
		$_SESSION["ok"]="database error";
		header("Location:profile.php");
	} 
	 }else{
		 $_SESSION["ok"]="Password dont match..!!";
		 header("Location:profile.php");
	 }
	
	 
}












 ?>
 