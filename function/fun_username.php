<?php
if(session_id()=="")
session_start();

?>     
<?php
if(isset($_SESSION['usrname']))
{
$usrname=$_SESSION['usrname'];

"<div id='update_account_form'>";
	echo "<form action='update_usrname.php' method='get'>";	
		echo "<div class='update_account_title'>Current Username</div>
			  <div><input type='text' name='txt_current_username' value='$usrname' class='update_account_tag' required></div><br>
			  
			  <div class='update_account_title'>New Username *</div>
			  <div><input type='text' name='txt_new_username' class='update_account_tag' required></div><br>
			  
			  ";

		echo "<div><input type='submit' value='UPDATE' id='login_button'></div><br>";
	echo "</form>";
echo "</div>";//ending of update_account_form
echo "<br>";
}
?>				