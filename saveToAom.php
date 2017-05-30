<!DOCTYPE html>
<html lang="en">
    <head>
       <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"/>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Save To Aom | A O M M O N E Y</title>
        <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,400italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="assets/css/header/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/header/theme.min.css">
        <link rel="stylesheet" href="assets/css/header/swatch-red-white.min.css">
        <link rel="stylesheet" href="assets/css/header/fonts.min.css" media="screen">
        <link rel="stylesheet" href="assets/css/style-lobby.css"/>
        <link rel="stylesheet" href="assets/css/font-awesome.min.css"/>
        <style type="text/css">
            input[type="text"], input[type="text"]{
                width: 250px;
                padding: 5px 10px;
                background: transparent;
                border: 0;
                border-bottom: 0.2px solid #ffffff;
                outline: none;
                color: #ffffff;
                font-size: 30px;
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
               $conn = new mysqli("localhost","u800381696_admin","z1x2c3","u800381696_mydb");
                $conn->set_charset("utf8");
              
            $amount = $_REQUEST['txt_id'];
            if(empty($amount)){
                    echo"<script type='text/javascript'>alert('โปรดกรอกจำนวนเงิน');</script>";
            }
            else{
                $str = "INSERT INTO `history`(`HDays`, `HType`, `HAmount`) VALUES ('".$_SESSION["days"]."','saving','".$amount."')";
                $result =  $conn ->query($str); 
               
                 
            $strSQL = "SELECT COUNT(*) FROM `saving` WHERE SUser = '".$_SESSION["user"]."'";
            $objQuery =   $conn ->query($strSQL);         
            $resultuser =  $objQuery->fetch_array();
               
            //total = total+amount
            if( $resultuser[0] >=1){
                $strSQL1 = "SELECT * FROM `saving` WHERE STimes = '".($_SESSION["STimes"]-1)."'";
                $objQuery1 =   $conn ->query($strSQL1);  
                    while($resultuser1 = $objQuery1->fetch_array()){
                         $total =$resultuser1['STotal'];    
                    }
                
                $total = $total+$amount;
             
                
                $strSQLinsert = "INSERT INTO `saving`(`STimes`, `STotal`, `SAmount`, `SUser`, `SEmail`, `SDays`) VALUES ('".$_SESSION["STimes"]."','".$total."','".$amount."','".$_SESSION["user"]."','".$_SESSION["email"]."','".$_SESSION["days"]."')";
                 $result =  $conn ->query($strSQLinsert); 
            }
            //total = amount
            else{
               
                 $strSQLinsert = "INSERT INTO `saving`(`STimes`, `STotal`, `SAmount`, `SUser`, `SEmail`, `SDays`) VALUES ('".$_SESSION["STimes"]."','".$amount."','".$amount."','".$_SESSION["user"]."','".$_SESSION["email"]."','".$_SESSION["days"]."')";
                 $result = $conn ->query($strSQLinsert);
              
            }
               if($result){      
                   $_SESSION["moneyuser"] = $_SESSION["moneyuser"]+ $amount ;           
                    echo"<script type='text/javascript'>alert('saving successful');</script>";
                   if($total >=100 || $amount >=100 ){
                       $strSQL1 = "SELECT COUNT(*)  FROM unlocks WHERE EUser = '". $_SESSION["user"]."' and EName = 'เจ้าสัวน้อย'" ;
                         $objQuery1 = $conn ->query($strSQL1);
                        $objResult = $objQuery1->fetch_array();

                        if($objResult[0]<1){
                              echo"<script type='text/javascript'>alert('unlocks archievement เจ้าสัวน้อย.');</script>";
                             $strSQL1 = "INSERT INTO `unlocks`(`EUser`, `EEmail`, `EName`) VALUES ('".$_SESSION["user"]."','".$_SESSION["email"]."','เจ้าสัวน้อย')" ;
                         $objQuery1 = $conn ->query($strSQL1);
                        }
                   }
                   if ( $amount >=1000000 ){
                       $strSQL1 = "SELECT COUNT(*)  FROM unlocks WHERE EUser = '". $_SESSION["user"]."' and EName = 'อีขี้โกง'" ;
                         $objQuery1 = $conn ->query($strSQL1);
                        $objResult =  $objQuery1->fetch_array();

                        if($objResult[0]<1){
                              echo"<script type='text/javascript'>alert('unlocks archievement อีขี้โกง.');</script>";
                             $strSQL1 = "INSERT INTO `unlocks`(`EUser`, `EEmail`, `EName`) VALUES ('".$_SESSION["user"]."','".$_SESSION["email"]."','อีขี้โกง')" ;
                         $objQuery1 = $conn->query($strSQL1);
                        }
                   }else{
                       $strSQL1 = "SELECT COUNT(*)  FROM unlocks WHERE EUser = '". $_SESSION["user"]."' and EName = 'หัดเก็บเงินบ้าง'" ;
                         $objQuery1 = $conn->query($strSQL1);
                        $objResult =  $objQuery1->fetch_array();
                        if($objResult[0]<1){
                              echo"<script type='text/javascript'>alert('unlocks archievement หัดเก็บเงินบ้าง.');</script>";
                             $strSQL1 = "INSERT INTO `unlocks`(`EUser`, `EEmail`, `EName`) VALUES ('".$_SESSION["user"]."','".$_SESSION["email"]."','หัดเก็บเงินบ้าง')" ;
                         $objQuery1 = $conn ->query($strSQL1);
                        }
                   }
                   
                    echo("<script>window.location = 'lobby.php';</script>");
                    $_SESSION["days"] =  $_SESSION["days"]+1;
                     $_SESSION["STimes"] = $_SESSION["STimes"]+1;
                }
                else{
                   echo "saving failed";
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
                    <h1>Save to Aom</h1><br>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
                    <input type="text" name="txt_id" id="YourTextBox" placeholder="Money" autocomplete="off"><br><br>
                    <button type="submit"  value= "submit"; class="btnLogin">Submit</button>
                    </form>
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
	</body>
</html>
