<?php
if(session_id()=="")
session_start();

?>     

<?php
$image=$_FILES['file1'];
move_uploaded_file($image['tmp_name'],"B:\\wamp\\www\\FLICKEAZY\\images\\".$image['name']);
$img=$image['name'];

$usrname=$_SESSION['usrname'];
include("dbconnect.php");

mysqli_query($con,"update user_detail set profile_pic='$img' where custname='$usrname'") or die("query error");
header("location:userchoice.php");
?>