<?php
if(session_id()=="")
session_start();

?>     

<?php
include("header.php");
?>

<!--when  sub category is clicked-->
<?php
		
		if(isset($_REQUEST['sub_category_id']))
		{
		$sub_cat_id=$_REQUEST['sub_category_id'];
		
		include("dbconnect.php");
		
		if(isset($sub_cat_id))
		
		$rscat1=mysqli_query($con,"select category_name,parent_id from category_detail where cid='$sub_cat_id'");
		$row1=mysqli_fetch_array($rscat1);
		$sub_cat_name=$row1['category_name'];
		$parent_cat_id=$row1['parent_id'];
		
		$rscat2=mysqli_query($con,"select category_name from category_detail where cid='$parent_cat_id'");
		$row2=mysqli_fetch_array($rscat2);
		$parent_cat_name=$row2['category_name'];
		
		echo "<div id='login_top'>";
          echo "<div>";
		  
		 
		   echo "<a href='index.php'>FlickEazy >></a>";
		    
		   echo "<a href='display_item.php?cat_parent_id=$parent_cat_id'>$parent_cat_name >></a>$sub_cat_name";
		  
		  echo "</div>";
        echo "</div>";
		}
?>

<!--when  parent category is clicked-->
<?php
if(isset($_REQUEST['cat_parent_id']))
{
	$parent_cat_id=$_REQUEST['cat_parent_id'];
	include("dbconnect.php");
	
		$rs1=mysqli_query($con,"select category_name from category_detail where cid='$parent_cat_id'");
		$row1=mysqli_fetch_array($rs1);
		$parent_cat_name=$row1['category_name'];
		
		echo "<div id='login_top'>";
          echo "<div>";
		   
		   echo "<a href='index.php'>FlickEazy >></a>$parent_cat_name";
		   
		  echo "</div>";
        echo "</div>";
}
?>
<?php
if(isset($_REQUEST['flag']))
{
	$title=$_REQUEST['txt_title'];
	echo "<div id='login_top'>";
          echo "<div>";
		   
		   echo "<a href='index.php'>FlickEazy >></a>Search Results:$title";
		   
		  echo "</div>";
        echo "</div>";
}
?>
<div id="content">
	
    <div style="font-weight:bold;font-size:17px;">Advanced Search</div>
    <div style="position:absolute;left:110px;"><hr color="#3DC697" width="90px" align="left"></div><!--closing of hr1-->
    <div ><hr color="black" width="320px" align="left"></div><!--closing of hr2-->
    <br>


    <div id="display_item_body1">
    
  
    </div>
        <div style="font-weight:bold;font-size:17px;padding-left:340px;position:absolute;top:230px;"><?php if(isset($_REQUEST['sub_category_id']))echo"$sub_cat_name";else if(isset($_REQUEST['cat_parent_id'])) echo"$parent_cat_name";else if(isset($_REQUEST['flag']))echo"";?></div>

    <div style="position:absolute;left:450px;top:245px;"><hr color="#3DC697" width="100px" align="left"></div><!--closing of hr1-->
    <div ><hr color="black" width="712px" style="position:relative;top:-36px;left:48px;"></div><!--closing of hr2-->
    <br> <br>
	
    <div id="display_item_body2">
    	<div id="display_item_sub_body2">
           <div id="display_item_sub_sub_body2">
           		
           </div><!--closing of display_item_sub_sub_body2-->
			<br>
            
            <div style="font-weight:bold;font-size:17px;">Listings</div>
    		<div style="position:absolute;left:450px;"><hr color="#3DC697" width="100px" align="left"></div>
    		<div ><hr color="black" width="790px"></div>
    	
		<?php
		if(isset($_REQUEST['flag']))   //for advanced search
		{
			if(isset($_REQUEST['flag'])==1)
			{
			$title=$_REQUEST['txt_title'];
			$parent_cat_id=$_REQUEST['cmb_category'];
			$region=$_REQUEST['cmb_region'];
			$city=$_REQUEST['cmb_city'];
		
				include("dbconnect.php");
		
	$rs_sub_cat=mysqli_query($con,"select cid,category_name from category_detail where parent_id=$parent_cat_id") or die("query error");
	
	$count_row=mysqli_num_rows($rs_sub_cat);
	
if(mysqli_num_rows($rs_sub_cat)==0)//if someone has not choosen parent category ie.2nd hand books etc.
{
		
	
		$rstitle=mysqli_query($con,"select * from product_details where  product_title like '%$title%' ") or die("query error");//query if someone has entered title only or not
		
		if(mysqli_num_rows($rstitle)!=0)//if someone has  entered title only and product found
		{
			while($row=mysqli_fetch_array($rstitle))
			{
				include("function/item_search_fun.php");
			}
		}	
	else//1
	{
		$rstitle=mysqli_query($con,"select * from product_details where  product_title like '%$title%' and region='$region' ") or die("query error");//query if someone has entered title and region both or not
		
		if(mysqli_num_rows($rstitle)!=0)//if someone has entered title and region and product found
		{
			while($row=mysqli_fetch_array($rstitle))
			{
				include("function/item_search_fun.php");
			}
		}
		else//2
		{
		$rstitle=mysqli_query($con,"select * from product_details where region='$region' ") or die("query error");//query if someone has entered region only..
			if(mysqli_num_rows($rstitle)!=0)//if someone has selected region only and product found
			{
				while($row=mysqli_fetch_array($rstitle))
			
				include("function/item_search_fun.php");
			
			}
		else//3
			{
		$rstitle=mysqli_query($con,"select * from product_details where city='$city' ") or die("query error");//query if someone has entered city only..
			if(mysqli_num_rows($rstitle)!=0)//if someone has selected city only and product found
				{
					while($row=mysqli_fetch_array($rstitle))
			
						include("function/item_search_fun.php");
			
				}
			else//if someone has selected city only but there is no product
		
			echo "There are no results matching \"$title\"";
			}
	
		}
	}
}
else//if someone has choosen parent category ie.2nd hand books etc.
{
	
	$count=0;
	while($row_sub_cat=mysqli_fetch_array($rs_sub_cat))
		{
		$cat_sub_id=$row_sub_cat['cid'];
		$sub_cat_name=$row_sub_cat['category_name'];
		
		$count++;
		
		$rsitem=mysqli_query($con,"select * from product_details where  product_title like '%$title%' and product_cat_id=$cat_sub_id ") or die("query error");//query if someone has choosen parent category ie.2nd hand books etc. and entered title
		
	if(mysqli_num_rows($rsitem)!=0)//if someone has choosen parent category ie.2nd hand books etc. and entered title
	{
		while($row=mysqli_fetch_array($rsitem))
			
				include("function/item_search_fun.php");
			
   	}
	else//1
	{
		$rsitem=mysqli_query($con,"select * from product_details where region='$region'  and product_cat_id=$cat_sub_id ") or die("query error");//if someone has choosen parent category ie.2nd hand books etc. and entered region
			
		if(mysqli_num_rows($rsitem)!=0)//if someone has choosen parent category ie.2nd hand books etc. and entered region
			{
				while($row=mysqli_fetch_array($rsitem))
			
				include("function/item_search_fun.php");
			}
   		
		else//2
			{
			$rsitem=mysqli_query($con,"select * from product_details where city='$city'  and product_cat_id=$cat_sub_id ") or die("query error");//if someone has choosen parent category ie.2nd hand books etc. and entered city
			
			if(mysqli_num_rows($rsitem)!=0)//if someone has choosen parent category ie.2nd hand books etc. and entered city
				
				{
					while($row=mysqli_fetch_array($rsitem))
					
					include("function/item_search_fun.php");
				}
		    else//3
		        {
	
					$rsitem=mysqli_query($con,"select * from product_details where  product_cat_id=$cat_sub_id ") or die("query error");//query if someone has choosen parent category ie.2nd hand books etc. 
		
					if(mysqli_num_rows($rsitem)!=0)//if someone has choosen parent category ie.2nd hand books etc. 
					{
						while($row=mysqli_fetch_array($rsitem))
			
						include("function/item_search_fun.php");
			
   					}
		
		        }
	   
	   		}
	  
	  }
			
	/*if($count==$count_row)
			
	echo "Not found";*/		
	
	}//ending of while loop
  }
 }
}
		
		?>		
	    <!--when sub category is clicked-->
		<?php    
        	if(isset($_REQUEST['sub_category_id']))
			{
			include("dbconnect.php");
			$rsitem=mysqli_query($con,"select * from product_details where product_cat_id='$sub_cat_id'");
			while($row=mysqli_fetch_array($rsitem))
			{
			$id=$row['product_id'];
			$imge=$row['image_path'];
			$title=$row['product_title'];
			$ucity=$row['city'];
			$uregion=$row['region'];
			$price=$row['product_price'];
	
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
				echo "</div>";//ending of item_image_frame
            echo "</div>";//ending of item_image_detail
			}//ending of while loop
}
		?>
         

<!--when parent category is clicked-->

 <?php
if(isset($_REQUEST['cat_parent_id']))
{
	
	$rs2=mysqli_query($con,"select cid from category_detail where parent_id=$parent_cat_id") or die("query error");
	
	while($row2=mysqli_fetch_array($rs2))
	{
		$cat_sub_id=$row2['cid'];
	
	
		$rs_sub_cat=mysqli_query($con,"select category_name from category_detail where cid='$cat_sub_id'");
		$row_sub_cat=mysqli_fetch_array($rs_sub_cat);
		$sub_cat_name=$row_sub_cat['category_name'];
	
	
	
	
	$rs3=mysqli_query($con,"select * from product_details where product_cat_id=$cat_sub_id") or die("query error");
	
		while($row3=mysqli_fetch_array($rs3))
		{
			$id=$row3['product_id'];
			$imge=$row3['image_path'];
			$title=$row3['product_title'];
			$ucity=$row3['city'];
			$uregion=$row3['region'];
			$price=$row3['product_price'];
	
	
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
	
			}

		
         
		
	}
}
?>
               
        
        
        </div><!--closing of display_item_sub_body2-->
    </div><!--closing of display_item_body2-->		


</div><!--closing of content-->
<?php
include("footer.php");
?>