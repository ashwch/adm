<?php

include('../files/sqlconn.php');
if(isset($_REQUEST['search_term']) && $_REQUEST['search_term'] && isset($_REQUEST['addon']) && $_REQUEST['addon']){


$key=mysqli_real_escape_string($dbc,$_REQUEST['search_term']);
$db=mysqli_real_escape_string($dbc,$_REQUEST['addon']);



if ($db==='password'){
$pattern="/^[\w$#@&]{8,}$/";
if(preg_match($pattern,trim($key)))
 {echo 'valid';}		 	
		 	else echo 'invalid';



}

else if($db==='contact'){
$pattern="/^[^0][\d]{9}$/"; 
   if(preg_match($pattern,trim($key)))
       {
         $q="select cellno from faculty where cellno='$key'";
		   
                    $r=mysqli_query($dbc,$q);
                    $row_cnt = mysqli_num_rows($r);
                    		
                    if($row_cnt>0){
                     echo "invalid";
                    }
                    else echo "valid";
       
       
       }		 	
		 	else echo 'invalid';
   
 }
 


}

else if(isset($_POST['stevejobs'])){
echo "<!DOCTYPE html><html lang='en'><head><title>ADM | Form Verification</title>
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
$email=$contact=$roll=$password=$passwordd=$fname=$lname=$sex=$pwd=NULL;
$safe=array_map('trim',$_POST);
if(!empty($safe['passwordd'])){
$passwordd=mysqli_real_escape_string($dbc,$safe['passwordd']);}
$act=mysqli_real_escape_string($dbc,$safe['act']);

if(!empty($safe['lname']))
    {
     $lname=mysqli_real_escape_string($dbc,$safe['lname']);
    } 
    else $lname='';

if(!empty($safe['fname']))
    {
     $temp=mysqli_real_escape_string($dbc,$safe['fname']);
     $pattern="/^[A-Za-z]{3,}$/";
     if(preg_match($pattern,$temp)){
      $fname=$temp;
     
     }
     else echo"<p class='error'><b>Invalid Name!!</b></p>";
     
     
    }    
    	
  	else echo"<p class='error'><b>You Forgot to Enter your Name!!</b></p>";


if(!empty($safe['contact'])){
    $temp=mysqli_real_escape_string($dbc,$safe['contact']);
    $pattern="/^[^0][\d]{9}$/"; 
    if(preg_match($pattern,$temp)){
    
    $contact=$temp;
    }
    
    else echo"<p class='error'><b>Invalid Contact Number!!</b></p>";
   }
   
   else echo"<p class='error'><b>You Forgot to Enter your Contact Number!!</b></p>";



if(!empty($safe['password'])){
    $temp=mysqli_real_escape_string($dbc,$safe['password']);
    $pattern="/^[\w$#@&]{8,}$/";
    if(preg_match($pattern,$temp)){
    
    $password=$temp;
    }
    
    else echo"<p class='error'><b>Invalid Password!!</b></p>";
   }
   
   else echo"<p class='error'><b>You Forgot to Enter the Password!!</b></p>";
   
   
 
  
   
   if(!empty($safe['sex'])){
    $temp=mysqli_real_escape_string($dbc,$safe['sex']);
      if($temp=='f' || $temp=='m')
       {
       $sex=$temp;
      
      }
    
    
    
   }
   
    if(!empty($safe['dept'])){
    $temp=mysqli_real_escape_string($dbc,$safe['dept']);
      if($temp=='ECE' || $temp=='ME' || $temp=='BT' || $temp=='IT' || $temp=='CS' || $temp=='EN')
       {
       $dept=$temp;
      
      }
    
    
    
   }
   
   else echo"<p class='error'><b>You Forgot to choose your Gender!!</b></p>"; 
   
   if($passwordd==$password){
   $pwd=$password;
   }
   else echo"<p class='error'><b>Passwords do not match!!</b></p>"; 
   
 if($pwd && $fname && $contact && $sex && $dept)
 { 
 
 mysqli_query($dbc,"insert into `fac` (facid,passwd) values ((select facid from `faculty` where activation='$act'),SHA1($pwd))");
 $quer="update faculty set fname='$fname',lname='$lname',gender='$sex',cellno='$contact',dept='$dept',college='IMSEC',course='Btech',joindate=Now(),activation='1' where activation='$act'";
 $r=mysqli_query($dbc,$quer);
 if($r){
 echo "You've registered Successfully , you can now <a href='http://project.dlzip.in/login'>login<a>";}
 else "OOPS! Something Went Wrong ,We're Fixing it. Please Try Again!";
 
 
 
 
 }  
 else echo"<p class='error'><b>Please Fill the form properly!!</b></p></div>"; 
}

}


else {
 $url='http://project.dlzip.in';
 HEADER("Location:$url");
	 exit;


}

?>