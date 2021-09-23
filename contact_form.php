<?php
	include("header.php");
?>
<div id="login_top">
        	<div><a href="index.php">FlickEazy >> </a>Contact</div>
        </div>
<div id="content">
	<div style="font-weight:bold;padding-left:405px;">Contact Us</div>
    <div align="center" style="position:absolute;left:515px;"><hr color="#3DC697" width="100px"></div><!--closing of hr1-->
      <div align="center"><hr color="black" width="370px"></div><!--closing of hr2--><br>
    <div id="contact_form">
    <form action="contact.php" method="get">
    	<div class="field_name">Your Name(optional)</div>
        <div><input type="text" name="txt_name" class="field_text" required></div><br>
        <div class="field_name">Your Email Address</div>
        <div><input type="text" name="txt_email" class="field_text" required></div><br>
        <div class="field_name">Subject(optional)</div>
        <div><input type="text" name="txt_subject" class="field_text" required></div><br>
        <div class="field_name">Message</div>
        <div><textarea name="txt_message" style="width:336px;height:200px; " required></textarea></div><br>
      	<div><input type="submit" value="SEND" id="login_button"></div><br>
    </form>
    </div>
</div><!--ending of content-->
<?php
	include("footer.php");
?>