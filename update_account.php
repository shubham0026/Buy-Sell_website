<?php
if(session_id()=="")
session_start();
?>     
<?php
if(isset($_SESSION['usrname']))
{
$usrname=$_SESSION['usrname'];
$cname=$_REQUEST['txt_name'];
$phone=$_REQUEST['txt_phone'];
$cell_phone=$_REQUEST['txt_cell_phone'];
$country=$_REQUEST['txt_country'];
$region=$_REQUEST['region_cmb'];
$cust_city=$_REQUEST['txt_city'];
$cust_city_area=$_REQUEST['txt_city_area'];
$cust_address=$_REQUEST['txt_address'];
$website=$_REQUEST['txt_website'];
$description=$_REQUEST['txt_description'];

if($region<0)
{
	header("location:userchoice.php?titel=Update Account&err=0");
}
else
{
include("dbconnect.php");

$rsupdate=mysqli_query($con,"update user_detail set 
custname='$cname',
cell_phone='$cell_phone',
phone='$phone',
country='$country',
region='$region',
city='$cust_city',
city_area='$cust_city_area',
address='$cust_address',
website='$website',
description='$description' 
where custname='$usrname'") or ("die update query error");
}
echo "data saved";
}
?>