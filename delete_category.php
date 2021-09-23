<?php
$catid=$_REQUEST['cmb_cat'];

include("dbconnect.php");

$rs=mysqli_query($con,"delete from category_detail where cid=$catid") or die("query error");

echo "category deleted";
?>