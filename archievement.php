<!DOCTYPE html>
<html lang="en">
    <head>
       <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"/>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Archievement | A O M M O N E Y</title>
        <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,400italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="assets/css/header/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/header/theme.min.css">
        <link rel="stylesheet" href="assets/css/header/swatch-red-white.min.css">
        <link rel="stylesheet" href="assets/css/header/fonts.min.css" media="screen">
        <link rel="stylesheet" href="assets/css/style-lobby.css"/>
        <link rel="stylesheet" href="assets/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="assets/css/archeivement-style.css">
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
               
                
                 $strSQL1 = "SELECT COUNT(*) FROM unlocks WHERE EUser = '".$_SESSION["user"]."' and EName = 'มาออมกัน'" ;
                 $objQuery1 = mysql_query($strSQL1);
                $objResult = mysql_fetch_array($objQuery1);
                 
                if($objResult[0] >= 1){
                    $strSQL1 = "UPDATE `archievements` SET AStatus = 'Yes' WHERE AName = 'มาออมกัน'" ;
                     $objQuery1 = mysql_query($strSQL1);
                    $objResult = mysql_fetch_array($objQuery1);
                }
            
                $strSQL1 = "SELECT COUNT(*) FROM unlocks WHERE EUser = '".$_SESSION["user"]."' and EName = 'หัดเก็บเงินบ้าง'" ;
                 $objQuery1 = mysql_query($strSQL1);
                $objResult = mysql_fetch_array($objQuery1);

                if($objResult[0] >= 1){
                    $strSQL1 = "UPDATE `archievements` SET AStatus = 'Yes' WHERE AName = 'หัดเก็บเงินบ้าง'" ;
                     $objQuery1 = mysql_query($strSQL1);
                    $objResult = mysql_fetch_array($objQuery1);
                }
            $strSQL1 = "SELECT COUNT(*) FROM unlocks WHERE EUser = '".$_SESSION["user"]."' and EName = 'อีขี้โกง'" ;
                 $objQuery1 = mysql_query($strSQL1);
                $objResult = mysql_fetch_array($objQuery1);

                if($objResult[0] >= 1){
                    $strSQL1 = "UPDATE `archievements` SET AStatus = 'Yes' WHERE AName = 'อีขี้โกง'" ;
                     $objQuery1 = mysql_query($strSQL1);
                    $objResult = mysql_fetch_array($objQuery1);
                }
            $strSQL1 = "SELECT COUNT(*) FROM unlocks WHERE EUser = '".$_SESSION["user"]."' and EName = 'เจ้าสัวน้อย'" ;
                 $objQuery1 = mysql_query($strSQL1);
                $objResult = mysql_fetch_array($objQuery1);

                if($objResult[0] >= 1){
                    $strSQL1 = "UPDATE `archievements` SET AStatus = 'Yes' WHERE AName = 'เจ้าสัวน้อย'" ;
                     $objQuery1 = mysql_query($strSQL1);
                    $objResult = mysql_fetch_array($objQuery1);
                }
            $strSQL1 = "SELECT COUNT(*) FROM unlocks WHERE EUser = '".$_SESSION["user"]."' and EName = 'ไม่ง้อพ่อแม่'" ;
                 $objQuery1 = mysql_query($strSQL1);
                $objResult = mysql_fetch_array($objQuery1);

                if($objResult[0] >= 1){
                    $strSQL1 = "UPDATE `archievements` SET AStatus = 'Yes' WHERE AName = 'ไม่ง้อพ่อแม่'" ;
                     $objQuery1 = mysql_query($strSQL1);
                    $objResult = mysql_fetch_array($objQuery1);
                }
            
             $strSQL = "SELECT * FROM archievements ";
                $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
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
                        <li class="dropdown"><a href ="information.php" >information</a></li>
                    	<li class="dropdown"><a href =# ><?php echo "จำนวนเงิน".$_SESSION["moneyuser"]."$";?></a></li>
                    	<li class="dropdown"><a href =logout.php >Logout</a></li>     
                    </ul>
                </nav>
            </div>
        </header>
        
        
        <div id="main">
            <!-- Header -->
                <header id="header">
                    <font size="30" color="white"><i class="fa fa-star" aria-hidden="true"></i><b>&nbsp;&nbsp;Archievement</b></font>
                    <table>
                      <thead>
                        <tr>
                          <th>ชื่อ</th>
                          <th>รายละเอียด</th>
                          <th>ความสำเร็จ</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                            while($objResult = mysql_fetch_array($objQuery))
                            {
                          ?>
                        <tr>
                          <td><strong><?php echo $objResult["AName"];?></strong></td>
                          <td><?php echo $objResult["ADetails"];?></td>
                          <td><?php echo $objResult["AStatus"];?></td>
                        </tr>
                          <?php
                                }
                          ?>
                      </tbody>
                    </table>


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
