<?php

$usrname=$_REQUEST['custname'];
$product_id=$_REQUEST['product_id'];

$catid=$_REQUEST['category_cmb'];
$title=$_REQUEST['txt_title'];
$description=$_REQUEST['txt_description'];
$price=$_REQUEST['txt_price'];
$image=$_FILES['file1'];
$country=$_REQUEST['location_cmb'];
$region=$_REQUEST['region_cmb'];
$cust_city=$_REQUEST['txt_city'];
$cust_city_area=$_REQUEST['txt_city_area'];
$cust_address=$_REQUEST['txt_city_address'];
$contact_no=$_REQUEST['txt_phone'];

if($catid<0)
{
	header("location:insert_item_form.php?err=0");
}
else if($country<0)
{
	header("location:insert_item_form.php?err=1");
}
else if($region<0)
{
	header("location:insert_item_form.php?err=2");
}
else
{
move_uploaded_file($image['tmp_name'],"B:\\wamp\\www\\FLICKEAZY\\images\\".$image['name']);
$img=$image['name'];
include("dbconnect.php");

mysqli_query($con,"update product_details
set product_cat_id='$catid',
product_title='$title',
product_price='$price',
product_description='$description',
image_path='$img',
country='$country',
region='$region',
city='$cust_city',
city_area='$cust_city_area',
address='$cust_address',contact_no='$contact_no' where product_id='$product_id'") or die("query error");

header("location:display_item.php?sub_category_id=$catid");
}
?>