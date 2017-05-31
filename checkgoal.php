<?php
    session_start();
    $conn = new mysqli("xxxx","xxxx","xxxx","xxxx");
    if($conn->connect_error){
       die("Connection failed:" .$conn->connect_error);
    }

    $strSQL = "SELECT COUNT(*) FROM save_to_buy WHERE SBUser = '".$_SESSION["user"]."'";
    $objQuery = $conn ->query($strSQL);
    $objResult = $objQuery->fetch_array();
    //  echo"<script type='text/javascript'>alert('".$objResult[0]."');</script>";
    if($objResult[0]>=1){
        $strSQL = "SELECT * FROM save_to_buy WHERE SBUser = '".$_SESSION["user"]."'";
        $objQuery = $conn ->query($strSQL);

        while($result = $objQuery->fetch_array()){
            $price = $result["SBPrice_list"];
            $amount = $result["SBAmount"];
            $To_save = $result["SBTo_save"];
            $Period =  $result["SBPeriod"];
            $name = $result["SBList"];
        }
        if($amount +$To_save >=  $price ||($amount +$To_save) ==0 ){
            // unlock ach 
            //header stb1

            $sql =  "UPDATE `save_to_buy` SET SBAmount = '0' ,  SBTo_save= '0' WHERE SBList = '".$name."' ";
            $objQuery= $conn ->query($sql);
            $_SESSION["percent"] =0.0;
            echo"<script type='text/javascript'>alert('ตั้งเป้าหมายใหม่กัน');</script>";
            echo("<script>window.location = 'saveToBuy.php ';</script>");

        } else{
            // hearder stb2
            //musthave have sql
            
            $strSQL = "SELECT * FROM save_to_buy WHERE SBUser = '".$_SESSION["user"]."'";
            $objQuery = $conn ->query($strSQL);
            while($result = $objQuery->fetch_array()){
                $_SESSION["namelist"] = $result["SBList"];
                $_SESSION["price"] = $result["SBPrice_list"];
                $_SESSION["duration"] = $result["SBPeriod"];
            }
            $_SESSION["percent"]  = (($amount+$To_save)/$_SESSION["price"])*100;
            $_SESSION["musthave"]  = ($_SESSION["price"] /  $_SESSION["duration"]);
            echo("<script>window.location = 'saveToBuy2.php';</script>");
        } 
        
    }else{
        //haeader stb1
        if(!empty($_SESSION["namelist"]) && !empty($_SESSION["price"])&& !empty($_SESSION["duration"])){
            //musthave no sql
            echo("<script>window.location = 'saveToBuy2.php';</script>");    
        }
        else{
            echo("<script>window.location = 'saveToBuy.php';</script>");    
        }
        
    }



?>