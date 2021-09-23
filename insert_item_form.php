<?php
if(session_id()=="")
session_start();

?>     
<?php
	include("header.php");
?>
<?php
		echo "<div id='login_top'>";
			echo "<div><a href='index.php'>FlickEazy >></a>Publish A Listing</div>";
		echo "</div>";
  ?>      
<div id="content">

	<div style="font-weight:bold;font-size:16px;padding-left:300px;">Publish A Listing</div>
    <div style="position:absolute;left:410px;"><hr color="#3DC697" width="100px" align="left"></div><!--closing of hr1-->
    <div ><hr color="black" width="504px"></div><!--closing of hr2-->
    <br> 
    
<div id="insert_form">
    <form action="insert_item.php" method="post" enctype="multipart/form-data"> 
 		<div class="insert_cell">General Information</div><br>
        <div class="insert_cell_heading">Category</div>
        <div>
        <select class="insert_form_cmb" name="category_cmb">
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
        <div class="insert_cell_heading">Title</div>
        <div><input type="text" name="txt_title" class="insert_form_text" required></div><br>
        <div class="insert_cell_heading">Description</div>
        <div><textarea name="txt_description" style="width:508px;height:200px; " required></textarea></div><br>
        <div class="insert_cell_heading">Phone No.</div>
        <div><input type="text" name="txt_phone" class="insert_form_text" required></div><br>       
        <div class="insert_cell_heading">Price</div>
        <div><input type="text" name="txt_price" class="insert_form_text" required></div><br>
        <div class="insert_cell_heading"><input type="file" name="file1" required></div><br>
        <div class="insert_cell">Listing Location</div><br>
        <div class="insert_cell_heading">Country</div>
        <div>
        <select class="insert_form_cmb" name="location_cmb">
        <option value="-1">Select a country...</option>
        <option>India</option>
        </select>
        </div><br>
        <div class="insert_cell_heading">Region</div>
        <div>
        <select class="insert_form_cmb" name="region_cmb">
        <option value="-1">Select a Region...</option>
        <option >Andhra Pradesh (AP)</option><option >Bihar (BR)</option><option >Chhattisgarh (CG)</option><option>Goa (GA)</option><option>Gujarat (GJ)</option><option>Karnataka (KA)</option><option>Kerala (KL)</option><option>Madhya Pradesh (MP)</option><option>Maharashtra (MH)</option><option>New Delhi (DL)</option><option>Orissa (OR)</option><option>Punjab (PB)</option><option>Rajasthan (RJ)</option><option>Tamil Nadu (TN)</option><option>Uttar Pradesh (UP)</option><option>Uttarakhand (UK)</option>   
        
        </select>
        </div><br>
        <div class="insert_cell_heading">City</div>
        <div><input type="text" name="txt_city" class="insert_form_text" required></div><br>
        <div class="insert_cell_heading">City Area</div>
        <div><input type="text" name="txt_city_area" class="insert_form_text" required></div><br>
        <div class="insert_cell_heading">Address</div>
        <div><input type="text" name="txt_city_address" class="insert_form_text" required></div><br>
        <div><input type="submit" value="PUBLISH" id="login_button"></div><br>
        
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