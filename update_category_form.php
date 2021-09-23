<?php
	include("header.php");
?>
<div id="content">
	
    
    <form method="get" action="update_category.php">
    	<h1 align="center">UPDATE CATEGORY</h1>
        <hr width="500px">
     
     <div style="position:absolute;top:200px;left:500px;"> <!--starting of div1-->  
        <table align="center"  cellpadding="8px">
        
       <?php 
        if(isset($_REQUEST['err']))
		{
			$error=$_REQUEST['err'];
			if($error==0)
			{
				echo "<div style='color:red;position:absolute;top:50px;left:40px;'>";echo "*old category real name or display name not choosen";echo "</div>";
			}
			
		}
        
       ?>
        <tr><td>Choose Old Category Real Name</td><td><select name="cmb_old_cat_real">
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
        
        <tr><td>Enter New Category Real Name</td><td><input type="text" name="txt_new_cat_real_name" required></td></tr><br>
        
        <tr><td>Choose Old Category Display Name</td><td><select name="cmb_old_cat_display">
        <option value="0">Choose Category</option>
        <?php
			include("dbconnect.php");
			$rs2=mysqli_query($con,"select cid,category_display_name from category_detail order by category_display_name");
			while($row2=mysqli_fetch_array($rs2))
			{
				$id2=$row2['cid'];
				echo "<option value='$id2'>";
					echo $row2['category_display_name'];
				echo "</option>";
			}
		?>
        </select></td></tr><br>
        <tr><td>Enter New Category Display Name</td><td><input type="text" name="txt_new_cat_display_name" required></td></tr><br>
        
        
        
       <tr><td><input type="submit" value="Ok">&nbsp;<input type="reset" value="Cancel"></td></tr>
    </table>
    </form>
    </div><!--ending of 1st div-->
</div><!--ending of content-->
<?php
	include("footer.php");
?> 