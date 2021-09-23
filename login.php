<?php
include("header.php");
?>


		<div id="login_top">
        	<div><a href="index.php">FlickEazy >></a>Login</div>
        </div>
        
        <div id="login_body">
        	<br><br><br>
            Please Login
            <div id="hr1"><hr color="#3DC697" width="100px" align="left"></div><!--closing of hr1-->
        	<div <id="hr2"><hr color="black" width="350px" align="left"></div><!--closing of hr2--><br>
        						
        	<div id="login_form">
            	<form method="get" action="checklogin.php">
                	E-Mail
					<?php
                    	if(isset($_REQUEST['err1']))
					{ 
					if($_REQUEST['err1']==0){
					echo "<div style='color:red;position:absolute;left:561px;top:304px'>";
					echo "*Invalid Email";
					echo "</div>";}
					}

					?>
                    <br><br>
                    <input type="email" name="txtmail" id="txt1" size="41px;"><br><br>
                    Password
                    <?php
						if(isset($_REQUEST['err2']))
					{ 
					if($_REQUEST['err2']==0){
					echo "<div style='color:red;position:absolute;left:585px;top:385px'>";
					echo "*Invalid Password";
					echo "</div>";}
					}

					?>
                    <br><br>
                    <input type="password" name="txtpass" id="txt1" size="41px;"><br><br>
                    <input type="checkbox" name="txtchck" id="checkid" align="middle"><div id="checkname">Remember Me</div>
                    <input type="submit" value="LOG IN" id="login_button"><br><br>
                    <div style="font-size:12px;letter-spacing:1px"><a style="color:#777777;"href="registeration.php" >Register For Free Account</a></div>
                    <div  style="padding-top:6px;font-size:12px;letter-spacing:1px"><a href="account_recovery.php" style="color:#777777;">Forgot Password?</a></div>
                  	  
                </form>
            </div>
        </div><!--ending of login_body-->
 		<br><br>
     <?php
	 include("footer.php");
	 ?>
    
 