<?php
    include('..//config.php');
    $sql= 'update faculty set status="approved" where regno='.$_GET['regno'];							
    $results=$mysqli->query($sql);
    header("Location: approve_faculty.php");
?>
