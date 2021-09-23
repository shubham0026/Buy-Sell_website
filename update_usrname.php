<?php
if(session_id()=="")
session_start();
?>     
<?php
if(isset($_SESSION['usrname']))
{
	$usrname=$_SESSION['usrname'];
	$new_username=$_REQUEST['txt_new_username'];

	include("dbconnect.php");

	$rsupdate=mysqli_query($con,"update user_detail set custname='$new_username' where custname='$usrname'") or die("update query error"); 
	
	echo "data saved";
}