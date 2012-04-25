<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Forgot Password</title>
<link rel="stylesheet" type="text/css" href="files/css/style.css" />
	<script type="text/javascript">
 var RecaptchaOptions = {
    theme : 'blackglass'
 };
 </script>	
</head>
<body><br><br><br>
<div class="container">
	<section id="content">
		<form  method="POST"  action='ajax/fforgot.php' accept-charset="utf-8">
			<div style="-webkit-transition: -webkit-transform 10000000s ease-out"  onclick="this.style.webkitTransform='rotate(10000000000deg)'">
                        <h1>Recover Form</h1>
                        </div><br>
		<center>
	            <div style="font-family:segoe UI light;font-size:18px;color:grey">
	            
	            <input type="radio" name="radio" id='fac' value='f'> Faculty <br> 
	            <input type="radio" checked="checked" name="radio" id='stu' value='s'> Student
	        </div></center><br><br>
			<div>
			
				<input type="text" name='email' placeholder="Email address" required="" id="username" />
				<input type='hidden' name='stevejobs' value='1'>
			</div>
<div>
		<?php
          require_once('recaptchalib.php');
          $publickey = "6Lfdn84SAAAAAN5a6VH5Q4zSefu-5z_NlpGKHIK4"; // you got this from the signup page
          echo recaptcha_get_html($publickey);
        ?>	

</div>

<div>
 				<input type="submit" value="Reset" />
				
				<a href="login">Login</a>
			</div>
	</form>			
    </section>
</div>

	
</body>
</html>