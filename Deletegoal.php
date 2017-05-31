<?php
    session_start();
    $conn = new mysqli("mysql.hostinger.in.th","u800381696_admin","z1x2c3","u800381696_mydb");
    $strSQL1 = "DELETE FROM `save_to_buy` WHERE SBUser = '".$_SESSION["user"]."' and SBList = '".$_SESSION["namelist"]."'";
    $objQuery1 =  $conn ->query($strSQL1);
    echo"<script type='text/javascript'>alert('ลบรายการแล้ว');</script>";
    echo("<script>window.location = 'lobby.php';</script>");
?>