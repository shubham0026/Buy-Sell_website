<?php
if(session_id()=="")
session_start();

?>     
<?php
if(isset($_SESSION['usrname']))
{
$usrname=$_SESSION['usrname'];

include("dbconnect.php");
$rsmail=mysqli_query($con,"select custmail from user_detail where custname='$usrname'") or die("query error");
$rowmail=mysqli_fetch_array($rsmail);
$current_email=$rowmail['custmail'];
echo "<div id='update_account_form'>";
	echo "<form action='update_email.php' method='get'>";	
		echo "<div class='update_account_title'>Current e-mail</div>
			  <div><input type='email' name='txt_current_email' value='$current_email'class='update_account_tag' required></div><br>
			  
			  <div class='update_account_title'>New E-Mail *</div>
			  <div><input type='email' name='txt_new_email' class='update_account_tag' required></div><br>
			  
			  ";

		echo "<div><input type='submit' value='UPDATE' id='login_button'></div><br>";
	echo "</form>";
echo "</div>";//ending of update_account_form
echo "<br>";
}
?>				