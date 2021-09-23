<?php
	include("header.php");
?>
<div id="content">
	<div align="center">
    	<h1>ADMIN PANEL</h1>
        <hr width="500px">
    	<h2>TRANSACTIONS</h2>
        
         <a href="categoryform.php?">Create Category</a><br>
         <a href="update_category_form.php?">Update Category</a>  <br />
  		 <a href="delete_category_form.php?">Delete Category</a><br>
		 <a href="delete_item.php?">Delete Item</a><br>	
  		<h2>Reports</h2>
  		<a href="category_list.php?">Category List</a>  <br />
    	<a href="item_list.php?">Item List</a>  <br />


    </div>
</div><!--ending of content-->
<?php
	include("footer.php");
?>