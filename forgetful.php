<!DOCTYPE HTML>
<html>
	<head>
		<title>Forget | A O M M O N E Y</title>
        <style type="text/css">
            input[type="text"], input[type="password"]{
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
		<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<!--	<meta charset="utf-8" />-->
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/style-login.css" />
	</head>
	<body class="loading">
		<div id="wrapper">
			<div id="bg"></div>
			<div id="overlay"></div>
            
			<div id="main">
				<!-- Header -->
                    <?php
//                            require_once("Applicaltions/XAMPP/xamppfiles/htdocs/PHPMailer-master/class.phpmailer.php");
                            $host = "mysql.hostinger.in.th";
                            $username = "u800381696_admin";
                            $password = "z1x2c3";
                            $dbname = "u800381696_mydb";
                            $objConnect =  mysqli_connect($host,$username,$password,$dbname);
                 
                        if($_SERVER["REQUEST_METHOD"] == "POST" ){
                             
                            $email =  mysqli_real_escape_string($objConnect,$_POST['txt_id']);
                             
                            $strSQL = "SELECT * FROM login WHERE LEmail = '".$email."'";
                            $objQuery = $objConnect ->query($strSQL);
                            $objResult = $objQuery->fetch_array();
                            
                            
                            if($objResult) {
//                                echo"<script type='text/javascript'>alert('password is ".$objResult['LPassword']."');</script>";
//                                echo("<script>window.location = 'login.html';</script>");
                                
                                
                                // ==================================================
                                $emailto= $email; //อีเมล์ผู้รับ
                                $subject= 'Your password that you forgot | AOMMONEY TEAM'; //หัวข้อ
                                $header.= "Content-type: text/html; charset=windows-620\n";
                                $header.= "from: AOMMONEY TEAM"; //ชื่อและอีเมลผู้ส่ง
                                $messages.= "Hello, ".$email."<br>Your password is ".$objResult['LPassword']."<br>Please dont forget again.<br><br><br>AOMMONEY TEAM." ; //ข้อความ

                                $send_mail = mail($emailto,$subject,$messages,$header);

                                if(!$send_mail){
//                                    echo "ยังไม่สามารถส่งเมลล์ได้ในขณะนี้";
                                    echo"<script type='text/javascript'>alert('Sending success');</script>";
                                }else{
//                                    echo "ส่งเมลล์สำเร็จ";
                                    echo"<script type='text/javascript'>alert('Sending unsuccess');</script>";
                                }

                                // ==================================================
                            }else{
                                echo"<script type='text/javascript'>alert('Email invalid');</script>";
                                echo("<script>window.location = 'forgetful.php';</script>");
                            }
                            mysqli_close($objConnect);
                        }
                        
                        
                    ?>
					<header id="header">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
						<h1>Forgot Password</h1><br>
						<input id="em" type="text" name="txt_id" id="YourTextBox" placeholder="Your Email" autocomplete="off"><br><br>
                        <button type = "submit" value = "submit" class="btnSignUp">submit </button>
                        </form>
					</header>
			</div>
		</div>
		<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
		<script>
			window.onload = function() { document.body.className = ''; }
			window.ontouchmove = function() { return false; }
			window.onorientationchange = function() { document.body.scrollTop = 0; }
		</script>
	</body>
</html>