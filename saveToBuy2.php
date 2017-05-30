<!DOCTYPE html>
<html lang="en">
    <head>
       <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"/>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Save To Buy | A O M M O N E Y</title>
        <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,400italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="assets/css/header/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/header/theme.min.css">
        <link rel="stylesheet" href="assets/css/header/swatch-red-white.min.css">
        <link rel="stylesheet" href="assets/css/header/fonts.min.css" media="screen">
        <link rel="stylesheet" href="assets/css/style-lobby.css"/>
        <link rel="stylesheet" href="assets/css/save-style.css"/>
        <link rel="stylesheet" href="assets/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="assets/css/progress-style.css"/>
        <style>
            table{
              width:100%;
              table-layout: fixed;
            }
            .tbl-header{
              background-color: rgba(255,255,255,0.3);
             }
            .tbl-content{
              height:400px;
              overflow-x:auto;
              margin-top: 0px;
              border: 0px solid rgba(255,255,255,0.3);
            }
            td{
              padding: 5px ;
              text-align: left;
              vertical-align:middle;
              font-weight: 300;
              font-size: 20px;
              color: #fff;
              border-bottom: solid 1px rgba(255,255,255,0.1);
            }

            /* demo styles */
            @import url(http://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
            body{
              font-family: 'Roboto', sans-serif;
            }
            section{
              margin: 50px;
            }


            /* for custom scrollbar for webkit browser*/
            ::-webkit-scrollbar {
                width: 6px;
            } 
            ::-webkit-scrollbar-track {
                -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
            } 
            ::-webkit-scrollbar-thumb {
                -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
            }
            input[type="text"], input[type="text"]{
                width: 250px;
                padding: 5px 10px;
                background: transparent;
                border: 0;
                border-bottom: 0.2px solid #ffffff;
                outline: none;
                color: #ffffff;
                font-size: 20px;
            }
            ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
                color: whitesmoke;
            }
        </style>
               
    </head>
    
    <body class="loading">
		<div id="wrapper">
			<div id="bg"></div>
