<?php 
	include("..//config.php");
	$name = '"'.$mysqli->real_escape_string($_POST['uname']).'"';
	$address = '"'.$mysqli->real_escape_string($_POST['uaddress']).'"';
	$email = '"'.$mysqli->real_escape_string($_POST['uemail']).'"';
	$phone = '"'.$mysqli->real_escape_string($_POST['uphone']).'"';
		//MySqli Insert Query
		$insert_row = $mysqli->query("INSERT INTO college(name,address,email,phone) VALUES($name,$address,$email,$phone)");
			
		if($insert_row){
			//return total inserted records using mysqli_affected_rows
                        $results = $mysqli->query("SELECT MAX(collegeId) FROM college");
                        $row=$results->fetch_array();
			echo "<script>alert('Registration successfully<br/>College ID: $row[0]')</script>";
                        header( 'Location: page-success.php?id='.$row[0].'&msg=College registered successfully');
		}else{
			die(' Error : ('. $mysqli->errno .') '. $mysqli->error);
		}
		
?>