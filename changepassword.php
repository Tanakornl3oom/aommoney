
    <?php 
        session_start();
		 mysql_connect("mysql.hostinger.in.th","u800381696_admin","z1x2c3");
	    mysql_select_db("u800381696_mydb");
		if(isset($_POST['repass']))
		{
		$old_pass=$_POST['oldPwd'];
		$new_pass=$_POST['newPwd'];
		$re_pass=$_POST['confPwd'];
		$chg_pwd=mysql_query("SELECT * FROM login WHERE LUser = '".$_SESSION["user"]."' " );
		$chg_pwd1=mysql_fetch_array($chg_pwd);
		$data_pwd=$chg_pwd1['LPassword'];
            
             
            if($data_pwd==$old_pass){
                if($new_pass==$re_pass){
                    $update_pwd=mysql_query("UPDATE `login` SET `LPassword`='".$new_pass."' WHERE  LUser = '". $_SESSION["user"]."' ");
                    echo "<script>alert('Update Sucessfully'); window.location='information.php'</script>";
                }
                else{
                    echo "<script>alert('Your new and Retype Password is not match'); window.location='information.php'</script>";
                }
            }
            else
            {
              echo "<script>alert('Your old password is wrong'); window.location='information.php'</script>";
            }
        }
	?>
