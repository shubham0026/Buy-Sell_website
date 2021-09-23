<?php
	include("header.php");
?>
<div id="content">
	
    
    <form method="get" action="insertcategory.php">
    	<h1 align="center">INSERT CATEGORY</h1>
        <hr width="500px">
     
     <div style="position:absolute;top:200px;left:500px;">   
        <table align="center"  cellpadding="8px">
        	
        <tr><td>Enter Category Real Name </td><td><input type="text" name="txtcatname"></td></tr><br>
        <tr><td>Enter Category Display Name </td><td><input type="text" name="txtdisplayname"></td></tr><br>
        
        <tr><td>Choose Category Type</td><td><select name="cmbcat_type"><br>
        <option>Primary</option>
        <option>Secondary</option>
        </select></td></tr><br>
        
        <tr><td>Choose Parent Category</td><td><select name="cmb_parent_cat">
        <option value="0">Choose Category</option>
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
        </select></td></tr><br>
        <tr><td><input type="submit" value="Ok">&nbsp;<input type="reset" value="Cancel"></td></tr>
    </table>
    </form>
    </div>
</div><!--ending of content-->
<?php
	include("footer.php");
?> 