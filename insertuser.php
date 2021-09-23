<?php


if ($_REQUEST['txtname']==NULL and $_REQUEST['txtemail']==NULL and $_REQUEST['txtpassword']==NULL)
{
		header("location:registeration.php?err1=0&err2=0&err3=0");
}

else if($_REQUEST['txtname']==NULL and $_REQUEST['txtemail']==NULL)
{
	header("location:registeration.php?err1=0&err2=0");
}
else if($_REQUEST['txtemail']==NULL and $_REQUEST['txtpassword']==NULL)
{
	header("location:registeration.php?err2=0&err3=0");
}
else if($_REQUEST['txtemail']==NULL and $_REQUEST['txtpassword']==NULL)
{
	header("location:registeration.php?err2=0&err3=0");
}

else if($_REQUEST['txtname']==NULL)
{
		header("location:registeration.php?err1=0");
}

else if($_REQUEST['txtemail']==NULL)
{
		header("location:registeration.php?err2=0");
}

else if ($_REQUEST['txtpassword']==NULL)
{
		header("location:registeration.php?err3=0");
}

else if($_REQUEST['txtname']!=NULL&$_REQUEST['txtemail']!=NULL&$_REQUEST['txtpassword']!=NULL)

{
	$nm=$_REQUEST['txtname'];
	$uemail=$_REQUEST['txtemail'];
	$pass=$_REQUEST['txtpassword'];
	$cnfrmpass=$_REQUEST['txtcnfrmpassword'];
	$question=$_REQUEST['cmb_security_ques'];
	$answer=$_REQUEST['txtsecurity_ques_answer'];
	$default_img=$_REQUEST['default_image'];

	include("dbconnect.php");
	$rsuser1=mysqli_query($con,"select * from user_detail where custname='$nm'");
	$rsuser2=mysqli_query($con,"select * from user_detail where custmail='$uemail'");
	
	if(mysqli_num_rows($rsuser1)!=0&mysqli_num_rows($rsuser2)!=0&$pass!=$cnfrmpass)
	{
		header("location:registeration.php?err1=1&err2=2&err3=3");
	}
	else if(mysqli_num_rows($rsuser1)!=0)
		header("location:registeration.php?err1=1");
	
	else if(mysqli_num_rows($rsuser2)!=0)
		header("location:registeration.php?err2=2");
	
	else if($pass!=$cnfrmpass)
		header("location:registeration.php?err3=3");
	
else
{
	
mysqli_query($con,"insert into user_detail
(custname,
custmail,
custpassword,
regdate,
usertype,
security_ques,
security_answer,profile_pic)
values('$nm','$uemail','$pass',now(),'user','$question','$answer','$default_img')") or die("query error");
echo "data saved";
}
	}
	
	
	
	
	
?>