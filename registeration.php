<?php
	include("header.php");
?>
			<div id="login_top">
        	<div><a href="index.php">FlickEazy >></a>Create A New Account</div>
        </div>
        
        <div id="login_body">
        	<br><br><br>
            Please Register
            <div id="hr1"><hr color="#3DC697" width="100px" align="left"></div><!--closing of hr1-->
        	<div <id="hr2"><hr color="black" width="350px" align="left"></div><!--closing of hr2--><br>
        						
        	<div id="signup_form">
            	<form method="get" action="insertuser.php">
                	Name<br><br>
                    <input type="text" name="txtname" id="txt1" size="41px;">
                    <br><?php 
					if(isset($_REQUEST['err1']))
					{ 
					$er1=$_REQUEST['err1'];
					if($er1==0){
					echo "<div style='color:red;position:absolute;left:560px;top:305px'>";
					echo "*Invalid Username";
					echo "</div>";}
					}

					if(isset($_REQUEST['err1']))
					{ 
					$er1=$_REQUEST['err1'];
					if($er1==1){
					echo "<div style='color:red;position:absolute;left:560px;top:305px'>";
					echo "*username already exist";
					echo "</div>";}
					}
					?><br> 
                    E-Mail<br><br>
                    <input type="email" name="txtemail" id="txt1" size="41px;">
                    <br><?php 
					if(isset($_REQUEST['err2']))
					{ 
					$er2=$_REQUEST['err2'];
					if($er2==0){
					echo "<div style='color:red;position:absolute;left:560px;top:385px'>";
					echo "&nbsp;";
					echo "*Invalid Email";
					echo "</div>";}
					}
                    
					if
					(isset($_REQUEST['err2']))
					{ 
					$er2=$_REQUEST['err2'];
					if($er2==2){
					echo "<div style='color:red;position:absolute;left:560px;top:385px'>";
					echo "&nbsp;";
					echo "*email already exist";
					echo "</div>";}
					}
                    ?>
					<br>
                    Password<br><br>
                    <input type="password" name="txtpassword" id="txt1" size="41px;">
                    <br><?php
					if(isset($_REQUEST['err3']))
					{ 
					$er3=$_REQUEST['err3'];
					if($er3==0){
					echo "<div style='color:red;position:absolute;left:584px;top:466px'>";
					echo "&nbsp;";
					echo "*Invalid Password";
					echo "</div>";}
					}
					
					if(isset($_REQUEST['err3']))
					{ 
					$er3=$_REQUEST['err3'];
					if($er3==3){
					echo "<div style='color:red;position:absolute;left:635px;top:547px'>";
					echo "&nbsp;";
					echo "*password does't match";
					echo "</div>";}
					}
					
					
					?>
                    <br>
                    Repeat Password<br><br>
                    <input type="password" name="txtcnfrmpassword" id="txt1" size="41px;"><br><br>
                 
                    
                    Security Question&nbsp;&nbsp;
                    <select name="cmb_security_ques" id="securityques">
                    	<option>Choose a Question</option>
                    	<option>Your mother\'s name?</option>
                        <option>Your father name?</option>
                        <option>Your pet name?</option>
                        <option>Your friends name?</option>
                        <option>Your grandfathers name?</option>
                        <option>What was the name of your elementary / primary school?</option>
						<option>In what city or town does your nearest sibling live?</option>
						<option>What time of the day were you born? (hh:mm)</option>
                    </select>
                    <input type="text" name="txtsecurity_ques_answer" placeholder="Answer" id="txt2">
                    <br><br>
                    <input type="hidden" name="default_image" value="default.gif">
                    <input type="submit" value="SIGN UP" id="login_button">
                                  
                </form>
            </div>
        </div><!--ending of signup_body-->
 		<br><br>

           
<?php
	include("footer.php");
?>



