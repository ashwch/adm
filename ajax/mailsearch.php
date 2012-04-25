<?php

include('../files/sqlconn.php');
if(isset($_REQUEST['search_term']) && $_REQUEST['search_term'] && isset($_REQUEST['addon']) && $_REQUEST['addon']){


$key=mysqli_real_escape_string($dbc,$_REQUEST['search_term']);
$db=mysqli_real_escape_string($dbc,$_REQUEST['addon']);

if ($db==='email'){

 $pattern="/^[a-zA-Z0-9]+[_.-]?[a-zA-Z0-9]+[_.-]?[a-zA-Z0-9]+[_.-]?[^!@#~$%^&*()_+.\s][@]{1}(([a-zA-Z0-9]{1,}[.]{1}[a-zA-Z0-9]{1,})|([a-zA-Z0-9]{1,}[.]{1}[a-zA-Z0-9]{1,}[.]{1}[a-zA-Z0-9]{1,}))$/";
 if(preg_match($pattern,trim($key)))
		 {
		   
		   $q="select email from student where email='$key'";
		   
                    $r=mysqli_query($dbc,$q);
                    $row_cnt = mysqli_num_rows($r);
                    		
                    if($row_cnt>0){
                     echo "invalid";
                    }
                    else echo "valid";
                    
		 
		 
		 }
		 	else echo 'invalid';
}

else if ($db==='password'){
$pattern="/^[\w$#@&]{8,}$/";
if(preg_match($pattern,trim($key)))
 {echo 'valid';}		 	
		 	else echo 'invalid';



}

else if($db==='contact'){
$pattern="/^[^0][\d]{9}$/"; 
   if(preg_match($pattern,trim($key)))
       {
         $q="select cellno from student where cellno='$key'";
		   
                    $r=mysqli_query($dbc,$q);
                    $row_cnt = mysqli_num_rows($r);
                    		
                    if($row_cnt>0){
                     echo "invalid";
                    }
                    else echo "valid";
       
       
       }		 	
		 	else echo 'invalid';
   
 }
 
 else if($db==='roll'){
$pattern="/^[\d]{2}[1][4][3][\d]{5}$/"; 
   if(preg_match($pattern,trim($key)))
       {
        $branch=false;
        $val=array('10','13','21','40','54','31');
        $bra=$key[5].$key[6];
        $saal=array('08','09','10','11');
        
        $yr=false;
        $xx=$key[0].$key[1];
        foreach ($val as $x){
         if($x===$bra)
          $branch=true;
          
          }
         
         foreach ($saal as $y){
         if($y===$xx)
          $yr=true;
          
          }
            
            
             
          
          
        
        if ($branch && $yr){
         $q="select rollno from student where rollno='$key'";
		   
                    $r=mysqli_query($dbc,$q);
                    $row_cnt = mysqli_num_rows($r);
                    		
                    if($row_cnt>0){
                     echo "invalid";
                    }
                    else {
                    echo "valid";
                    
                    }

       }
       else echo 'invalid';
       
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


if(!empty($safe['roll'])){
    $temp=mysqli_real_escape_string($dbc,$safe['roll']);
    
    $pattern="/^[\d]{2}[1][4][3][\d]{5}$/";  
    if(preg_match($pattern,$temp)){
    $branch=false;
    
    $val=array('10','13','21','40','54','31');
        $bra=$temp[5].$temp[6];
        $saal=array('08','09','10','11');
        
        $yr=false;
        $xx=$temp[0].$temp[1];
        
        foreach ($val as $x){
         if($x===$bra)
          $branch=true; 
    }
    
    foreach ($saal as $y){
         if($y===$xx)
          $yr=true;
          
          }
    
    
    if($branch && $yr){
    $roll=$temp;
    }
    else echo"<p class='error'><b>Invalid Roll Number!!</b></p>";
    }
    
    else echo"<p class='error'><b>Invalid Roll Number!!</b></p>";
   }
   
   else echo"<p class='error'><b>You Forgot to Enter your Roll Number!!</b></p>";


if(!empty($safe['password'])){
    $temp=mysqli_real_escape_string($dbc,$safe['password']);
    $pattern="/^[\w$#@&]{8,}$/";
    if(preg_match($pattern,$temp)){
    
    $password=$temp;
    }
    
    else echo"<p class='error'><b>Invalid Password!!</b></p>";
   }
   
   else echo"<p class='error'><b>You Forgot to Enter the Password!!</b></p>";
   
   
 
if(!empty($safe['email'])){
    $temp=mysqli_real_escape_string($dbc,$safe['email']);
    $pattern="/^[a-zA-Z0-9]+[_.-]?[a-zA-Z0-9]+[_.-]?[a-zA-Z0-9]+[_.-]?[^!@#~$%^&*()_+.\s][@]{1}(([a-zA-Z0-9]{1,}[.]{1}[a-zA-Z0-9]{1,})|([a-zA-Z0-9]{1,}[.]{1}[a-zA-Z0-9]{1,}[.]{1}[a-zA-Z0-9]{1,}))$/";
    if(preg_match($pattern,$temp)){
    
    $email=$temp;
    }
    
    else echo"<p class='error'><b>Invalid Email id!!</b></p>";
   }
   
   else echo"<p class='error'><b>You Forgot to Your Email address!!</b></p>"; 
   
   
   if(!empty($safe['sex'])){
    $temp=mysqli_real_escape_string($dbc,$safe['sex']);
      if($temp=='f' || $temp=='m')
       {
       $sex=$temp;
      
      }
    
    
    
   }
   
   else echo"<p class='error'><b>You Forgot to choose your Gender!!</b></p>"; 
   
   if($passwordd==$password){
   $pwd=$password;
   }
   else echo"<p class='error'><b>Passwords do not match!!</b></p>"; 
   
 if($email && $pwd && $fname && $roll && $contact && $sex)
 {
 
   $year_temp=$roll[0].$roll[1];
   switch($year_temp){
   
    case '08':$year='4';
              break;
    case '09':$year='3';
              break;
    case '10':$year='2'; 
              break;
    case '11':$year='1';
             break;            
                     
   }
   
  switch($bra){
  
   case '10':$bran='CS';
              break;
   case '13':$bran='IT';
              break;
   case '21':$bran='EN'; 
              break;
   case '31':$bran='EC';
             break;    
   case '40':$bran='ME';
             break;          
   case '54':$bran='BT';
             break;          
  
   }
   
     $q="Select email from student where email='$email'";
     $r=mysqli_query($dbc,$q);
     $mail_cnt = mysqli_num_rows($r);
     
     $q1="Select rollno from student where rollno='$roll'";
     $r1=mysqli_query($dbc,$q1);
     $roll_cnt = mysqli_num_rows($r1);
     if($mail_cnt>0 || $roll_cnt>0){
      echo"<p class='error'><b>roll number or email is already present!!</b></p>";     
     
     }
     else{
     $fname=ucfirst($fname);
     if(isset($lname))
     {$lname=ucfirst($lname);}
     $k=md5(uniqid(rand(),true));
     $query="insert into student(fname,lname,rollno,email,gender,college,course,branch,year,cellno,activation) 
           values ('$fname', '$lname','$roll','$email','$sex','IMSEC','BTECH','$bran','$year','$contact','$k')";
     $res=mysqli_query($dbc,$query)OR trigger_error('signuppage insertion:'.mysqli_error($dbc));     
     
     if(mysqli_affected_rows($dbc)==1){
       $q_pass="select studid from student where rollno='$roll' and email='$email'";
       $r_pass=mysqli_query($dbc,$q_pass)OR trigger_error('signuppage fetch id:'.mysqli_error($dbc)); 
       $row=mysqli_fetch_array($r_pass);
       $id=$row[0];
       $q_ins="insert into stud (studid,passwd) VALUES ('$id',SHA1('$pwd'))";
       $r_ins=mysqli_query($dbc,$q_ins) OR trigger_error('signuppage pwd insertion:'.mysqli_error($dbc));  
       if(mysqli_affected_rows($dbc)==1){
       
       
         
			    	echo "Thank you <b>$fname</b> for registering on our website<br />
			    	A mail is Sent to $email please click on the Activation code to activate your account.<br />
			    	Due to sessionals next we are not able to work on the site. We'll continue the work on the website as soon as sessionals are over. 
			    	"; 
			    	$body=" Email: $email Roll no :$roll activation code:http://project.dlzip.in/activation.php?mail=".$email."&activid=".$k;
			    	
			    	$body=wordwrap($body,70);
	     	        mail("$email","Hello $fname" ,$body,"From:do-not-reply@project.dlzip.in"); 
        
       
       }
       else echo"<p class='error'><b>Something went Wrong!!!</b></p>";       
     
     }
     else echo"<p class='error'><b>Something went Wrong!!!</b></p>";    
     
     
     
     
     }
 
     
 
   echo "</div></center>"; 
 
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