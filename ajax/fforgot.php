<?php
include('../files/sqlconn.php');
if(isset($_POST['radio']) && isset($_POST['email']) && isset($_POST['stevejobs']))
{
echo "<!DOCTYPE html><html lang='en'><head><title>ADM | Password Recovery</title>
<link rel='stylesheet' href='http://project.dlzip.in/files/css/style.css' type='text/css' />

</head><body bgcolor='black'><center><div class='message'>";
require_once('../recaptchalib.php');
  $privatekey = "6Lfdn84SAAAAAMjiWxkgrwNapHb4p0SVUhD8Z9vS";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

if (!$resp->is_valid) {
    echo"<p class='error'><b>Invalid Captcha!!</b></p>";
  }
 else { 

$email=$radio=NULL;
$safe=array_map('trim',$_POST);

if(!empty($safe['email'])){
    $temp=mysqli_real_escape_string($dbc,$safe['email']);
    $pattern="/^[a-zA-Z0-9]+[_.-]?[a-zA-Z0-9]+[_.-]?[a-zA-Z0-9]+[_.-]?[^!@#~$%^&*()_+.\s][@]{1}(([a-zA-Z0-9]{1,}[.]{1}[a-zA-Z0-9]{1,})|([a-zA-Z0-9]{1,}[.]{1}[a-zA-Z0-9]{1,}[.]{1}[a-zA-Z0-9]{1,}))$/";
    if(preg_match($pattern,$temp)){
    
    $email=$temp;
    }
    
    else echo"<p class='error'><b>Invalid Email id!!</b></p>";
   }
   
 if(!empty($safe['radio']))
				    {
				     $radio=mysqli_real_escape_string($dbc,$safe['radio']);
				    }    
    	
  					else echo"<p class='error'><b>Please select Either Faculty or Student!!</b></p>";
   
   
   if ($email && $radio){
    if ($radio=='s')
    {

    $q="Select email,studid from student where email='$email'";
    $r=mysqli_query($dbc,$q);
    $row=mysqli_fetch_array($r);
    if($email==$row[0]){
    $k=md5(uniqid(rand(),true));
    $y=substr($k,-10);
    $ye=SHA1($y);
    $q="update stud set passwd='$ye' where studid='$row[1]'";
    $r=mysqli_query($dbc,$q);
    if(mysqli_affected_rows($dbc)==1){
     echo "A new Password has been sent to $email.";
     $body="your new password is : $y After login(http://project.dlzip.in/login) please go to your profile(http://project.dlzip.in/profilec) and change your password as soon as possible!";
     $body=wordwrap($body,70);
     mail("$email","Password Recovery - ADM" ,$body,"From:bot@project.dlzip.in"); 
    
    }
    
    else "OOPS! something Went Wrong";
     
    
    }
    else {echo "OOPS! no such email address found in our database ";}
    }
    else if ($radio=='f'){
       $q="Select email,facid from faculty where email='$email'";
    $r=mysqli_query($dbc,$q);
    $row=mysqli_fetch_array($r);
    if($email==$row[0]){
     
    $k=md5(uniqid(rand(),true));
    $y=substr($k,-10);
    $ye=SHA1($y);
    $q="update fac set passwd='$ye' where facid='$row[1]'";
    $r=mysqli_query($dbc,$q);
    if(mysqli_affected_rows($dbc)==1){
     echo "A new Password has been sent to $email.";
     $body="your new password is : $y After login(http://project.dlzip.in/login) please go to your profile(http://project.dlzip.in/profilec) and change your password as soon as possible!";
     $body=wordwrap($body,70);
     mail("$email","Password Recovery - ADM" ,$body,"From:bot@project.dlzip.in"); 
    
    }
    
    else "OOPS! something Went Wrong";
    
    
    
    }
    else {echo "OOPS! no such email address found in our database ";}
    }
    
       
   }
   else{
   
   echo "Something Went Wrong. Try again";
   }
   
   
   
   
   

}
}
else {echo "Please Fill the form Properly";}




?>