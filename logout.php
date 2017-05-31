<?php
	session_start();
	session_destroy();
    $conn = new mysqli("xxxx","xxxx","xxxx","xxxx");
    $sql = "UPDATE `archievements` SET AStatus = 'No'";
    $conn ->query($sql);
	header("location:login.html");
?>