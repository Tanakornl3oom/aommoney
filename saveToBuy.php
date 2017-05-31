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
        
        <style type="text/css">
            input[type="text"], input[type="text"]{
                width: 300px;
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
            h2{
                font-size: 30px;
                padding: 10px 10px;
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
//             echo"<script type='text/javascript'>alert(' ".$_SESSION["type"]."');</script>";
                   if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
                        if(empty($_REQUEST["name"])){
                           echo"<script type='text/javascript'>alert('โปรดกรอกชื่อสินค้า');</script>";
                        }
                        if(empty($_REQUEST["price"])){
                           echo"<script type='text/javascript'>alert('โปรดกรอกจำนวนเงินของสินค้า');</script>";
                        }
                        if($_SESSION["type"] == "monthly"){
                            if(  ($_REQUEST["price"]/$_REQUEST["progress"]) > ($_SESSION["money"]/30.0))
                                echo"<script type='text/javascript'>alert('ราคาสูงเกินไป');</script>";
                            else{
                                $_SESSION["musthave"] = ($_REQUEST["price"]/$_REQUEST["progress"]); 
                                $_SESSION["namelist"] = $_REQUEST["name"];
                                $_SESSION["price"] = $_REQUEST["price"];
                                $_SESSION["duration"] = $_REQUEST["progress"];
                                echo("<script>window.location = 'saveToBuy2.php';</script>");
                           }
                        }
                        if($_SESSION["type"] == "daily"){
        //                   echo"<script type='text/javascript'>alert(' ".$_SESSION["type"]."');</script>";
                            if(  ($_REQUEST["price"]/$_REQUEST["progress"]) > ($_SESSION["money"]))
                                echo"<script type='text/javascript'>alert('ราคาสูงเกินไป');</script>";
                            else{
                                $_SESSION["musthave"] = ($_REQUEST["price"]/$_REQUEST["progress"]); 
                                $_SESSION["namelist"] = $_REQUEST["name"];
                                $_SESSION["price"] = $_REQUEST["price"];
                                $_SESSION["duration"] = $_REQUEST["progress"];
                                echo("<script>window.location = 'saveToBuy2.php';</script>");
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
                    <h1>Save to buy</h1><br>
                     <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
                    <input type="text" name="name" id="YourTextBox" placeholder="Product Name" autocomplete="off"><br>
                    <input type="text" name="price" id="YourTextBox" placeholder="Product Price" autocomplete="off"><br><br>
                    <h2>Duration to save</h2>
                    <div class="container">
                        <input type="radio" class="radio" name="progress" value="7.0" id="five" checked>
                        <label for="five" class="label">7 Days</label>

                        <input type="radio" class="radio" name="progress" value="15.0" id="twentyfive" >
                        <label for="twentyfive" class="label">15 Days</label>

                        <input type="radio" class="radio" name="progress" value="30.0" id="fifty">
                        <label for="fifty" class="label">1 Month</label>

                        <input type="radio" class="radio" name="progress" value="90.0" id="seventyfive">
                        <label for="seventyfive" class="label">3 Month</label>

                        <input type="radio" class="radio" name="progress" value="180.0" id="onehundred">
                        <label for="onehundred" class="label">6 Month</label>
                        
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        </div>


                    <br><button type="submit"  value= "submit" class="btnLogin">Submit</button>
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
