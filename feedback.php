<?php 
	include("config.php");
	$name = '"'.$mysqli->real_escape_string($_POST['uname']).'"';
	$email = '"'.$mysqli->real_escape_string($_POST['uemail']).'"';
	$feedback = '"'.$mysqli->real_escape_string($_POST['feedback']).'"';
	$attachment = '"'.$mysqli->real_escape_string($_POST['file']).'"';
		
        $filename = $_FILES["file"]["name"];
        $file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
        $file_ext = substr($filename, strripos($filename, '.')); // get file name
        $filesize = $_FILES["file"]["size"];
        $allowed_file_types = array('.pdf','.doc','.txt','.jpg','.png');	
        $newfilename = "";

        //MySqli Insert Query
        $insert_row1 = $mysqli->query("INSERT INTO feedback(name,email,feedback,file) VALUES($name,$email,$feedback,$attachment)");
		

                if (in_array($file_ext,$allowed_file_types) && ($filesize < 20000000))
                {	
                        // Rename file
                        
                        if (file_exists($_SERVER['DOCUMENT_ROOT']."/evaluation/uploads/" . $filename))
                        {
                                // file already exists error
                                echo "You have already uploaded this file.";
                        }
                        else
                        {		
                                echo $_FILES["file"]["tmp_name"];
                                move_uploaded_file($_FILES["file"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/evaluation/uploads/" . $filename);
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
             
		
		if($insert_row1){
			echo "<script>alert('Query submited successfully')</script>";
                        header( 'Location: contact.php');
		}else{
			die(' Error : ('. $mysqli->errno .') '. $mysqli->error);
		}
		
?>