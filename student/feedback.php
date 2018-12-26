<?php 
	include("config.php");
	$name = '"'.$mysqli->real_escape_string($_POST['uname']).'"';
	$email = '"'.$mysqli->real_escape_string($_POST['uemail']).'"';
	$feedback = '"'.$mysqli->real_escape_string($_POST['feedback']).'"';
	$attachment = '"'.$mysqli->real_escape_string($_POST['ufile']).'"';
		//MySqli Insert Query
		$insert_row1 = $mysqli->query("INSERT INTO tbl_feedback VALUES($name,$email,$feedback,$attachment)");
		
                $path = "uploads/";
		
		//$file_name = $_FILES['ufile']['name'];
		if(move_uploaded_file("D:/Images/my/".$attachment, $path))
			echo "The file ". $attachment ." has been uploaded";
		else
			echo 'Error occurs while uploading files';
		
		if($insert_row1){
			echo "<script>alert('Query submited successfully')</script>";
                        header( 'Location: contact.php');
		}else{
			die(' Error : ('. $mysqli->errno .') '. $mysqli->error);
		}
		
?>