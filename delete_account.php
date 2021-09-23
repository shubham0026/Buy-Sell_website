<?php
if(session_id()=="")
session_start();

?>     
<?php
if(isset($_SESSION['usrname']))
{
$usrname=$_SESSION['usrname'];

include("dbconnect.php");
	mysqli_query($con,"delete from user_detail where custname='$usrname'") or ("die query error");
 	
	header("location:logout.php");
}