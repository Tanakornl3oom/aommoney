<!DOCTYPE HTML>
<html>
	<head>
		<title>Sign up | A O M M O N E Y</title>
        <style type="text/css">
            input[type="text"], input[type="password"]{
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
					<header id="header">
                        <?php
                                $nameerr ="";
                                $lasterr ="";
                                $emailerr ="";
                                $usererr = "";
                                $passworderr ="";
                                $moneyerr ="";
                                

                                $chkuser    = "false";
                                $chkpass    = "false";
                                $chkname    = "false";
                                $chklast    = "false";
                                $chkemail   = "false";
                                $chkmon     = "false";

                                $host = "localhost";
                                $username = "root";
                                $password = "123456";
                                $dbname = "sapatawajae";
                                $objConnect =  mysqli_connect($host,$username,$password,$dbname);
                            if(!$objConnect){
                               die("connection failed" .mysqli_connect_error());
                            }

                            if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
                                $user = $pass = $name =   $lastname = $email =   $money  = "";
                             
                                
                                if(empty($_REQUEST['txt_username']) ){
                                    $usererr = "User is required ";
                                }else{
                                    $user = test_input($_REQUEST['txt_username']);
                                    $chkuser = "true";
                                }
                                
                                if(empty($_REQUEST['txt_password'])){
                                    $passworderr = "password is required ";
                                }
                                else{
                                    $pass = test_input($_REQUEST['txt_password']);
                                    $chkpass = "true";
                                }
                                
                                if(empty($_REQUEST['txt_Name'])){
                                    $nameerr = "Name is required ";
                                }else{
                                    $name = test_input($_REQUEST['txt_Name']);
                                    $chkname = "true";
                                    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                                        $nameerr = "Only letters and white space allowed";
                                        $chkname = "false";
                                    }
                                }
                                
                                if(empty($_REQUEST['txt_lastName']) ){
                                    $lasterr = "lastName is required ";
                                }
                                else{
                                    $lastname = test_input($_REQUEST['txt_lastName']);
                                    $chklast = "true";
                                    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                                            $lasterr = "Only letters and white space allowed"; 
                                            $chklast = "false";
                                    }
                                }
                                
                                if(empty($_REQUEST['txt_email']) ){
                                    $emailerr = "Email is required ";
                                }
                                else{
                                    $email = test_input($_REQUEST['txt_email']);
                                    $chkemail = "true";
                                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                            $emailerr = "Invalid email format";
                                            $chkemail = "false";
                                     }
                                }
                                 if(empty($_REQUEST['txt_money'])){
                                    $moneyerr = "Money is required ";
                                }else{
                                    $money = test_input($_REQUEST['txt_money']);
                                    $chkmon = "true";
                                }
                       
                                
                            $chkall =($chkuser &&  $chkpass && $chkname && $chklast && $chkemail && $chkmon);
                            if($chkall == '1'){
               
                             $type = test_input($_REQUEST['chkTypeMoney']);
                                

                            $user = mysqli_real_escape_string($objConnect,$_POST['txt_username']);
                            $strSQL = "SELECT `LUser` FROM `login` WHERE LUser = '".$user."' ";
                            $objQuery =  mysqli_query($objConnect,$strSQL);
                            $resultuser =  mysqli_fetch_array($objQuery);
                            

                            $email = mysqli_real_escape_string($objConnect,$_POST['txt_email']);
                            $strSQL1 = "SELECT `LEmail` FROM `login` WHERE LEmail = '".$email."' ";
                            $objQuery1 =  mysqli_query($objConnect,$strSQL1);
                            $resultmail =  mysqli_fetch_array($objQuery1);
                            
                        
                                
                             if(count($resultuser) >=1 || count($resultmail) >=1){
                                if(count($resultuser) >=1)
                                    echo $user." is already\n";
                                        if (count($resultmail) >=1)
                                            echo $email." is already";
                                
                            } 
                            else{          
                                
                                

                                $strSQLinsert = "INSERT INTO `login`(`LUser`, `LEmail`, `LPassword`, `LName`, `LLastName`, `LType`, `LMoney`) VALUES ('".$user."','".$email."','".$pass."','".$name."','".$lastname."','".$type."','".$money."')";

                                 $result = mysqli_query($objConnect,$strSQLinsert);
                                if($result){
//                                    echo "Registration successful";
                                    
                                    echo"<script type='text/javascript'>alert('Registration successful');</script>";
                                    echo("<script>window.location = 'login.html';</script>");
//                                    header("Location: login.html");
                                    
                                }
                                else{
                                   echo "Registration failed";
                                }

                            }
                            }else {
		                   
	                               echo "โปรดกรอกข้อมูลให้ครบ";
	                       }
                                 
                                
                            }
        
                            function test_input($data) {
                              $data = trim($data);
                              $data = stripslashes($data);
                              $data = htmlspecialchars($data);
                              return $data;
                            }


                                mysqli_close($objConnect);
                            
                        
                           
                        ?>
						<h1>Sign up</h1><br>
                        
                       

                         <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  >
                             
                            <input type="text" name="txt_Name" id="txt_Name" placeholder="Name">
                             <span class="error">* <?php echo $nameerr;?></span>  <br><br>
                            <input type="text" name="txt_lastName" id="txt_lastName" placeholder="LastName">
                             <span class="error">* <?php echo $lasterr;?></span>  <br><br>
                            <input type="text" name="txt_email" id="txt_email" placeholder="Email">
                             <span class="error">* <?php echo $emailerr;?></span>  <br><br>
                            <input type="text" name="txt_username" id="txt_username" placeholder="Username">
                             <span class="error">* <?php echo  $usererr;?></span>  <br><br>
                            <input type="password" name="txt_password" id="txt_password" placeholder="Password">
                             <span class="error">* <?php echo $passworderr;?></span>  <br><br>
                              <input type="text" name="txt_money" id="txt_money" placeholder="money">
                             <span class="error">* <?php echo $moneyerr ;?></span>  <br><br>
        
                                Type of money
                                <input type="radio" name="chkTypeMoney" value="daily" checked="checked"> Daily
                                <input type="radio" name="chkTypeMoney" value="monthly"> Monthly<br>
                             
                         
                         
              
                             <button type = "submit" value = "submit" class="btnLogin">submit </button>
                            <p id="demo"></p>
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