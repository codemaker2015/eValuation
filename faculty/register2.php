<?php 
	include("..//config.php");
	$name = '"'.$mysqli->real_escape_string($_POST['uname']).'"';
	$address = '"'.$mysqli->real_escape_string($_POST['address']).'"';
        $gender = '"'.$mysqli->real_escape_string($_POST['gender']).'"';
	$phone = '"'.$mysqli->real_escape_string($_POST['uphone']).'"';
	$email = '"'.$mysqli->real_escape_string($_POST['uemail']).'"';
        $collegeId = '"'.$mysqli->real_escape_string($_POST['collegeId']).'"';
	$department = '"'.$mysqli->real_escape_string($_POST['department']).'"';
        $designation = '"'.$mysqli->real_escape_string($_POST['designation']).'"';
        $username = '"'.$mysqli->real_escape_string($_POST['username']).'"';
        $passwd = '"'.$mysqli->real_escape_string($_POST['passwd']).'"';
	$home_pic = '"'.$mysqli->real_escape_string($_POST['hfile']).'"';
	$status = '"'.$mysqli->real_escape_string("registered").'"';
        $status2 = '"'.$mysqli->real_escape_string("faculty").'"';
        //MySqli Insert Query
        
		$insert_row1 = $mysqli->query("INSERT INTO faculty(name,address,gender,phone,email,collegeId,department,designation,status) VALUES($name,$address,$gender,$phone,$email,$collegeId,$department,$department,$status)");
			
		if($insert_row1){
			//return total inserted records using mysqli_affected_rows
			
                        $results = $mysqli->query("SELECT MAX(regno) FROM faculty");
                        $row=$results->fetch_array();
                        
                        date_default_timezone_set('Asia/Kolkata');
                        $date = date('d-m-Y H:i', time());

                        $insert_row = $mysqli->query("insert into notification(date,notification_title,notification_type,notification_desc,regno,status) values('$date','Faculty Registered','success','Faculty registered with ID: $row[0]','0','unread')");
                      
                        $insert_row2 = $mysqli->query("INSERT INTO login VALUES($username,$passwd,$row[0],$status2)");
                        if(!$insert_row2){
                            die(' Error : ('. $mysqli->errno .') '. $mysqli->error);
                        }
			echo "<script>alert('Registration successfully<br/>Reg ID: $row[0]')</script>";
                        header( 'Location: page-success.php?id='.$row[0].'&msg=Faculty registered ');
		}else{
			die(' Error : ('. $mysqli->errno .') '. $mysqli->error);
		}
		
?>