<?php
	include("header.php");
?>
<div id="content">
	  <div id="box1">
      <h2 align="center">Main category</h2><br>
      <?php
	  	include("dbconnect.php");
		
		$rs_cat=mysqli_query($con,"select cid,category_display_name from category_detail where parent_id=0");
		while($row1=mysqli_fetch_array($rs_cat))
		{
			$id=$row1['cid'];
			echo "<a href='category_list.php?cid=$id&usertype=1' style='color:white;padding-left:70px;'>";
			echo $row1['category_display_name'];
			echo "</a>";
			echo "<br>";
		}
	
	  
echo "</div>";
      
	  echo "<div id='box2'>";
       echo "<h2 align='center'>Sub category</h2><br>";
      	
			if(isset($_REQUEST['cid']))
		{
			$parent_cat_id=$_REQUEST['cid'];
			
		$rs_sub_cat=mysqli_query($con,"select cid,category_display_name from category_detail where parent_id=$parent_cat_id");
		
		while($row2=mysqli_fetch_array($rs_sub_cat))
		{
			echo "<div style='color:red;padding-left:76px;'>";
			echo $row2['category_display_name'];
	 	    echo "</div>";
			
		}
	}
	  echo "</div>";
?>
</div><!--closing of content-->
<?php
	include("footer.php");
?>