<?php
$name=$_REQUEST['txt_name'];
$email=$_REQUEST['txt_email'];
$subject=$_REQUEST['txt_subject'];
$message=$_REQUEST['txt_message'];

include("dbconnect.php");

$rs=mysqli_query($con,"insert into contact_detail(uname,uemail,usubject,umessage)values('$name','$email','$subject','$message')")or die("query error");

echo "data saved";
?>