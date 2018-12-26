<?php
    include('..//config.php');
    
    $sql= 'update result set status="published" where scriptno='.$_GET['scriptno'];
    $results=$mysqli->query($sql);
    
    $sql = 'select studentId,sem from answerscript where scriptNo ='.$_GET['scriptno'];
    $results=$mysqli->query($sql);
    $row=$results->fetch_array();
            
    date_default_timezone_set('Asia/Kolkata');
    $date = date('m/d/Y h:i:s a', time());

    $insert_row = $mysqli->query("insert into notification(date,notification_title,notification_type,notification_desc,regno,status) values($date,'Result Publised','success','Result published for semester: $row[1] allocated.',$row[0],'unread')");
                       
    header("Location: publish_result.php");
?>
