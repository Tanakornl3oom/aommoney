<!DOCTYPE html>
<html lang="en">
    <head>
       <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"/>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>History | A O M M O N E Y</title>
        <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,400italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="assets/css/header/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/header/theme.min.css">
        <link rel="stylesheet" href="assets/css/header/swatch-red-white.min.css">
        <link rel="stylesheet" href="assets/css/header/fonts.min.css" media="screen">
        <link rel="stylesheet" href="assets/css/style-lobby.css"/>
        <link rel="stylesheet" href="assets/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="assets/css/history-style.css"/>
    </head>
    
    <body class="loading">
		<div id="wrapper">
			<div id="bg"></div>
<!--			<div id="overlay"></div>-->
            <?php
                session_start();
                $objConnect = mysql_connect("xxxx","xxxx","xxxx") or die("Error Connect to Database");
                $objDB = mysql_select_db("xxxx");
                mysql_query("SET NAMES UTF8");
            
                $strSQL = "SELECT * FROM history INNER JOIN saving ON history.Hdays = saving.SDays and saving.SUser = '".$_SESSION["user"]."' ";
                $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
//                
                $strSQL1 = "SELECT * FROM history INNER JOIN save_to_buy ON history.Hdays = save_to_buy.SBDays and save_to_buy.SBUser = '".$_SESSION["user"]."' ";
//            
//                $strSQL = "SELECT * FROM history INNER JOIN saving ON history.Hdays = saving.SDays and saving.SUser = '".$_SESSION["user"]."' INNER JOIN save_to_buy ON history.Hdays = save_to_buy.SBDays and save_to_buy.SBUser = '".$_SESSION["user"]."'  ";
//                $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
                
                
            
//                $strSQL1 = "SELECT history.* FROM history,save_to_buy  WHERE history.HDays = save_to_buy.SBDays AND SUser = '".$_SESSION["user"]."'";
                $objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
            // jjoin 3 table
                
               
                
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
                        <img src="" alt=""><i class="fa fa-home" aria-hidden="true"></i> &nbsp;&nbsp;<?php echo  $_SESSION["name"];?>
                    </a>
                </div>
                <nav class="collapse navbar-collapse main-navbar" role="navigation">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown"><a href ="information.php" >Information</a></li>
                    	<li class="dropdown"><a href =logout.php >Logout</a></li>     
                    </ul>
                </nav>
            </div>
        </header>
        
        
        <div id="main">
            <!-- Header -->
                <header id="header">
                    <font size="40" color="white"><i class="fa fa-history" aria-hidden="true"></i><b>&nbsp;&nbsp;History</b></font>
                    <section>
                        <div class="tbl-header">
                            <table cellpadding="0" cellspacing="0" border="0">
                              <thead>
                                <tr>
                                  <th>Times</th>
                                  <th>Type</th>
                                  <th>Money</th>
                                </tr>
                              </thead>
                            </table>
                        </div>
                            <div class="tbl-content">
                            <table cellpadding="0" cellspacing="0" border="0">
                                <tbody>
                                    <?php
                            while($objResult = mysql_fetch_array($objQuery))
                            {
                          ?>
                                    <tr>
                                        <td><?php echo $objResult["HDays"];?></td>
                                        <td><?php echo $objResult["HType"];?></td>
                                        <td><?php echo $objResult["HAmount"];?></td>
                                    </tr>
                                    <?php
                                }
                          ?>
                                         <?php
                            while($objResult1 = mysql_fetch_array($objQuery1))
                            {
                                $day = $objResult1["HDays"];
                                $type= $objResult1["HType"];
                                $amount = $objResult1["HAmount"];
                          ?>
                                    <tr>
                                        <td><?php echo $day;?></td>
                                        <td><?php echo $type;?></td>
                                        <td><?php echo $amount;?></td>
                                    </tr>
                                    <?php
                                }
                          ?>
                           
                                    <tr>
                                   
                                    </tr>
                                </tbody>
                            </table>
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
	</body>
</html>
