<?php 
	include("..//config.php");
	$scriptNo = '"'.$mysqli->real_escape_string($_POST['scriptno']).'"';
        $facultyId = '"'.$mysqli->real_escape_string($_POST['facultyId']).'"';

        //MySqli Insert Query
		$insert_row = $mysqli->query("INSERT INTO answerscriptallocation VALUES($scriptNo,$facultyId,'allocated')");
			
		if($insert_row){
			//return total inserted records using mysqli_affected_rows
                        $insert_row1 = $mysqli->query("update answerscript set status='allocated'");
                        date_default_timezone_set('Asia/Kolkata');
                        $date = date('m/d/Y h:i:s a', time());

                        $insert_row = $mysqli->query("insert into notification(date,notification_title,notification_type,notification_desc,regno,status) values($date,'Script Allocated','success','Answerscript: $scriptNo allocated.',$facultyId,'unread')");
                        
                        echo "<script>alert('Allocation successfully<br/>Script ID: $scriptNo')</script>";
                        header( 'Location: page-success.php?id='.$scriptNo.'&msg=Script Allocation successfully');
		}else{
			die(' Error : ('. $mysqli->errno .') '. $mysqli->error);
		}	
?>