<?php
if(session_id()=="")
session_start();

?>     
<?php
if(isset($_SESSION['usrname']))
{
$usrname=$_SESSION['usrname'];

"<div id='update_account_form'>";
	echo "<form action='update_password.php' method='get'>";	
		echo "<div class='update_account_title'>Current Password</div>
			  <div><input type='password' name='txt_current_password' class='update_account_tag' required></div><br>
			  
			  <div class='update_account_title'>New Password *</div>
			  <div><input type='password' name='txt_new_password' class='update_account_tag' required></div><br>
			  
			  <div class='update_account_title'>Repeat New Password *</div>
			  <div><input type='password' name='txt_repeat_new_password' class='update_account_tag' required></div><br>
			  
			  ";

		echo "<div><input type='submit' value='UPDATE' id='login_button'></div><br>";
	echo "</form>";
echo "</div>";//ending of update_account_form
echo "<br>";
}
?>				
<?php
		if(isset($_REQUEST['err']))
			{
				$error=$_REQUEST['err'];
				if($error==0)
				{
					 echo "<div style='font-weight:bold;color:red;font-size:16px;position:absolute;top:599px;left:530px;'>";
						echo "*Wrong Current Password";
					 echo "</div>";
				}
				else if($error==1)
				{
					 echo "<div style='font-weight:bold;color:red;font-size:16px;position:absolute;top:599px;left:530px;'>";
						echo "*Password dont match";
					 echo "</div>";
				}
			}
?>
		