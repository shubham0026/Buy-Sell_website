<?php
if(session_id()=="")
session_start()

?>     

<?php
if($_REQUEST['txtmail']==NULL and $_REQUEST['txtpass']==NULL)
{
	header("location:login.php?err1=0&err2=0");
}
else if($_REQUEST['txtmail']==NULL and $_REQUEST['txtpass']!=NULL)
{
	header("location:login.php?err1=0");
}

else if($_REQUEST['txtmail']!=NULL and $_REQUEST['txtpass']==NULL)
{
	header("location:login.php?err2=0");
}
		
else{
$user_email=$_REQUEST['txtmail'];
$userpass=$_REQUEST['txtpass'];
include("dbconnect.php");

$rsuser=mysqli_query($con,"select * from user_detail where custmail='$user_email'");
$row=mysqli_fetch_array($rsuser);

if(mysqli_num_rows($rsuser)==0 and $row['custpassword']!=$userpass)
{
	header("location:login.php?err1=0&err2=0");
}

else if(mysqli_num_rows($rsuser)==0)
{
	header("location:login.php?err1=0");
}
		
	
	else if($row['custpassword']!=$userpass)
		{
			header("location:login.php?err2=0");
		}
	
	else
		{
			$_SESSION['usrname']=$row['custname'];
			
			if($row['usertype']=='admin')
				{
					header("location:adminchoice.php");
				}
			else
				{
					
					header("location:index.php");
				}
		}
		
}
?>