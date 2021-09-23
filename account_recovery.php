<?php
	include("header.php");
?>

		<div id="login_top">
        	<div><a href="index.php">FlickEazy >></a>Recover Password</div>
        </div>

	<div id="content">
       <div align="center">
		 <h1 style="position:relative;top:-40px;">Account Recovery</h1>
		   <div style="position:absolute;top:256px;left:470px;"><hr color="#3DC697" width="140px" ></div><!--closing of hr1-->
           <div style="position:relative;top:-40px;left:50px;"><hr color="black" width="300px"></div><!--closing of hr2-->
	   	   <br>
         <div id="recovery"> 
          <form method="get" action="check_recovery.php">
            	<?php
                	if(isset($_REQUEST['err1']))
					{
					if($_REQUEST['err1']==0)
						{
							echo "<div style='color:red;position:absolute;top:300px;left:600px;'>";
								echo "*Wrong Email Entered";
							echo "</div>";
						}
					}
					if(isset($_REQUEST['err2']))
					{
					if($_REQUEST['err2']==0)
						{
							echo "<div style='color:red;position:absolute;top:300px;left:600px;'>";
								echo "*Wrong Answer";
							echo "</div>";
						}
					}
					if(isset($_REQUEST['err3']))
					{
					if($_REQUEST['err3']==0)
						{
							echo "<div style='color:red;position:absolute;top:300px;left:600px;'>";
								echo "*Wrong Question Entered";
							echo "</div>";
						}
					}
                ?>
				<div style="display:inline-table;">Enter Email</div><div style="display:inline-table;position:relative;left:24px;"><input type="text" name="txtemail" size="23px"></div><br><br>
                
                    Security Question&nbsp;&nbsp;
                    <select name="cmb_security_ques" style="width:200px;">
                    	<option>Choose a Question?</option>
                    	<option>Your mother name?</option>
                        <option>Your father name?</option>
                        <option>Your pet name?</option>
                        <option>Your friends name?</option>
                        <option>Your grandfathers name?</option>
                        <option>What was the name of your elementary / primary school?</option>
						<option>In what city or town does your nearest sibling live?</option>
						<option>What time of the day were you born? (hh:mm)</option>
                    </select>
                    <br><br>
 						<div style="display:inline-table;position:relative;left:68px;">Answer</div><!--div closed-->
					     <div style="display:inline-table;padding-left:80px;">
                	<input type="text" placeholder="Answer" name="txtsecurity_ques_answer" style="width:200px;height:20px;">
                    	</div><br><br><br>
                    <input type="submit" value="RECOVER" id="login_button">
          </form> 	
       	  </div><!--ending of recovery-->	
       </div>    
    </div><!--ending of content-->
<?php
	include("footer.php");
?>
