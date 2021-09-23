<?php include("header.php");?>
                  
  <div id="introimage">
      <img src="images/banner.jpg">
  </div><!--closing of introimage-->
                
                <div id="advance_search">
                  <form action="display_item.php" method="get">
                    
					<input type="hidden" name="flag" value="1">
					
					<input id="search" type="text" name="txt_title" placeholder="Search your item here" required>
                	<select class="category" name="cmb_category">
                    	<option value="-1">Select a Category</option>
                    	 <?php
			include("dbconnect.php");
			$rs=mysqli_query($con,"select cid,category_name from category_detail where parent_id=0 order by category_name");
			while($row=mysqli_fetch_array($rs))
				{
					$id=$row['cid'];
					echo "<option value='$id'>";
					echo $row['category_name'];
					echo "</option>";
				}
			?>                   
         </select><!--end of category-->
                    <select class="category" name="cmb_region">
                    	<option value="-1">Select a Region</option>
                    	<option>Chhattisgarh(CG)</option>
                    	<option>Goa(GA)</option>
                    	<option>Kerala(KL)</option>
                    	<option>Maharashtra(MH)</option>
                    	<option>Punjab(PB)</option>
                    	<option>Uttarakhand(UK)</option>
                    	<option>Uttar Pradesh(UP))</option>
                        <option>Rajasthan(RJ)</option>
                        <option>Gujarat(GJ)</option>
                        <option>Andhra Pradesh(AP)</option>
                        <option>Bihar(GJ)</option>
                        <option>Orissa(OR)</option>
                        <option>Karnataka(KA)</option>
                        <option>Tamil Nadu(TN)</option>
                    </select><!--end of category-->
                    <select class="category" name="cmb_city">
                    	<option value="-1">Select a City</option>
                    	<option>Bhilai</option>
                    	<option>Bilaspur</option>
                    	<option>Durg</option>
                    	<option>Korba</option>
                    	<option>Raipur</option>
                     </select><!--end of category-->
                     
                     <input type="submit" name="search" value="&#128269;&nbsp;SEARCH" id="search_button">
                   </form>
                      <!-- <a href="" id="search_button"> <font size="+0.6">&#128269;&nbsp;</font>SEARCH</a>-->
                </div><!--closing of advance_search-->
            
          	<div id="content">
            	<span>Categories</span>
        		<div id="hr1"><hr color="#3DC697" width="100px" align="left"></div><!--closing of hr1-->
        		<div ><hr color="black" width="1057px"></div><!--closing of hr2-->
          		<br> 
                <div id="cats">
                	
					<?php 
						include("dbconnect.php");
						
						$rs1=mysqli_query($con,"select cid,category_display_name from category_detail where parent_id=0");
					
						
						while($row_cats=mysqli_fetch_array($rs1))
						{
							$cat_title=$row_cats['category_display_name'];
							$cat_id=$row_cats['cid'];
						
							echo "<div id='category_display'>";
							
									echo "<div id='cat_display_box'>";
		
		if(isset($_SESSION['usrname']))
					
					echo "<h3><a href='display_item.php?usertype=0&cat_parent_id=$cat_id'>$cat_title</a></h3>";
							
							else
								
								echo "<h3 style='padding-top:10px;'><a href='display_item.php?cat_parent_id=$cat_id'>$cat_title</a></h3>";
						
				
									echo "</div>";
				
				
				$rs2=mysqli_query($con,"select cid,category_display_name from category_detail where parent_id='$cat_id'");
													
							while($row_sub_cats=mysqli_fetch_array($rs2))
							{	
								$cat_sub_title=$row_sub_cats['category_display_name'];
								$cat_sub_id=$row_sub_cats['cid'];	
								
								if(isset($_SESSION['usrname']))
								{
								echo "<ul>";
	echo "<li><a href='display_item.php?usertype=0&sub_category_id=$cat_sub_id'>$cat_sub_title</a></li>";
								echo "</ul>"; 
								}
								else
								{
								echo "<ul>";
	echo "<li><a href='display_item.php?sub_category_id=$cat_sub_id'>$cat_sub_title</a></li>";
								echo "</ul>"; 
								}
							}
							echo "</div>";//endibg of category_display
							echo "&nbsp;&nbsp;";
						}
					
					?>
                    <br>
                    <br>
                     <br>
            	</div><!--closing of cats-->
                <span>Latest Listings</span>
        		<div id="hr1"><hr color="#3DC697" width="100px" align="left"></div><!--closing of hr1-->
        		<div ><hr color="black" width="1057px"></div><!--closing of hr2-->
          		<br> 
              
                <div id="latest_listings"> 
                	<?php
						include("dbconnect.php");
						$rslist=mysqli_query($con,"select * from product_details order by publish_date limit 0,6");
						while($row=mysqli_fetch_array($rslist))
						{
							include("function/item_search_fun.php");
						}
					?>
                </div>
            </div><!--closing of content-->	
			
           <?php 
		   include("footer.php");
		   ?>         
