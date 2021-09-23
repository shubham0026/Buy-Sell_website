<?php
	
	$con=mysqli_connect("localhost","root","") or die("Connection Error");
	mysqli_select_db($con,"classified") or die("Database Selection Error");
	
?>