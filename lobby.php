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
            
            <!-- HEADER -->
            <header id="masthead" class="navbar navbar-sticky swatch-red-white" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".main-navbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                    <a href="lobby.html" class="navbar-brand">
                        <img src="" alt=""><i class="fa fa-home" aria-hidden="true"></i> 
                    </a>
                </div>
                <nav class="collapse navbar-collapse main-navbar" role="navigation">
                    <ul class="nav navbar-nav navbar-right">
                    	<li class="dropdown"><a href =# >จำนวนเงิน $</a></li>
                    	<li class="dropdown"><a href =login.html >Logout</a></li>     
                    </ul>
                    
                </nav>
            </div>
        </header>
        
        
        <div id="main">
            <!-- Header -->
            <?php
	               session_start();
//	               if( $_SESSION["user"] == "")
//	           {
//                    echo"<script type='text/javascript'>alert('Username or Password Incorrect!');</script>";
//                    echo("<script>window.location = 'login.html';</script>");
//	           }
                echo"<script type='text/javascript'>alert('".$_SESSION["user"]." and ".$_SESSION["email"]."');</script>";
                
	           mysql_connect("localhost","root","123456");
	           mysql_select_db("sapatawajae");
                if($_SESSION["user"] != ""){
                    $strSQL = "SELECT * FROM login WHERE LUser = '". $_SESSION["user"]."' " ;
                    $objQuery = mysql_query($strSQL);
	               $objResult = mysql_fetch_array($objQuery);
                }else{

                    $strSQL = "SELECT * FROM login WHERE LEmail = '". $_SESSION["email"]."'" ;
                    $objQuery = mysql_query($strSQL);
	               $objResult = mysql_fetch_array($objQuery);
                
                }
	          
?>
                <header id="header">
                    <i class="fa fa-user-circle-o" aria-hidden="true"></i><br><br><br><br>
                    <h1><?php echo $objResult["LName"];?></h1>
                    <nav>
                        <ul>
                            
                            <li><a href="chooseType.html" class="fa fa-money" title="Choose Save"><span class="label">Go</span></a></li>
                            <li><a href="information.html" class="fa fa-user" title="User information"><span class="label">Go</span></a></li>
                            <li><a href="history.html" class="fa fa-history" title="History"><span class="label">Go</span></a></li>
                            <li><a href="archievement.html" class="fa fa-star" title="Archievement"><span class="label">Go</span></a></li>
                            
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
