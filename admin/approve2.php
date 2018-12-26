<?php
    include('..//config.php');
    $sql= 'update student set status="approved" where regno='.$_GET['regno'];							
    $results=$mysqli->query($sql);
    header("Location: approve_student.php");
?>
