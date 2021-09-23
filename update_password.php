<?php
if(session_id()=="")
session_start();
?>     
<?php
if(isset($_SESSION['usrname']))
{
	$usrname=$_SESSION['usrname'];
	$current_password=$_REQUEST['txt_current_password'];
	$new_password=$_REQUEST['txt_new_password'];
	$repeat_new_password=$_REQUEST['txt_repeat_new_password'];
	

	include("dbconnect.php");
	$rs1=mysqli_query($con,"select custpassword from user_detail where custname='$usrname'") or die("query error"); 
	$row1=mysqli_fetch_array($rs1);
	$check_pass=$row1['custpassword'];
	
	if($current_password!=$check_pass)
	{
		header("location:fun_password.php?err=0");
	}
	else
	{
	if($new_password!=$repeat_new_password)
		{
			header("location:fun_password.php?err=1");
		}
		else
		{
			$rsupdate=mysqli_query($con,"update user_detail set custpassword='$new_password' where custname='$usrname'") or die("update query error"); 
	
	echo "data saved";
	
		}
	
	}
}