<?php 
	include("..//config.php");
	$subjectId = '"'.$mysqli->real_escape_string($_POST['subjectId']).'"';
        $name = '"'.$mysqli->real_escape_string($_POST['sname']).'"';
	$courseId = '"'.$mysqli->real_escape_string($_POST['courseId']).'"';
	$sem = '"'.$mysqli->real_escape_string($_POST['sem']).'"';
		//MySqli Insert Query
		$insert_row = $mysqli->query("INSERT INTO subject VALUES($subjectId,$name,$courseId,$sem)");
			
		if($insert_row){
			//return total inserted records using mysqli_affected_rows
                       
			echo "<script>alert('Registration successfully<br/>Subject ID: $subjectId')</script>";
                         header( 'Location: page-success.php?id='.$subjectId.'&msg=Subject registered successfully');
       
		}else{
			die(' Error : ('. $mysqli->errno .') '. $mysqli->error);
		}
		
?>