<?php
	session_start();
	session_destroy();
    $conn = new mysqli("mysql.hostinger.in.th","u800381696_admin","z1x2c3","u800381696_mydb");
    $sql = "UPDATE `archievements` SET AStatus = 'No'";
    $conn ->query($sql);
	header("location:login.html");
?>