<style type="text/css">

.contact 
{
	width: 430px;
	font-family:georgia; 
	background-color: #f3f3f3;
	padding: 30px 30px;
	border: 1px solid #e1e1e1;
	-moz-box-shadow: 0px 0px 8px #444;
	-webkit-box-shadow: 0px 0px 8px #444;
	border-radius:0px;
	opacity:.8;
}
label
 {
	float: left; 
	clear: left; 
	margin: 11px 20px 0 0; 
	width: 95px;
	text-align: right; 
	font-size: 16px; 
	color: #445668;
	text-transform: uppercase; 
	text-shadow: 0px 1px 0px #f2f2f2;
}
input 
{
	width: 260px; 
	height: 35px; 
	padding: 5px 20px 0px 20px; 
	margin: 0 0 20px 0;
	background:#e0e0e0;
	border-radius: 5px; 
	-moz-border-radius: 5px; 
	-webkit-border-radius: 5px;
	-moz-box-shadow: 0px 1px 0px #f2f2f2;
	-webkit-box-shadow: 0px 1px 0px #f2f2f2;
	font-family:georgia; 
	font-size: 18px; 
	color: #000; 
	text-transform: lowercase;
	
}
input::-webkit-input-placeholder  
{
    color: #a1b2c3; 
	
}
input:-moz-placeholder
{
    color: #a1b2c3; 
	
}
textarea 
{
	width: 260px; 
	height: 170px; 
	padding: 12px 20px 0px 20px; 
	margin: 0 0 20px 0;
	background:#e0e0e0 ;
	border-radius: 5px; 
	-moz-border-radius: 5px; 
	-webkit-border-radius: 5px;
	-moz-box-shadow: 0px 1px 0px #f2f2f2;
	-webkit-box-shadow: 0px 1px 0px #f2f2f2;
	font-family: georgia; 
	font-size: 18px; 
	color: #000; 
	text-transform: lowercase; 
	
}
textarea:-webkit-input-placeholder  
{
    color:#a1b2c3  ; 
	
}
textarea:-moz-placeholder 
{
	color: #a1b2c3; 
		
}
input:focus, textarea:focus 
{
	background:;
}
input[type=submit]
 {
	width: 185px; 
	height: 52px; 
	float: right; 
	padding: 10px 15px; 
	margin: 0 15px 0 0;
	border: 1px solid #556f8c;
	cursor: pointer;
}
input[type=submit]:hover
 {
	width: 185px; 
	height: 52px; 
	float: right; 
	padding: 10px 15px; 
	margin: 0 15px 0 0;
	-moz-box-shadow: 0px 0px 5px #111;
	-webkit-box-shadow: 0px 0px 5px #111;
        box-shadow: 0px 0px 5px #111;
	cursor: pointer;
	opacity:.8;
}
.your
{
	float: left; 
	clear: left; 
	text-align: right; 
	font-size: 30px;
	font-family: segoe UI light; 
	color: #445668;
	text-transform: uppercase; 
	
}

</style>
<center><br><br><br><br>
<div class="contact">
<p class="your">Your Suggestion</p><br><br><br><br><br>
	<form action="" method="post">
			<fieldset>
			<label for="email">Email</label>
			<?php echo $_SESSION['email'];?>
			<br />
			<label for="subject">Subject</label>
			<input type="text" id=text name="subject" placeholder="Subject" />
			<label for="suggestion">Suggestion</label>
			<textarea id="suggestion" name ="textarea" placeholder="What's on your mind?"></textarea>
			<input type='hidden' name='stevejobs' value='1'>
			<input type='hidden' name='email' value='<?php echo $_SESSION['email']; ?>'>
			<input type="submit" value="Send Suggestion" />
		</fieldset>
	</form>
	
</div>
<?php 

if(!empty($_POST['stevejobs']) && isset($_POST['stevejobs'])){
			
function spam_stopper($value)
   {
   	$bad_chars=array('bcc:','to:','cc:','content-type:','mime-version:','multipart-mixed:','content-transfer-encoding:' );
   	foreach($bad_chars as $b)
	   	 {
	   	 if(stripos($value,$b)==true)
	   	  return '';	
	   	 }
   	$value=str_replace(array('\r','\n','%0a','%0d'),'',$value);
	   	return trim($value);
   }

 $scrub=array_map('spam_stopper',$_POST);	
 if(!empty($scrub['email']) && !empty($scrub['subject']) && !empty($scrub['textarea']))
     {
     	$body="Message".$_SESSION['iden']." ".$_SESSION['id'].":{$scrub['textarea']}";
     	$body=wordwrap($body,70);
     	mail('monty.sinngh@gmail.com',$scrub['subject'],$body,"From:{$scrub['email']}");
        echo "<p>your mail is sent succesfully. We'll reply ASAP! </p>";     	
        $_POST=array();
     }
else echo"<p><br /><b><big>Error!</big> Please fill out the form Completely</b></p>";






}


?>


</center>