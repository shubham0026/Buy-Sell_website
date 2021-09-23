
<?php
$id=$row['product_id'];
			$imge=$row['image_path'];
			$title=$row['product_title'];
			$ucity=$row['city'];
			$uregion=$row['region'];
			$price=$row['product_price'];
			$p_cat_id=$row['product_cat_id'];
		$rs_sub=mysqli_query($con,"select category_name from category_detail where cid=$p_cat_id");
		$row1=mysqli_fetch_array($rs_sub);
		$sub_cat_name=$row1['category_name'];
		
		echo "<a href='enlarge_item.php?product_id=$id'>";		
			
			echo "<div id='item_image_detail'>";
            	echo "<div id='item_image_frame'>";
                	echo "<img src='images/$imge' width='258' height='160px'>";
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
					echo "</div>";
				echo "</div>";
            echo "</div>";
		
?>