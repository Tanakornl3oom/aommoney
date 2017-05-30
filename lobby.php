<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"/>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>A O M M O N E Y</title>
        <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,400italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="assets/css/header/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/header/theme.min.css">
        <link rel="stylesheet" href="assets/css/header/swatch-red-white.min.css">
        <link rel="stylesheet" href="assets/css/header/fonts.min.css" media="screen">
        <link rel="stylesheet" href="assets/css/style-lobby.css"/>
        <link rel="stylesheet" href="assets/css/font-awesome.min.css"/>
    </head>
    
    <body class="loading">
		<div id="wrapper">
			<div id="bg"></div>
<!--			<div id="overlay"></div>-->
            <?php
	               session_start(); mysql_connect("mysql.hostinger.in.th","u800381696_admin","z1x2c3");
                    mysql_select_db("u800381696_mydb");
                if($_SESSION["user"] != ""){
                    $strSQL = "SELECT * FROM login WHERE LUser = '". $_SESSION["user"]."' " ;
                    $objQuery = mysql_query($strSQL);
	               $objResult = mysql_fetch_array($objQuery);
                     $_SESSION["email"] = $objResult['LEmail'];
                }else{
                    $strSQL = "SELECT * FROM login WHERE LEmail = '". $_SESSION["email"]."'" ;
                    $objQuery = mysql_query($strSQL);
	               $objResult = mysql_fetch_array($objQuery);
                    $_SESSION["user"] = $objResult['LUser'];
                }
                $_SESSION["name"]  =$objResult['LName'];
                    $_SESSION["lastname"]=$objResult['LLastName'];
                    $_SESSION["type"]=$objResult['LType'];
                    $_SESSION["money"] =$objResult['LMoney'];
               
          
                session_write_close();
	          
            ?>
            <!-- HEADER -->
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
                    	<li class="dropdown"><a href =# ><?php echo "จำนวนเงิน".$_SESSION["moneyuser"]."$";?></a></li>
                    	<li class="dropdown"><a href =logout.php >Logout</a></li>   
                     
                    </ul>
                    
                </nav>
            </div>
        </header>
        
        
        <div id="main">
            <!-- Header -->
            
                <header id="header">
                    <i class="fa fa-user-circle-o" aria-hidden="true"></i><br><br><br><br>
                    <h1><?php echo  $_SESSION["name"];?></h1>
                    <nav>
                        <ul>
                            <li><a href="chooseType.php" class="fa fa-money" title="Choose Save"><span class="label">Go</span></a></li>
                            <li><a href="information.php" class="fa fa-user" title="User information"><span class="label">Go</span></a></li>
                            <li><a href="history.php" class="fa fa-history" title="History"><span class="label">Go</span></a></li>
                            <li><a href="archievement.php" class="fa fa-star" title="Archievement"><span class="label">Go</span></a></li>
                            
                        </ul>
                    </nav>
                
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
