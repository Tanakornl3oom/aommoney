<?php
    session_start();
    $conn = new mysqli("xxxx","xxxx","xxxx","xxxx");
    $strSQL1 = "DELETE FROM `save_to_buy` WHERE SBUser = '".$_SESSION["user"]."' and SBList = '".$_SESSION["namelist"]."'";
    $objQuery1 =  $conn ->query($strSQL1);
    echo"<script type='text/javascript'>alert('ลบรายการแล้ว');</script>";
    echo("<script>window.location = 'lobby.php';</script>");
?>
