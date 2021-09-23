<?php
include("header.php");
?>
<div id="content">
<?php
	include("dbconnect.php");
			$rsitem=mysqli_query($con,"select * from product_details");
			
			while($row=mysqli_fetch_array($rsitem))
			{
			$pid=$row['product_cat_id'];
			$imge=$row['image_path'];
			$title=$row['product_title'];
			$ucity=$row['city'];
			$uregion=$row['region'];
			$price=$row['product_price'];
			
			$rscat=mysqli_query($con,"select category_name from category_detail where cid=$pid");
			$rowcat=mysqli_fetch_array($rscat);
			$sub_cat_name=$rowcat['category_name'];
			
			echo "<div id='item_image_detail'>";
            	echo "<div id='item_image_frame'>";
                	echo "<img src='images/$imge' width='258' height='160px'>";
               		echo "<br>";echo "<br>";
					echo "&nbsp;";echo "&nbsp;";echo "$title";
					echo "<br>";echo "<br>";
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
			}
    ?>
</div><!--ending of content-->
<?php
include("footer.php");
?>