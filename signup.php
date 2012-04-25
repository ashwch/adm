<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=us-ascii" />
<title>SIGN UP</title>
<script type="text/javascript" src="files/js/jquery.js"></script>
<script type="text/javascript" src="files/js/signup.js"></script>
 <script type="text/javascript">
 var RecaptchaOptions = {
    theme : 'blackglass'
 };
 </script>
 <noscript>

  <meta http-equiv="refresh" content="0;url=http://project.dlzip.in/noscript1">


</noscript>
<style type="text/css">

#sign{
color:green;
background:red;

}
.pop
 {
   position: absolute;
   left:800px;
   width: 20px;
   background: black;
   cursor: pointer;
   color: white;
   border-radius: 5px;
 }
.pop span
 {
   display: none;
 }
.pop:hover span
 {
   position: absolute;
   top: 1.5em;
   left: 1.5em;
   width: 200px;
   padding: 5px;
   display: block;
   border: 1px solid #000;
   background: #000;
   color: white;
   border-radius: 5px;
   font-family:georgia;
   font-size:13px;
 }
    .formLayout
    {

        background-color: #f3f3f3;
        border: solid 1px #a1a1a1;
        padding: 30px;
        width: 700px;

    }
    .formLayout label
    {
        display: block;
        width: 220px;
        float: left;
        margin-bottom: 10px;
        font-family:georgia;
    }
     .formLayout input
        {
        display: block;
        width: 220px;
        float: left;
        margin-bottom: 10px;
    }
         .formLayout select
        {
        display: block;
        width: 220px;
        float: left;
        margin-bottom: 10px;
    }

    .formLayout label
    {
        text-align: right;
        padding-right: 20px;
    }

    br
    {
        clear: left;
    }

   #sign
{
 color: black;
 font-size:19px;
 width: 130px;
 height: 30px;
 border: 1px solid #505050;
 background: #c0c0c0;
 border-radius:5px;
 cursor:pointer;
 font-family:georgia;
float:center;
}
   #sign:hover
{
 color: black;
 font-size:19px;
 width: 130px;
 height: 30px;
 background: #e0e0e0;
	-moz-box-shadow: 0px 0px 15px #8a8a8a;
	-webkit-box-shadow: 0px 0px 15px #8a8a8a;
        box-shadow: 0px 0px 15px #8a8a8a;
	cursor: pointer;
	opacity:.8;
}
#up
{
 font-family:segoe;
 font-size:30px;
 color:white;
}
.your
{
 

	font-size: 30px;
	font-family: segoe UI light; 
	color: white;
	text-transform: uppercase; 
	
}

</style>
</head>
<body bgcolor="black"><br />
<center>
<div class="your">SIGN UP</div><br />
<div class="formLayout" align="center">
<form method="post" name="reg" onsubmit="" action='ajax/mailsearch.php'><label for="firstname">First Name:</label><input type="text" name="fname" placeholder="Enter Your First Name" />
<div class="pop">
<center><strong>?</strong></center><span>
<center>Name should be atleast 3 characters</center></span></div><br />
<label for="lastname">Last Name:</label><input type="text" name="lname" placeholder="Enter Your Last Name" />
<div class="pop">
<center><strong>?</strong></center><span>
<center>Last name is optional</center></span></div><br />
<label for="RollNumber">Roll Number:</label><input class='signup_ajax' type="text" addon='roll' name="roll" placeholder="Enter Your Roll Number" /><span id='roll_notify'></span><br />

<label for="reg_email__">Your Email:</label><input class='signup_ajax' type="text" addon='email' name="email" placeholder="Enter Your Email" /><span id='email_notify'></span><br />
<label for="ContactNumber">Contact Number:</label><input class='signup_ajax' type="text" addon='contact' name="contact" placeholder="Enter Your Contact Number" /><span id='contact_notify'></span><br />
<label for="reg_passwd__">New Password:</label><input class='signup_ajax' type="password" addon='password' name="password" value="" placeholder="Enter Your New Password" /><span id='password_notify'></span>
<div class="pop">
<center><strong>?</strong></center><span>
<center>password should contain atleast 8 charcters and special characters like $ # @ & are also allowed</center></span></div><br />
<label for="reg_passwd_confirmation__">Re-enter Password:</label><input class='signup_ajax' addon='passwordd' disabled=disabled type="password" name="passwordd" placeholder="Re-Enter Your Password" /><span id='passwordd_notify'></span><br />
<label>College</label>
<div style="float: left">IMSEC</div><br />

<label>I am:</label><select class="select" name="sex" id="sex">
<option value="0">Select Sex:</option>
<option value="f">Female</option>
<option value="m">Male</option></select><br />
<br />
<label></label><?php
          require_once('recaptchalib.php');
          $publickey = "6Lfdn84SAAAAAN5a6VH5Q4zSefu-5z_NlpGKHIK4"; // you got this from the signup page
          echo recaptcha_get_html($publickey);
        ?>
<label></label>        
<input type='hidden' name='stevejobs' value='x'></input><br />
<input type="submit" disabled='disabled' id="sign" name="Sign Up" value="SIGN UP" /><br />
</form></div></center>

</body>
</html>