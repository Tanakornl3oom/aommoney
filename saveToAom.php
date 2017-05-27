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
               $host = "localhost";
                $username = "root";
                $password = "123456";
                $dbname = "sapatawajae";
                $objConnect =  mysqli_connect($host,$username,$password,$dbname);
            $amount = $_REQUEST['txt_id'];
            if(empty($amount)){
                    echo"<script type='text/javascript'>alert('โปรดกรอกจำนวนเงิน');</script>";
            }
            else{
                $str = "INSERT INTO `history`(`HDays`, `HType`, `HAmount`) VALUES ('2','saving','".$amount."')";
                $result = mysqli_query($objConnect, $str);
               
                 
            $strSQL = "SELECT `*` FROM `saving` WHERE STimes = '1'";
            $objQuery =  mysqli_query($objConnect,$strSQL);         
//            $resultuser =  mysqli_fetch_array($objQuery);
               echo"<script type='text/javascript'>alert('".mysqli_num_rows($objQuery) ."');</script>";
             
            //total = total+amount
            if(mysqli_num_rows($objQuery) >=1){
               
                
//                    $total=$resultuser['STotal'];
                    while($resultuser = mysqli_fetch_array($objQuery)){
//                         $total =$resultuser['STotal'];
                        
                        
                    }
//              echo"<script type='text/javascript'>alert('".$total."');</script>";
                $total = $total+$amount;
               
                
                $strSQLinsert = "INSERT INTO `saving`(`STimes`, `STotal`, `SAmount`, `SUser`, `SEmail`, `SDays`) VALUES ('".$_SESSION["STimes"]."','".$total."','".$amount."','".$_SESSION["user"]."','".$_SESSION["email"]."','2')";
                 $result = mysqli_query($objConnect, $strSQLinsert);
            }
            //total = amount
            else{
               
                 $strSQLinsert = "INSERT INTO `saving`(`STimes`, `STotal`, `SAmount`, `SUser`, `SEmail`, `SDays`) VALUES ('".$_SESSION["STimes"]."','".$amount."','".$amount."','".$_SESSION["user"]."','".$_SESSION["email"]."','".$_SESSION["days"]."')";
                 $result = mysqli_query($objConnect, $strSQLinsert);
              
            }
               if($result){      
                    echo"<script type='text/javascript'>alert('Registration successful');</script>";
                        echo("<script>window.location = 'lobby.php';</script>");
                      $_SESSION["days"] =  $_SESSION["days"]+1;
                }
                else{
                   echo "Registration failed";
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
