<?php 
	include("..//config.php");
	$courseId = '"'.$mysqli->real_escape_string($_POST['courseId']).'"';
        $name = '"'.$mysqli->real_escape_string($_POST['cname']).'"';
	$duration = '"'.$mysqli->real_escape_string($_POST['duration']).'"';
	$nofsem = '"'.$mysqli->real_escape_string($_POST['nofsem']).'"';
		//MySqli Insert Query
		$insert_row = $mysqli->query("INSERT INTO course VALUES($courseId,$name,$duration,$nofsem)");
			
		if($insert_row){
			//return total inserted records using mysqli_affected_rows
                        echo "<script>alert('Registration successfully<br/>Course ID: $courseId')</script>";
                        header( 'Location: page-success.php?id='.$courseId.'&msg=Course Registered successfully');
		}else{
			die(' Error : ('. $mysqli->errno .') '. $mysqli->error);
		}	
?>