<?php
	include("header.php");
?>
		<div id="login_top">
        	<div><a href="index.php">FlickEazy >></a>
			<?php 
		if(isset($_REQUEST['titel']))
		{
			$title=$_REQUEST['titel'];
		} 
		echo "<a href='userchoice.php'>Account >></a>";
		if(isset($_REQUEST['titel']))
		 {
		 echo $title; 
		 }
		 else
		 {
		 if($row['usertype']=='admin')
				echo "Admin Panel";
				else
				echo "User Panel";
		 
		 }
		echo "  
		   </div>
        </div>";

echo "<div id='content'>";
	echo "<div id='frame'>";
echo "
<div class='useroptions'><a href='userchoice.php?titel=Public Profile'>Public Profile</a></div>
<div class='useroptions'><a href='userchoice.php?titel=My Listings'>My Listings</a></div>
<div class='useroptions'><a href='userchoice.php?titel=Alerts'>Alerts</a></div>
<div class='useroptions'><a href='userchoice.php?titel=Update Account'>Account</a></div>
<div class='useroptions'><a href='userchoice.php?titel=Change Email'>Change Email</a></div>
<div class='useroptions'><a href='userchoice.php?titel=Change Username'>Change Username</a></div>
<div class='useroptions'><a href='userchoice.php?titel=Change password'>Change password</a></div>
<div class='useroptions'><a href='userchoice.php?titel=Delete Account'>Delete Account</a></div>
";
    echo "</div>";//ending of frame
	
	echo "<div style='padding-left:340px;font-weight:bold;font-size:18px;'>";
		if(isset($_REQUEST['titel']))
		{
			echo $title;
			
		}
		else
		{
				if($row['usertype']=='admin')
				echo "Admin Panel";
				else
				echo "User Panel";
		}
		echo "</div>";
		
		echo " <div style='position:absolute;left:450px;top:245px;'><hr color='#3DC697' width='120px' align='left'></div>
    	<div ><hr color='black' width='712px' style='position:relative;left:68px;'></div>
    	"; 
		echo "<br>";
	
echo "
    <div id='display_item_body2'>
    	<div id='display_item_sub_body2'>";

		if(!isset($_REQUEST['titel']))
		{
			if($row['usertype']=='admin')
			{
			echo "<br>";echo "<br>";
			echo "<div id='admin_transaction'><a href='adminchoice.php'>Transactions and Reports</a></div>";
			}
		}
 		
	if(isset($_REQUEST['titel']))
	{	
		if($title=='Public Profile')
		{
			echo"<div id='profile_image'>";
					include("dbconnect.php");
					
					$rs=mysqli_query($con,"select profile_pic from user_detail where custname='$usrname'");
					
						if(mysqli_num_rows($rs)!=0)
						{
						$row=mysqli_fetch_array($rs);
						$img=$row['profile_pic'];
						echo "<img src='images/$img' width='270' height='219px'>";
						}
					
				
			echo "<form method='post' action='upload_profile_pic.php' enctype='multipart/form-data'>";
					
					echo "<div style='position:absolute;top:521px;left:540px;font-size:14px;' >";
						echo "Upload Image: <input type='file' name='file1'/>";echo "<br>";echo "<br>";
						echo "<input type='submit' value='SAVE' id='save_button'></div>";	
	echo "<div style='width:600px;background-color:white;margin-top:-4px;height:40px;position:absolute;left:721px;'>";
					echo"</div>";//ending of profile pic
				echo "</form>";
			echo "</div>";
		}
		else if($title=='My Listings')
		{
		
		include("dbconnect.php");
		
		$rsitem=mysqli_query($con,"select * from product_details where publisher_name='$usrname'") or die("query error");
		
	if(mysqli_num_rows($rsitem)==0)
		{
			echo "<br>";echo "<br>";
			echo "No Listings have been added yet.";
		}
	else
		{
		while($row=mysqli_fetch_array($rsitem))
		{
			$pid=$row['product_id'];
			$pcatid=$row['product_cat_id'];
			$imge=$row['image_path'];
			$title=$row['product_title'];
			$ucity=$row['city'];
			$uregion=$row['region'];
			$price=$row['product_price'];
			
			$rsubcat=mysqli_query($con,"select category_name from category_detail where cid=$pcatid");
			$row=mysqli_fetch_array($rsubcat);
			$sub_cat_name=$row['category_name'];
	
	echo "<a href='enlarge_item.php?product_id=$pid'>";		
			
			echo "<div id='item_image_detail'>";
            	echo "<div id='item_image_frame'>";
                	echo "<img src='images/$imge' width='258' height='160px''>";
               		echo "<br>";echo "<br>";
					echo "&nbsp;";echo "&nbsp;";echo "$title";
					echo "<br>";echo "<br>";

	echo "</a>";
		
						echo "<div style='color:grey;font-size:13px;font-weight:bold;padding-left:10px;'>";
							echo $sub_cat_name;
							echo " | $ucity ";
							echo "($uregion)";
			    		echo "</div>";
					echo "<br>";echo "<br>";
					echo "<div style='width:85px;height:27px;background-color:#3DC697;margin-left:10px;  padding-top:8px;color:white;font-size:14px;font-weight:bold;' align='center'>";
			
						echo "Rs $price";
						
					echo "</div>";//ending of price div
					
					echo "<div style='padding-left:150px;color:#666;'>";	
						echo "<a href='update_item_form.php?sub_category_id=$pcatid&product_id=$pid'>";echo "Edit |";echo "</a>";
						echo "<a href='userchoice.php?flag=1&product_id=$pid'>";echo " Delete";echo "</a>";
					echo "</div>";
						
				echo "</div>";//ending of item_image_frame
            echo "</div>";//ending of item_image_detail
			}//ending of while loop
		}//endng of else
		}//ending of else if
		else if($title=='Alerts')
		{
			echo "<br>";echo "<br>";
			echo "You do not have any alerts yet .";
		}
		else if ($title=='Update Account')
		{
			echo "<br>";echo "<br>";
			include("function/fun.php");

		}
		else if($title=='Change Email')
		{
			echo "<br>";echo "<br>";
			include("function/fun_mail.php");
		
		}
		else if($title=='Change Username')
		{
			echo "<br>";echo "<br>";
			include("function/fun_username.php");	
		}
		else if($title=='Change password')
		{
			echo "<br>";echo "<br>";
			include("function/fun_password.php");	
		
		}
		else if($title=='Delete Account')
		{
			echo "<br>";echo "<br>";
			echo "<div style='font-weight:bold;font-size:16px;'>Are you sure you want to delete Account</div>";echo "<br>";
			echo "<form method='get' action='delete_account.php'>";
				echo "
					  <span><input type='submit' value='YES' id='login_button'></span>
					    <span><input type='reset' value='NO' id='login_button'></span>
					";
			echo "</form>";
		}
	}//ending of if

echo "</div>";//display_item_body2
echo "</div>";//display_item_sub_body2
?>
</div><!--closing of content-->
<?php

if(isset($_REQUEST['flag']))
{
	$product_id=$_REQUEST['product_id'];
	include("dbconnect.php");
	mysqli_query($con,"delete from product_details where publisher_name='$usrname' and product_id=$product_id") or ("die query error");
}


?>
<?php
	include("footer.php");
?>