<?php
if(session_id()=="")
session_start();

?>     
<?php
if(isset($_SESSION['usrname']))
{
$usrname=$_SESSION['usrname'];
echo "<div id='update_account_form'>";
	echo "<form action='update_account.php' method='get'>";	
		echo "<div class='update_account_title'>Name</div>
			  <div><input type='text' name='txt_name' value='$usrname'class='update_account_tag' required></div><br>
			  
			  <div class='update_account_title'>Cell Phone</div>
			  <div><input type='text' name='txt_cell_phone' class='update_account_tag' required></div><br>
			  
			  <div class='update_account_title'>Phone</div>
			  <div><input type='text' name='txt_phone' class='update_account_tag' required></div><br>
			  
			  <div class='update_account_title'>Country</div>
			  <div><input type='text' name='txt_country' value='India' class='update_account_tag' required></div><br>
			  
			  <div class='update_account_title'>Region</div>
			<div>
        <select name='region_cmb' class='update_account_cmb'>
        <option value='-1'>Select a Region...</option>
        <option >Andhra Pradesh (AP)</option><option >Bihar (BR)</option><option >Chhattisgarh (CG)</option><option>Goa (GA)</option><option>Gujarat (GJ)</option><option>Karnataka (KA)</option><option>Kerala (KL)</option><option>Madhya Pradesh (MP)</option><option>Maharashtra (MH)</option><option>New Delhi (DL)</option><option>Orissa (OR)</option><option>Punjab (PB)</option><option>Rajasthan (RJ)</option><option>Tamil Nadu (TN)</option><option>Uttar Pradesh (UP)</option><option>Uttarakhand (UK)</option>    
        
        </select>
        </div><br>
        
			  <div class='update_account_title'>City</div>
			  <div><input type='text' name='txt_city' class='update_account_tag' required></div><br>
			  
			  <div class='update_account_title'>City Area</div>
			  <div><input type='text' name='txt_city_area' class='update_account_tag' required></div><br>
			
			  <div class='update_account_title'>Address</div>
			  <div><input type='text' name='txt_address' class='update_account_tag' required></div><br>
		
			  <div class='update_account_title'>Website</div>
			  <div><input type='text' name='txt_website' class='update_account_tag' required></div><br>
		
			  <div class='update_account_title'>Description</div>
			  <div><textarea name='txt_description' style='width:768px;height:200px; ' required></textarea></div><br>
		";
			echo "<div><input type='submit' value='UPDATE' id='login_button'></div><br>";
	echo "</form>";
echo "</div>";//ending of update_account_form
echo "<br>";
}
?>				
<?php
		if(isset($_REQUEST['err']))
			{
				$error=$_REQUEST['err'];
				if($error==0)
				{
					 echo "<div style='font-weight:bold;color:red;font-size:16px;position:absolute;top:599px;left:530px;'>";
						echo "*Choose a Region";
					 echo "</div>";
				}
			}
?>
			  