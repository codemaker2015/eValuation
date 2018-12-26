<?php 
	include("..//config.php");
	$scriptNo = '"'.$mysqli->real_escape_string($_POST['scriptno']).'"';
        $mark = '"'.$mysqli->real_escape_string($_POST['mark']).'"';
        
        // Upload and Rename File

        if (isset($_POST['submit']))
        {
            session_start();

            //MySqli Insert Query
            $insert_row = $mysqli->query("INSERT INTO result VALUES($scriptNo,$mark,'added')");

            if($insert_row){
                    //return total inserted records using mysqli_affected_rows

                    date_default_timezone_set('Asia/Kolkata');
                    $date = date('d-m-Y H:i', time());

                    $insert_row = $mysqli->query("insert into notification(date,notification_title,notification_type,notification_desc,regno,status) values('$date','Script Valuated','success','Script Valuated with ID: $scriptNo','0','unread')");
                      
                
                    echo "<script>alert('Successfully Uploaded <br/>Script No: $scriptNo')</script>";
                    header( 'Location: page-success.php?id='.$scriptNo.'&msg=Mark Added successfully');
            }else{
                    die(' Error : ('. $mysqli->errno .') '. $mysqli->error);
            }
        }
                
?>