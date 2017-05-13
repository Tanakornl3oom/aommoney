<?php
                   session_start();
                   $conn = new mysqli("localhost","root","123456","sapatawajae");
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
                        $_SESSION["user"] = $objResult['LUser'];
                        $_SESSION["email"] = $objResult1['LEmail'];
                        $_SESSION["password"] = $objResult['LPassword'];
                        session_write_close();
                        header("location: lobby.php");
                    }
                    
                    mysql_close();
?>



?>