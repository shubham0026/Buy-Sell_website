<?php
	$title=$_REQUEST['txt_title'];
	$parent_cat_id=$_REQUEST['cmb_category'];
	$region=$_REQUEST['cmb_region'];
	$city=$_REQUEST['cmb_city'];
	
	include("dbconnect.php");
		
	$rs_sub_cat=mysqli_query($con,"select cid from category_detail where parent_id=$parent_cat_id") or die("query error");
	
	while($row_sub_cat=mysqli_fetch_array($rs_sub_cat))
	{
		$cat_sub_id=$row_sub_cat['cid'];
	
		$rsitem=mysqli_query($con,"select * from product_details where product_title like '%$title%' and product_cat_id=$cat_sub_id and region=$region and city=$city") or die("query error");
		
	
	}
?>