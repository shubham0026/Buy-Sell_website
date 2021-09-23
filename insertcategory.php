<?php
	$cat_name=$_REQUEST['txtcatname'];
	$cat_display_name=$_REQUEST['txtdisplayname'];
	$cat_type=$_REQUEST['cmbcat_type'];
	$cat_parent=$_REQUEST['cmb_parent_cat'];
	
	include("dbconnect.php");
	
	if($cat_type=="Primary")
	{
		$cat_parent=0;
	}
	
	mysqli_query($con,"insert into category_detail(
	category_name,
	category_display_name,
	category_type,
	parent_id)
	values('$cat_name','$cat_display_name','$cat_type','$cat_parent')") or die("QUERY ERROR");
	
	echo "data has been saved";
?>