<!--			<div id="overlay"></div>-->
            
            <!-- HEADER -->
            <?php
                session_start();
               if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
               $conn = new mysqli("mysql.hostinger.in.th","u800381696_admin","z1x2c3","u800381696_mydb");
                $conn->set_charset("utf8");
                   $total = 0.0;
                   $amount = $_REQUEST['txt_moneyToBuy2'];
                  $_SESSION["percent"] =0.0;
                   $tosave = 0;
                   if(empty($amount)){
                         echo"<script type='text/javascript'>alert('กรุณากรอกจำนวนเงิน');</script>";
                   }else{
                      
                       $str = "INSERT INTO `history`(`HDays`, `HType`, `HAmount`) VALUES ('".$_SESSION["days"]."','save_to_goal','".$amount."')";
                       $result = $conn ->query($str); 
                       
                        $strSQL = "SELECT COUNT(*) FROM `save_to_buy` WHERE SBUser = '".$_SESSION["user"]."'";
                        $objQuery =  $conn ->query($strSQL);         
                        $resultuser =   $objQuery->fetch_array();
                        
                       
                        if( $resultuser[0] >=1){
                            $strSQL1 = "SELECT * FROM `save_to_buy` WHERE SBUser = '".$_SESSION["user"]."'";
                            $objQuery1 =  $conn ->query($strSQL1);  
                            while($resultuser1 =  $objQuery1->fetch_array()){
                                $total = $resultuser1['SBAmount'];  
                                $tosave = $resultuser1['SBTo_save'];  
                                $name =  $resultuser1['SBList'];
                            }
                        $total = $total+($amount-($amount-$_SESSION["musthave"]));
                       $tosave = $tosave +($amount-$_SESSION["musthave"]);

                           $strSQLinsert =" INSERT INTO `save_to_buy`(`SBList`, `SBPeriod`, `SBAmount`, `SBTo_save`, `SBPrice_list`, `SBUser`, `SBEmail`, `SBDays`) VALUES ('".$_SESSION["namelist"]."','" .$_SESSION["duration"]."','".$total."','".$tosave."','".$_SESSION["price"]."','".$_SESSION["user"]."','".$_SESSION["email"]."','".$_SESSION["days"]."')";
                            $result = $conn ->query($strSQLinsert); 
            
                     
                            
                        }else{
                             $total = $total+($amount-($amount-$_SESSION["musthave"]));
                             $tosave = $amount-$_SESSION["musthave"];
                            if($amount - $_SESSION["musthave"] > 0){
                           
                           $strSQLinsert =" INSERT INTO `save_to_buy`(`SBList`, `SBPeriod`, `SBAmount`, `SBTo_save`, `SBPrice_list`, `SBUser`, `SBEmail`, `SBDays`) VALUES ('".$_SESSION["namelist"]."','" .$_SESSION["duration"]."','".$total."','".($amount-$_SESSION["musthave"])."','".$_SESSION["price"]."','".$_SESSION["user"]."','".$_SESSION["email"]."','".$_SESSION["days"]."')";
                            $result = $conn ->query($strSQLinsert); 
                       }
                       else{
                           $strSQLinsert =" INSERT INTO `save_to_buy`(`SBList`, `SBPeriod`, `SBAmount`, `SBTo_save`, `SBPrice_list`, `SBUser`, `SBEmail`, `SBDays`) VALUES ('".$_SESSION["namelist"]."','" .$_SESSION["duration"]."','".$total."','0','".$_SESSION["price"]."','".$_SESSION["user"]."','".$_SESSION["email"]."','".$_SESSION["days"]."')";
                            $result = $conn ->query($strSQLinsert); 
                       }
                            
                    }
                       
                        if($result){      
                                    
                                    $_SESSION["percent"]  = (($total+$tosave)/$_SESSION["price"])*100;
//                                    echo"<script type='text/javascript'>alert('".$_SESSION["percent"]."');</script>";
                                    if($total+$tosave >= $_SESSION["price"] || $_SESSION["percent"]>= 100){
                                        $_SESSION["moneyuser"] = $_SESSION["moneyuser"] +  ($_SESSION["price"] - ($total+$tosave));
                                        echo"<script type='text/javascript'>alert('ออม ".$name." สำเร็จแล้ว');</script>";
                                        $strSQL1 = "SELECT *  FROM unlocks WHERE EUser = '". $_SESSION["user"]."' and EName = 'ไม่ง้อพ่อแม่'" ;
                                         $objQuery1 =  $conn ->query($strSQL1);
                                        $objResult = $objQuery1->fetch_array();

                                        if(count($objResult[0])<1){
                                              echo"<script type='text/javascript'>alert('unlocks archievement ไม่ง้อพ่อแม่');</script>";
                                             $strSQL1 = "INSERT INTO `unlocks`(`EUser`, `EEmail`, `EName`) VALUES ('".$_SESSION["user"]."','".$_SESSION["email"]."','ไม่ง้อพ่อแม่')" ;
                                         $objQuery1 = $conn ->query($strSQL1);
                                        }
                                    }else{
                                    
                                        echo"<script type='text/javascript'>alert('เก็บเงินแล้ว');</script>";
                                    }
                                    echo("<script>window.location = 'lobby.php';</script>");
                                    $_SESSION["days"] =  $_SESSION["days"]+1;
                                    
                            }
                             else{
                               echo "เก็บเงินไม่สำเร็จ";
                             }

                   }
                  
               }
            
            
            ?>
            <header id="masthead" class="navbar navbar-sticky swatch-red-white" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".main-navbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="lobby.php" class="navbar-brand">
                        <img src="" alt=""><i class="fa fa-home" aria-hidden="true"></i> 
                    </a>
                </div>
                <nav class="collapse navbar-collapse main-navbar" role="navigation">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown"><a href ="information.php" >information</a></li>
                    	<li class="dropdown"><a href =logout.php >Logout</a></li>     
                    </ul>
                </nav>
            </div>
        </header>
        
        
        <div id="main">
            <!-- Header -->
                <header id="header">
                    <br><br><br><h1>Save to buy list</h1><br>
                    <section>
                                <div class="tbl-content">
                                <table cellpadding="0" cellspacing="0" border="0">
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td>Product Name</td><td></td>
                                            <td> <?php echo $_SESSION["namelist"] ;?></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Product Price</td><td></td>
                                            <td><?php echo $_SESSION["price"] ;?> </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Money for save</td><td></td>
                                            <td><?php echo $_SESSION["musthave"] ;?></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
                                    <input type="text" name="txt_moneyToBuy2" id="YourTextBox" placeholder="Input money to save" autocomplete="off"><br>
                                    <br>
                                        <button type="submit"  value= "submit"  class="btnLogin">Submit</button>&nbsp;&nbsp;<a href="Deletegoal.php" class="btnLogin">Delete</a><br><br>
                                    </form>
                                    <div class="skillbar clearfix " data-percent="<?php echo $_SESSION["percent"]."%" ;?>">
                                        <div class="skillbar-title" style="background: #88cd2a;"><span>GOAL</span></div>
                                        <div class="skillbar-bar" style="background: #88cd2a;"></div>
                                        <div class="skill-bar-percent"><?php echo  $_SESSION["price"] ?></div>
                                    </div>
                                        

                                </div>
                        
                            </section>
                    
                    
                </header>
				<!-- Footer -->
					<footer id="footer">
                        
<!--						<span class="copyright">&copy;Design by <a href="http://www.x-rider.com/">bique14</a></span>-->
					</footer>

			</div>
		</div>
        <script src="assets/js/packages.min.js"></script>
        <script src="assets/js/theme.min.js"></script>
		<script>
			window.onload = function() { document.body.className = ''; }
			window.ontouchmove = function() { return false; }
			window.onorientationchange = function() { document.body.scrollTop = 0; }
		</script>
        <script>jQuery('.skillbar').each(function(){
	jQuery(this).find('.skillbar-bar').animate({
		width:jQuery(this).attr('data-percent')
	},2000);
});</script>
	</body>
</html>
