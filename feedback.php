<?php
$name=$_REQUEST['txt_name'];
$email=$_REQUEST['txt_email'];
$title=$_REQUEST['txt_title'];
$comment=$_REQUEST['txt_comment'];

include("dbconnect.php");

mysqli_query($con,"insert into feedback(name,email,title,comment)values('$name','$email','$title','$comment')") or die("query error");

echo "data saved";
?>