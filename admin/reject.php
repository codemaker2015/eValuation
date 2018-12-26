<?php
    include('..//config.php');
    $sql= "delete from faculty where regno=".$_GET['regno'];							
    $results=$mysqli->query($sql);
    $sql= "delete from login where regno=".$_GET['regno'];							
    $results=$mysqli->query($sql);
 
    header("Location: approve_faculty.php");
?>
