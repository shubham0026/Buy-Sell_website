<?php
if(session_id()=="")
session_start();

?>     
<!doctype html>

<html>
	<head>
    	<title>FlickEazy</title>
		<link type="text/css" rel="stylesheet" href="style/stylesheet.css">
    </head>
    
    <body>
    	<div id="maincontainer">
            	<div id="top">
                
                	<div id="welcome">Welcome 
					<?php 
					
					if(!isset($_SESSION['usrname']))	
					{
						echo "Guest";
					}
					else
					{
						$usrname=$_SESSION['usrname'];
					include("dbconnect.php");
					$rs=mysqli_query($con,"select usertype from user_detail where custname='$usrname'") or die("query error");
					$row=mysqli_fetch_array($rs); 
					 if($row['usertype']=='user')
                    	{
                        	echo "User";
                        }
					else if($row['usertype']=='admin')
						{
							echo "Admin";
						}
					}
					?>
                    </div>
          			<div id="register">
					<?php 
					
					if(!isset($_SESSION['usrname']))
					{
						echo "<a href='login.php'>Login</a>";
						echo " | <a href='registeration.php'>Register for a free account</a>";
					}
					else
					{
					
						if(isset($_SESSION['usrname']))
						{	
						
						
						echo "Hi&nbsp".$_SESSION['usrname']; 
						echo "<a href='userchoice.php?'><b> | My Account</b></a> | ";
						echo "<a href='logout.php?'>Logout</a>";
						}
					}
					?>
					 </div>
                
                </div><!--top container-->	
          <?php      
               
			   echo "<div id='companylogo'>";
				
		
				 echo "<a href='index.php'>FLICKEAZY</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='contact_form.php' style='font-size:19px;font-weight:500'>CONTACT</a>";
                
	
       if(isset($_SESSION['usrname']))
	   echo "<div id='button'> <a href='insert_item_form.php'>PUBLISH YOUR ADD FOR FREE</a></div>";	
		else
		echo "<div id='button'> <a href='login.php'>PUBLISH YOUR ADD FOR FREE</a></div>";	 
	 
     
     echo "</div>";//ending of company logo
    ?>           
              