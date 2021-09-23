<?php
if(session_id()=="")
session_start();

?>
<?php
include("header.php");
?>
<?php
		$usrname=$_SESSION['usrname'];
		$id=$_REQUEST['product_id'];

		include("dbconnect.php");
		$rs1=mysqli_query($con,"select * from product_details where product_id=$id");
		$row1=mysqli_fetch_array($rs1);
		$imge=$row1['image_path'];
			$title=$row1['product_title'];
			$country=$row1['country'];
			$ucity=$row1['city'];
			$uregion=$row1['region'];
			$price=$row1['product_price'];
			$publish_date=$row1['publish_date'];
			$product_description=$row1['product_description'];
			$contact_no=$row1['contact_no'];
			$cat_id=$row1['product_cat_id'];
	$rs2=mysqli_query($con,"select category_name from category_detail where cid=$cat_id");
		$row2=mysqli_fetch_array($rs2);
		$sub_cat_name=$row2['category_name'];
		
	
		echo	"<div id='login_top'>
        		<div><a href='index.php'>FlickEazy >></a>
				<a href='display_item.php?sub_category_id=$cat_id'>$sub_cat_name</a> >> $title</div>
        	</div>";

	
?>
<div id="content">
	<div id="enlarge_item_detail1">
    <?php
		include("dbconnect.php");
		echo "<div style='padding-top:20px;font-weight:bold;font-size:24px;'>";echo $title; echo"</div>";
		echo " <div style='position:absolute;left:121px;top:275px;'><hr color='#3DC697' width='150px' align='left'></div>";
      	    echo "<div ><hr color='black' width='755px'></div>";
			
			echo "<br>";
		echo "Cost - Rs $price";					
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Published Date - $publish_date";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
		echo "$uregion,$ucity,$country";
		echo "<br>";echo "<br>";
		echo "<div style='width:650px;height:500px;background-color:white' >";echo "<img src='images/$imge' width='400' height='500' style='padding-left:125px;'>";echo "</div>";	
		echo "<br>";
		echo "$product_description";echo "<br>";echo "<br>";echo "<br>";
		echo "Author/Publication:";echo "<br>";
		echo "Contact Number : $contact_no";echo "<br>";echo "<br>";
		echo "<div id='button1'> <a href='insert_item_form.php'>CONTACT SELLER</a></div>";
		echo "<div id='button1'> <a href='insert_item_form.php'>SHARE</a></div>";
		echo "<div id='button1'> <a href='insert_item_form.php'>SELL ALL ADDS FROM THIS ADVERTISER</a></div>";echo "<br>";echo "<br>";	 	 	 
	?>
    </div><!--ending of enlarge_item_detail1-->
    <div  id="enlarge_item_detail2">
    <?php
		echo "<div style='padding-top:20px;font-weight:bold;font-size:24px;'>";echo "Useful Information"; echo"</div>";
		echo " <div style='position:absolute;left:121px;top:1105px;'><hr color='#3DC697' width='150px' align='left'></div>";
      	    echo "<div ><hr color='black' width='755px'></div>";
			echo "<br>";
			echo "<ul>";
				echo "<li>";echo "Avoid scams by acting locally or paying with PayPal";echo "</li>";echo "<br>";
				echo "<li>";echo "Never pay with Western Union, Moneygram or other anonymous payment services";echo "</li>";echo "<br>";
				echo "<li>";echo "Don't buy or sell outside of your country. Don't accept cashier cheques from outside your country";echo "</li>";echo "<br>";
				echo "<li>";echo "This site is never involved in any transaction, and does not handle payments, shipping, guarantee transactions, provide escrow services, or offer 'buyer protection' or 'seller certification'";echo "</li>";echo "<br>";
			echo "</ul>";
	?>
    </div><!--ending of enlarge_item_detail2-->
    
    	
        <div id="enlarge_item_detail3">
        <div style="padding-top:20px;font-weight:bold;font-size:20px;">Leave Your Feedback (Spam And Offensive Messages Will Be Removed)</div>
		<div style="position:absolute;left:120px;top:1422px;"><hr color="#3DC697" width="156px" align="left"></div>
      	    <div ><hr color="black" width="775px" align="left"></div>
			<br><br>
            <form method="get" action="feedback.php" >
            Your Name<br><br>
			<input type='text' name="txt_name" size="105px" style="height:25px;"><br><br>
            Your Email<br><br>
			<input type='text' name="txt_email" size="105px" style="height:25px;"><br><br>
            Title<br><br>
			<input type='text' name="txt_title" size="105px" style="height:25px;"><br><br>
            Comment<br><br>
            <textarea name="txt_comment" style="width:760px;height:300px;"></textarea><br><br>
        	<input type="submit" value="SEND" id="login_button"><br><br>    
    		</form>
	</div><!--ending of enlarge_item_detail3-->
	<div id="enlarge_item_detail4">
    	<div style="margin-left:-20px;">Related Listing</div>
        <div style="position:absolute;left:101px;top:2218px;"><hr color="#3DC697" width="150px" align="left"></div>
      	    <div ><hr color="black" width="1155px"></div>
	
	<?php
		include("dbconnect.php");
		
		$rsitem=mysqli_query($con,"select * from product_details where product_title like '%$title%' limit 0,6") or die("query error");
		
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
	/*	
	if($pid==$id)
		{
			break;
		}*/
			
		echo "<a href='enlarge_item.php?product_id=$pid'>";		
			
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
	
			}
    
	?>
	</div><!--ending of enlarge_item_detail4-->
</div><!--ending of content-->
<?php
include("footer.php");
?>
