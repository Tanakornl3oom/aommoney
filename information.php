<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Information | A O M M O N E Y</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"/>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/header/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/header/theme.min.css">
        <link rel="stylesheet" href="assets/css/header/swatch-red-white.min.css">
        <link rel="stylesheet" href="assets/css/header/fonts.min.css" media="screen">
        <link rel="stylesheet" href="assets/css/style-lobby.css"/>
        <link rel="stylesheet" href="assets/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="assets/css/info-style.css"/>
        
        <style type="text/css">
            input[type="text"], input[type="password"]{
                width: 150px;
                padding: 5px 10px;
                background: transparent;
                border: 0;
                border-bottom: 0.2px solid #ffffff;
                outline: none;
                color: #ffffff;
                font-size: 12px;
            }
            ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
                color: whitesmoke;
            }
        </style>
        
        <style>
            body {font-family: "Lato", sans-serif;}

            /* Style the tab */
            div.tab {
                overflow: hidden;
/*                border: 1px solid #ccc;*/
                background-color: #82b8ce;
            }

            /* Style the buttons inside the tab */
            div.tab button {
                background-color: inherit;
                float: center;
                border: none;
                outline: none;
                cursor: pointer;
                padding: 5px 20px;
                transition: 0.3s;
                font-size: 17px;
            }

            /* Change background color of buttons on hover */
            div.tab button:hover {
                background-color: #007eb2;
            }
            
            /* Style the tab content */
            .tabcontent {
                display: none;
                padding: 6px 12px;
                border: 1px solid #82b8ce;
                border-top: none;
            }

            /* Style the close button */
            .topright {
                float: right;
                cursor: pointer;
                font-size: 20px;
            }

            .topright:hover {color: red;}
        </style>
    </head>
    
    <body class="loading">
		<div id="wrapper">
			<div id="bg"></div>
<!--			<div id="overlay"></div>-->
            
            <!-- HEADER -->
             <?php
                 session_start();
	         
            ?>
            <header id="masthead" class="navbar navbar-sticky swatch-red-white" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".main-navbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                    <!-- GO TO LOBBY -->
                    <a href="lobby.php" class="navbar-brand">
                        <img src="" alt=""><i class="fa fa-home" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $_SESSION["name"];?>
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
                    <br><br><br>
                    <h1><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;INFORMATION</h1>
                    <nav>
<!--                         <form method="post" action="changepassword.php">-->
                        <ul>
                            <section>
                              <div class="tbl-header">
                                <table cellpadding="0" cellspacing="0" border="0">
                                </table>
                              </div>
                            <div class="tbl-content">
                            <table cellpadding="0" cellspacing="0" border="0">
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td>Name</td><td></td>
                                        <td> <?php echo  $_SESSION["name"];?></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>LastName</td><td></td>
                                        <td><?php echo $_SESSION["lastname"];?></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Email</td><td></td>
                                        <td><?php echo $_SESSION["email"];?></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Username</td><td></td>
                                        <td><?php echo $_SESSION["user"] ;?></td>
                                        <td></td>
                                    </tr>
                                      <tr>
                                        <td></td>
                                        <td>Type</td><td></td>
                                        <td><?php echo $_SESSION["type"] ;?></td>
                                        <td></td>
                                    </tr>
                                     <tr>
                                        <td></td>
                                        <td>Money</td><td></td>
                                        <td><?php echo $_SESSION["money"] ;?></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                            </section>
                            <div class="tab">
                                <button class="tablinks" onclick="openTab(event, 'Password')" >Change Password</button>
                            </div>
                            
                            <div id="Password" class="tabcontent" >
                                <a href="#" onclick="this.parentElement.style.display='none'"></a>
                                <div class="topright" onclick="this.parentElement.style.display='none'">x</div>
    <!--                            <h3>Changer Password</h3>-->
                               <form method="post" action="changepassword.php">
                                <input type="password" name="oldPwd" placeholder="Old Passwords"><br>
                                <input type="password" name="newPwd" placeholder="New Passwords"><br>
                                <input type="password" name="confPwd" placeholder="Confirm Password"><br>
                                <button type="submit" value="submit" name="repass" class="fa fa-edit" title="Edit information"></button>
                                </form>
                            </div><br>
                             
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
        <script>
            function openTab(evt, name) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(name).style.display = "block";
                evt.currentTarget.className += " active";
            }

            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen").click();
</script>
	</body>
</html>
