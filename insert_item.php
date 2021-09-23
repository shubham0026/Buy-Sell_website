<?php

$usrname=$_REQUEST['custname'];

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

$rsitem=mysqli_query($con,"insert into product_details
(product_cat_id,
product_title,
product_price,
product_description,
image_path,
country,
region,
city,
city_area
,address,publish_date,contact_no,publisher_name)values('$catid','$title','$price','$description','$img','$country','$region','$cust_city','$cust_city_area','$cust_address',now(),$contact_no,'$usrname')") or die("query error");

header("location:display_item.php?sub_category_id=$catid");
}
?>