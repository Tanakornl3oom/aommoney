<?php
                   session_start();
                    $_SESSION["user"] = "";
                    $_SESSION["email"] = "";
                    $_SESSION["password"] = "";
                   $conn = new mysqli("mysql.hostinger.in.th","u800381696_admin","z1x2c3","u800381696_mydb");
                   $conn->set_charset("utf8");
                    if($conn->connect_error){
	                   die("Connection failed:" .$conn->connect_error);
                    }

                    $username = $_REQUEST['txt_id'];
                    $password = $_REQUEST['txt_password'];

                    $strSQL = "SELECT * FROM login WHERE LUser = '".$username."' and LPassword = '".$password."'";
                    $objQuery = $conn ->query($strSQL);
                    $objResult = $objQuery->fetch_array();

                    $strSQL1 = "SELECT * FROM login WHERE LEmail = '".$username."' and LPassword = '".$password."'";
                    $objQuery1 = $conn ->query($strSQL1);
                    $objResult1 = $objQuery1->fetch_array();

                    if(!$objResult1 && !$objResult){
                        
                         echo"<script type='text/javascript'>alert('Username or Password Incorrect!');</script>";
                        echo("<script>window.location = 'login.html';</script>");
                    }
                    else{
                        if($objResult){
                            $_SESSION["user"] = $objResult['LUser'];
                        $_SESSION["email"] = $objResult['LEmail'];
                        $_SESSION["password"] = $objResult['LPassword'];
                        }else{
                              $_SESSION["user"] = $objResult1['LUser'];
                        $_SESSION["email"] = $objResult1['LEmail'];
                        $_SESSION["password"] = $objResult1['LPassword'];
                        }
                      
                        
                        
                $strSQL = "SELECT COUNT(*) FROM `saving` WHERE SUser = '".$_SESSION["user"]."'";
                $objQuery =  $conn ->query($strSQL);         
                $resultuser =  $objQuery->fetch_array();
//                 echo"<script type='text/javascript'>alert('".$resultuser[0]."====');</script>";
                if($resultuser[0] >=1){
                        $strSQL1 = "SELECT * FROM `saving` WHERE SUser = '".$_SESSION["user"]."'";
                        $objQuery1 =  $conn ->query($strSQL1); 
                    $_SESSION["moneyuser"] = 0;
                    while($resultuser1 = $objQuery1->fetch_array()){
                         $_SESSION["STimes"]  =$resultuser1['STimes']; 
                        $_SESSION["moneyuser"] =   $resultuser1['STotal']; 
//                        $_SESSION["days"] 
                    }
                     $_SESSION["STimes"] = $_SESSION["STimes"] +1;
                    
                }else{
                    $_SESSION["STimes"] = 1;
                    $_SESSION["moneyuser"] = 0;
                   
                }
                        
                        $strSQL = "SELECT COUNT(*) FROM `save_to_buy` WHERE SBUser = '".$_SESSION["user"]."'";
                $objQuery =  $conn ->query($strSQL);         
                $resultuser =  $objQuery->fetch_array();
                        
                          if($resultuser[0] >=1){
                        $strSQL1 = "SELECT * FROM `save_to_buy` WHERE SBUser = '".$_SESSION["user"]."'";
                        $objQuery1 =  $conn ->query($strSQL1); 
                    while($resultuser1 = $objQuery1->fetch_array()){
                          $_SESSION["namelist"]  =$resultuser1['SBList']; 
                         $_SESSION["price"]  = $resultuser1['SBPrice_list'];
                        $_SESSION["duration"]  = $resultuser1['SBPeriod'];
                    }
                               $_SESSION["musthave"] =  $_SESSION["price"]/ $_SESSION["price"];
                          }
                    
                  $strSQL = "SELECT COUNT(*) FROM `history` ";
                $objQuery =  $conn ->query($strSQL);         
                $resultuser =  $objQuery->fetch_array();
                        
                          if($resultuser[0] >=1){
                        $strSQL1 = "SELECT * FROM `history` ";
                        $objQuery1 =  $conn ->query($strSQL1); 
                    while($resultuser1 = $objQuery1->fetch_array()){
                          $_SESSION["days"]  =$resultuser1['HDays']; 
                         
                    }
                             $_SESSION["days"]  = $_SESSION["days"] +1;
                          }
                        else{
                             $_SESSION["days"] = 1;
                        }
                      $strSQL4 = "SELECT COUNT(*) FROM `archievements`";
                      $objQuery4 =  $conn ->query($strSQL4);         
                $resultuser =  $objQuery4->fetch_array();
                        if($resultuser[0]<=0){
                            
                            $sql1 = "INSERT INTO `archievements`(`AName`, `AStatus`, `ADetails`) VALUES ('มาออมกัน','No','เข้าสู่ระบบครั้งแรก')";
                            $sql2 = "INSERT INTO `archievements`(`AName`, `AStatus`, `ADetails`) VALUES ('หัดเก็บเงินบ้าง','No','เริ่มต้นออมเงินครั้งแรก')";
                            $sql3 = "INSERT INTO `archievements`(`AName`, `AStatus`, `ADetails`) VALUES ('อีขี้โกง','No','ออมเงินเยอะเกิน')";
                            $sql4 = "INSERT INTO `archievements`(`AName`, `AStatus`, `ADetails`) VALUES ('เจ้าสัวน้อย','No','ออมเงินครบ100บาท')";
                            $sql5= "INSERT INTO `archievements`(`AName`, `AStatus`, `ADetails`) VALUES ('ไม่ง้อพ่อแม่','No','ออมเงินเพื่อซื้อได้1ครั้ง')";
                         
                            $objQuery1 =  $conn ->query($sql1); 
                          $objQuery2 =  $conn ->query($sql2); 
                          $objQuery3 =  $conn ->query($sql3); 
                          $objQuery4 =  $conn ->query($sql4); 
                          $objQuery5 =  $conn ->query($sql5); 
                    
                        }
                        
                 $strSQL1 = "SELECT *  FROM unlocks WHERE EUser = '".$_SESSION["user"]."' and EName = 'มาออมกัน'" ;
             $objQuery1 =  $conn ->query($strSQL1);      
            $objResult =$objQuery1->fetch_array();
            
            if(count($objResult[0])<1){
                  echo"<script type='text/javascript'>alert('unlocks archievement มาออมกัน');</script>";
//                INSERT INTO `unlocks`(`EUser`, `EEmail`, `EName`) VALUES ([value-1],[value-2],[value-3])
                
                 $strSQL1 = "INSERT INTO `unlocks`(`EUser`, `EEmail`, `EName`) VALUES ('".$_SESSION["user"]."','".$_SESSION["email"]."','มาออมกัน')" ;
             $objQuery1 =  $conn ->query($strSQL1); 
            }
                        session_write_close();
                        echo("<script>window.location = 'lobby.php';</script>");
                    }
                    
                    mysql_close();
?>



?>