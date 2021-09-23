<?php
	$user_email=$_REQUEST['txtemail'];
	$question=$_REQUEST['cmb_security_ques'];
	$answer=$_REQUEST['txtsecurity_ques_answer'];
	
	include("dbconnect.php");
	
	$rsuser=mysqli_query($con,"select * from user_detail where custmail='$user_email'") or die("query error");
	
	if(mysqli_num_rows($rsuser)==0)
	{
		header("location:account_recovery.php?err1=0");
	}
	
	else
	{
		$row=mysqli_fetch_array($rsuser);
		if($row['security_ques']==$question)
		{
			if($row['security_answer']==$answer)
			{
			echo "your password is ";
			echo "'";echo $row['custpassword'];echo "'";
			}
			else
			{
				header("location:account_recovery.php?err2=0");
			}
		}
		else
		{
			header("location:account_recovery.php?err3=0");
		}
	}
	
?>	
<!--	$rsuser=mysqli_query($con,"select * from user_detail where custmail='$user_email' and security_ques='$question' and security_answer='$answer'") or die("query error");
	
	$row=mysqli_fetch_array($rsuser);
	
	if(mysqli_num_rows($rsuser)==0)
	{
		header("location:account_recovery.php?err1=0");
	}
	else
	{
		if($row['usertype']=='admin')
				{
					header("location:adminchoice.php?usertype=1");
				}
			else
				{
					header("location:userchoice.php?usertype=0");
				}
	}
	
?>-->