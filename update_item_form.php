<?php
if(session_id()=="")
session_start();

?>     
<?php
	include("header.php");
?>
<?php
		$usrname=$_SESSION['usrname'];
		
		
		if(isset($_REQUEST['sub_category_id']))
		{
		$sub_cat_id=$_REQUEST['sub_category_id'];
		$pid=$_REQUEST['product_id'];
		include("dbconnect.php");
		
		if(isset($sub_cat_id))
		
		$rscat1=mysqli_query($con,"select category_name,parent_id from category_detail where cid='$sub_cat_id'");
		$row1=mysqli_fetch_array($rscat1);
		$sub_cat_name=$row1['category_name'];
		
		$rscat2=mysqli_query($con,"select * from product_details where product_id='$pid'") or die("query error");
		$row2=mysqli_fetch_array($rscat2);
		$product_name=$row2['product_title'];
		$product_description=$row2['product_description'];
		$contact_no=$row2['contact_no'];
		$product_price=$row2['product_price'];
		$country=$row2['country'];
		$region=$row2['region'];
		$city=$row2['city'];
		$city_area=$row2['city_area'];
		$address=$row2['address'];
		echo "<div id='login_top'>";
          echo "<div>";
		  
		 
		   echo "<a href='index.php'>FlickEazy >></a>";
		    
		   echo "<a href='display_item.php?sub_category_id=$sub_cat_id'>$sub_cat_name >></a><a href='enlarge_item.php?product_id=$pid'>$product_name >></a>Edit Your Listings";
		  
		  echo "</div>";
        echo "</div>";
		}
  ?>      
<div id="content">

	<div style="font-weight:bold;font-size:16px;padding-left:300px;">Publish A Listing</div>
    <div style="position:absolute;left:400px;"><hr color="#3DC697" width="100px" align="left"></div><!--closing of hr1-->
    <div ><hr color="black" width="504px"></div><!--closing of hr2-->
    <br> 
    
<div id="insert_form">
	<form action="update_item.php" method="post" enctype="multipart/form-data"> 
 		<div class="insert_cell">General Information</div><br>
        <div class="insert_cell_heading">Category</div>
        <div>
        <select class="insert_form_cmb" name="category_cmb">
        <?php echo "<option value='$sub_cat_id'>$sub_cat_name</option>";?>
        <option value="-1">Select a category</option>
        <?php
			$usrname=$_SESSION['usrname'];
			include("dbconnect.php");
			
			$rscats=mysqli_query($con,"select cid,category_name from category_detail where parent_id!=0");
			while($row=mysqli_fetch_array($rscats))
			{
				$id=$row['cid'];
				$catname=$row['category_name'];
				echo "<option value='$id'>$catname</option>";
			}
		?>
        </select>
        </div><br>
        <input type="hidden" value="<?php echo $usrname; ?>" name="custname">
   		<input type="hidden" value="<?php echo $pid; ?>" name="product_id">
  <?php
   echo "<div class='insert_cell_heading'>Title</div>
        <div><input type='text' name='txt_title' class='insert_form_text' value='$product_name'required></div><br>
        <div class='insert_cell_heading'>Description</div>
        <div><textarea name='txt_description' style='width:508px;height:200px;' required>$product_description</textarea></div><br>
        <div class='insert_cell_heading'>Phone No.</div>
        <div><input type='text' name='txt_phone' class='insert_form_text'value='$contact_no' required></div><br>       
        <div class='insert_cell_heading'>Price</div>
        <div><input type='text' name='txt_price' class='insert_form_text' value='$product_price' required></div><br>
        <div class='insert_cell_heading'><input type='file' name='file1' required></div><br>
        <div class='insert_cell'>Listing Location</div><br>
        <div class='insert_cell_heading'>Country</div>
        <div>
        <select class='insert_form_cmb' name='location_cmb'>
         <option>$country</option>
		<option value='-1'>Select a country...</option>
       	 <option>India</option>
        </select>
        </div><br>
        <div class='insert_cell_heading'>Region</div>
        <div>
        <select class='insert_form_cmb' name='region_cmb'>
        <option>$region</option>
		<option value='-1'>Select a Region...</option>
        <option >Andhra Pradesh (AP)</option><option >Bihar (BR)</option><option >Chhattisgarh (CG)</option><option>Goa (GA)</option><option>Gujarat (GJ)</option><option>Karnataka (KA)</option><option>Kerala (KL)</option><option>Madhya Pradesh (MP)</option><option>Maharashtra (MH)</option><option>New Delhi (DL)</option><option>Orissa (OR)</option><option>Punjab (PB)</option><option>Rajasthan (RJ)</option><option>Tamil Nadu (TN)</option><option>Uttar Pradesh (UP)</option><option>Uttarakhand (UK)</option></select>     
        
        </select>
        </div><br>
        <div class='insert_cell_heading'>City</div>
        <div><input type='text' name='txt_city' class='insert_form_text' value='$city' required></div><br>
        <div class='insert_cell_heading'>City Area</div>
        <div><input type='text' name='txt_city_area' class='insert_form_text' value='$city_area' required></div><br>
        <div class='insert_cell_heading'>Address</div>
        <div><input type='text' name='txt_city_address' class='insert_form_text' value='$address' required></div><br>
	";
	?>
         
        <div><input type="submit" value="UPDATE" id="login_button"></div><br>
        
        
         <?php
		if(isset($_REQUEST['err']))
			{
				$error=$_REQUEST['err'];
				if($error==0)
				{
					 echo "<div style='font-weight:bold;color:red;font-size:16px;position:absolute;top:390px;left:960px;'>";
						echo "*Choose a Category";
					 echo "</div>";
				}
				else if($error==1)
				{
				 	 echo "<div style='font-weight:bold;color:red;font-size:16px;position:absolute;top:1040px;left:960px;'>";
						echo "*Choose a Country";
					 echo "</div>";
	
				}
				else if($error==2)
				{
				 	 echo "<div style='font-weight:bold;color:red;font-size:16px;position:absolute;top:1120px;left:960px;'>";
						echo "*Choose a Region";
					 echo "</div>";
	
				}
				
			}
	?>
        
 	</form>
 </div><!--closing of insert form-->

</div>

<?php
	include("footer.php");
?>