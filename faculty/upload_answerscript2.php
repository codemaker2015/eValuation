<?php 
	include("..//config.php");
	$scriptNo = '"'.$mysqli->real_escape_string($_POST['scriptno']).'"';
        $studentId = '"'.$mysqli->real_escape_string($_POST['studentId']).'"';
	$courseId = '"'.$mysqli->real_escape_string($_POST['courseId']).'"';
	$subjectId = '"'.$mysqli->real_escape_string($_POST['subjectId']).'"';
	$sem = '"'.$mysqli->real_escape_string($_POST['sem']).'"';
        $year = '"'.$mysqli->real_escape_string($_POST['year']).'"';
        
        // Upload and Rename File

        if (isset($_POST['submit']))
        {
                session_start();
                
                $filename = $_FILES["file"]["name"];
                $file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
                $file_ext = substr($filename, strripos($filename, '.')); // get file name
                $filesize = $_FILES["file"]["size"];
                $allowed_file_types = array('.pdf');	
                $newfilename = "";
                
                if (in_array($file_ext,$allowed_file_types) && ($filesize < 20000000))
                {	
                        // Rename file
                        $newfilename = $_POST['scriptno'] . $file_ext;
                        if (file_exists($_SERVER['DOCUMENT_ROOT']."/evaluation/uploads/" . $newfilename))
                        {
                                // file already exists error
                                echo "You have already uploaded this file.";
                        }
                        else
                        {		
                                echo $_FILES["file"]["tmp_name"];
                                move_uploaded_file($_FILES["file"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/evaluation/uploads/" . $newfilename);
                                echo "File uploaded successfully.";		
                        }
                }
                elseif (empty($file_basename))
                {	
                        // file selection error
                        echo "Please select a file to upload.";
                } 
                elseif ($filesize > 20000000)
                {	
                        // file size error
                        echo "The file you are trying to upload is too large.";
                }
                else
                {
                        // file type error
                        echo "Only these file typs are allowed for upload: " . implode(', ',$allowed_file_types);
                        unlink($_FILES["file"]["tmp_name"]);
                }
             
            //MySqli Insert Query
            $insert_row = $mysqli->query("INSERT INTO answerscript VALUES($scriptNo,$studentId,$courseId,$subjectId,$sem,$year,'".$_SESSION['regno']."','".$newfilename."','uploaded')");

            if($insert_row){
                    //return total inserted records using mysqli_affected_rows
                    
                    date_default_timezone_set('Asia/Kolkata');
                    $date = date('d-m-Y H:i', time());

                    $insert_row = $mysqli->query("insert into notification(date,notification_title,notification_type,notification_desc,regno,status) values('$date','Script Uploaded','success','Script Uploaded with ID: $scriptNo','0','unread')");
                      
                
                    echo "<script>alert('Successfully Uploaded <br/>Script No: $scriptNo')</script>";
                    header( 'Location: page-success.php?id='.$scriptNo.'&msg=Answerscript upload successfully');
            }else{
                    die(' Error : ('. $mysqli->errno .') '. $mysqli->error);
            }
        }
                
?>