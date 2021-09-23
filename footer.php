<?php
if(session_id()=="")
session_start();

?>     
<div id="footer">
        	
			
            <div style="float:left;width:52px;"><a href="login.php">Login</a>&nbsp;|&nbsp;</div>
            <div style="float:left;width:202px;"><a href="registeration.php">Register for a free account</a>&nbsp;|&nbsp;</div>
            <div style="float:left;width:70px;"><a href="contact_form.php">Contact</a>&nbsp;|&nbsp;</div>
            <?php
              if(isset($_SESSION['usrname']))
			echo "<div style='float:left;width:200px;'><a href='insert_item_form.php'>Publish your ad for free</a></div>";
			else
			echo "<div style='float:left;width:200px;'><a href='login.php'>Publish your ad for free</a></div>";
			?>    
        
        </div><!--ending of footer-->
      </div><!--closing of main container-->
    </body>
</html>