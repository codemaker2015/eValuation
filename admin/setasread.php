<?php
	include('../config.php');
	$sql = 'update notification set status = "read" where notification_id ='.$_GET['id'];
	$result=$mysqli->query($sql);

	header("Location: notifications.php");
?>