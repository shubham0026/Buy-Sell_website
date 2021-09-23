<?php
if(session_id()=="")
session_start();
?>     
<?php
if(isset($_SESSION['usrname']))
{
	$usrname=$_SESSION['usrname'];
	$current_mail=$_REQUEST['txt_current_email'];
	$new_mail=$_REQUEST['txt_new_email'];

	include("dbconnect.php");

	$rsupdate=mysqli_query($con,"update user_detail set custmail='$new_mail' where custname='$usrname'") or die("update query error"); 
	
	echo "data saved";
}