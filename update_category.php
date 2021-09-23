<?php
	$old_cat_real_id=$_REQUEST['cmb_old_cat_real'];
	$new_cat_real_name=$_REQUEST['txt_new_cat_real_name'];
	$old_cat_display_id=$_REQUEST['cmb_old_cat_display'];
	$new_cat_display_name=$_REQUEST['txt_new_cat_display_name'];
//	$cat_type=$_REQUEST['cmbcat_type'];
	
	
	include("dbconnect.php");
	
	  if($old_cat_real_id!=0 && $old_cat_display_id==0)
		 {
	 		mysqli_query($con,"update category_detail set category_name='$new_cat_real_name'where cid='$old_cat_real_id'")or die("QUERY ERROR");
			
			echo "data has been saved";
		 }
		 
		 else if($old_cat_real_id==0 && $old_cat_display_id!=0)
		 {
		 	mysqli_query($con,"update category_detail set category_display_name='$new_cat_display_name' where cid='$old_cat_display_id'")or die("QUERY ERROR");
			
			echo "data has been saved";
		 }
		 
		 else if($old_cat_real_id!=0 && $old_cat_display_id!=0)
		 {
			mysqli_query($con,"update category_detail set category_name='$new_cat_real_name'where cid='$old_cat_real_id'")or die("QUERY ERROR");
			mysqli_query($con,"update category_detail set category_display_name='$new_cat_display_name' where cid='$old_cat_display_id'")or die("QUERY ERROR");
			
			echo "data has been saved";
		 }
		 
		 else
		 {
		 	header("location:update_category_form.php?err=0&usertype=1");
		 }

?>