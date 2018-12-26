<?php
    include('..//config.php');
    $sql= "delete from student where regno=".$_GET['regno'];							
    $results=$mysqli->query($sql);
    $sql= "delete from login where regno=".$_GET['regno'];							
    $results=$mysqli->query($sql);
    
    header("Location: approve_student.php");
?>
