<?php
include("header.php");
?>
<?php
		include("dbconnect.php");
		
		$rsitem=mysqli_query($con,"select * from product_details") or die("query error");
	
	
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
			
			echo "<div style='width:258px;
	height:340px;
	background-color:#F8FBFC;
	display:inline-block;
	margin-right:23px;
margin-left:40px;
	margin-top:23px;
	font-size:16px;
	font-weight:bold;
	border:1px solid #DEDBD7;
	'>";
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
						//echo "<a href='update_item_form.php?sub_category_id=$pcatid&product_id=$pid'>";echo "Edit |";echo "</a>";
						echo "<a href='delete_item.php?flag=1&product_id=$pid' style='font-weight:bold;position:relative;top:-30px;text-decoration:underline;'>";echo " Delete";echo "</a>";
					echo "</div>";
						
				echo "</div>";//ending of item_image_frame
            echo "</div>";//ending of item_image_detail
			}//ending of while loop
			
	
		
?>	
<?php

if(isset($_REQUEST['flag']))
{
	$product_id=$_REQUEST['product_id'];
	include("dbconnect.php");
	mysqli_query($con,"delete from product_details where product_id=$product_id") or ("die query error");

}
?>
<?php
include("footer.php");
?>

