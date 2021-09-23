<?php
	include("header.php");
?>
<div id="content">
	  
    <form method="get" action="delete_category.php">
    	<h1 align="center">DELETE CATEGORY</h1>
        <hr width="500px">
     
     <div style="position:absolute;top:200px;left:500px;"> <!--starting of div1-->  
        <table align="center"  cellpadding="8px">
    
         <br><br><br>
        <tr><td>Choose Category to Delete</td><td><select name="cmb_cat">
        <option value="0">Choose Category</option>
        <?php
			include("dbconnect.php");
			
			$rs1=mysqli_query($con,"select cid,category_name from category_detail order by category_name");
			while($row1=mysqli_fetch_array($rs1))
			{
				$id1=$row1['cid'];
				echo "<option value='$id1'>";
					echo $row1['category_name'];
				echo "</option>";
			}
		?>
        </select></td></tr><br>
    	
        <tr><td><input type="submit" value="Delete"></td></tr>
        </table>
	</div><!--closing of div1-->
</div><!--closing of content-->
<?php
	include("footer.php");
?>
