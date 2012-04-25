<?php

session_start();
ob_start();
if(isset($_SESSION['email']) ) 
	{ 	$url ='http://project.dlzip.in';
	header("Location: $url");
	exit();
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="description" content="Advance document Management,In an attempt to ease students' burden of finding, searching and downloading notes, assignments, notices & books; we undertook our mini web based project to be a Web Application that provides a one stop solution for students." >
  <meta name="keywords" content="Advance document Management, Imsec, IMS,document management,imsec.ac.in, ims ghaziabad" >
<title>login</title>
<link rel="stylesheet" type="text/css" href="files/css/style.css" />
		
</head>
<body><br><br><br>
<div class="container">
	<section id="content">
		<form action="" method="POST"  accept-charset="utf-8">
			<div style="-webkit-transition: -webkit-transform 10000000s ease-out"  onclick="this.style.webkitTransform='rotate(10000000000deg)'">
                        <h1>Login Form</h1>
                        </div><br>
		<center>
	            <div style="font-family:segoe UI light;font-size:18px;color:grey">
	            
	            <input type="radio" name="radio" id='fac' value='f'> Faculty <br> 
	            <input type="radio" checked="checked" name="radio" id='stu' value='s'> Student
	        </div></center><br><br>
			<div>
				<input type="text" name='email' placeholder="Email address" required="" id="username" />
			</div><br>
			<div>
				<input type="password" name='password' placeholder="Password" required="" id="password" />
			</div>
			<div>
			        <input type='hidden' name='stevejobs' value='x'>
 				<input type="submit" value="Log in" />
				<a href="forgot">Forgot your password?</a>
				<a href="signup">Register</a>
			</div>
			<div>
			 <?php
			  include('files/sqlconn.php');
			  if(isset($_POST['stevejobs'])){
			  $safe=array_map('trim',$_POST);
			  $email=$password=$radio=NULL;
			  if(!empty($safe['email']))
				    {
				     $email=mysqli_real_escape_string($dbc,$safe['email']);
				    }    
    	
  					else echo"<p class='error'><b>You Forgot to Enter the Email Id!!</b></p>";
			  
			  if(!empty($safe['password']))
				    {
				     $password=mysqli_real_escape_string($dbc,$safe['password']);
				    }    
    	
  					else echo"<p class='error'><b>You Forgot to Enter the Password!!</b></p>";
  			
  			if(!empty($safe['radio']))
				    {
				     $radio=mysqli_real_escape_string($dbc,$safe['radio']);
				    }    
    	
  					else echo"<p class='error'><b>Please select Either Faculty or Student!!</b></p>";		
  					
  		          if($email && $password && $radio){
  		          
  		          if($radio=='s')
  		           {$q= "SELECT email,passwd,studid,activation,fname,branch,year from student INNER JOIN stud USING (studid) WHERE email='$email' AND activation='1' AND passwd=SHA1('$password')";
  		             $identity='s';
  		             $r=mysqli_query($dbc,$q) OR trigger_error("login page:".mysqli_error($dbc));
  		          if((mysqli_num_rows($r))==1){
  		          $row=mysqli_fetch_array($r);
  		          $qu="update student set live='1' where email='$email'";
  		          $ru=mysqli_query($dbc,$qu) OR trigger_error("login page live error:".mysqli_error($dbc));
  		           $_SESSION['email']=$row[0];
			   $_SESSION['id']=$row[2];
			   $_SESSION['fname']=$row[4];
			   $_SESSION['bra']=$row[5];
			   $_SESSION['year']=$row[6];
			   $_SESSION['iden']=$identity;
		           $_SESSION['sec']=md5($_SERVER['HTTP_USER_AGENT']);
                           echo 'login succesfull';
                           if(isset($_GET['redirect'])){
                            $redirect=html_entity_decode($_GET['redirect']);
                            $url=$redirect;                          
                                                       }
                                                      
                            else $url='http://project.dlzip.in';
                           ob_end_clean();
	         
	                 HEADER("Location:$url");
	                 exit;
  		          }
  		          
  		          
  		          else echo"<br /><p class='error'><b>Invalid Email Id/Password!!</b></p>";
  		           }
  		          else if ($radio=='f'){
  		            		          
  		          $q= "SELECT email,passwd,facid,activation,fname,dept from faculty INNER JOIN fac USING (facid) WHERE email='$email' AND activation='1' AND passwd=SHA1('$password')";
  		             $identity='f';
  		             $r=mysqli_query($dbc,$q) OR trigger_error("login page:".mysqli_error($dbc));
  		          if((mysqli_num_rows($r))==1){
  		          $row=mysqli_fetch_array($r);
  		          $qu="update faculty set live='1' where email='$email'";
  		          $ru=mysqli_query($dbc,$qu) OR trigger_error("login page live error:".mysqli_error($dbc));
  		           $_SESSION['email']=$row[0];
			   $_SESSION['id']=$row[2];
			   $_SESSION['fname']=$row[4];
			   $_SESSION['dep']=$row[5];
			   $_SESSION['iden']=$identity;
		           $_SESSION['sec']=md5($_SERVER['HTTP_USER_AGENT']);
                           echo 'login succesfull';
                           if(isset($_GET['redirect'])){
                            $redirect=html_entity_decode($_GET['redirect']);
                            $url=$redirect;                          
                                                       }
                                                      
                            else $url='http://project.dlzip.in';
                           ob_end_clean();
	         
	                 HEADER("Location:$url");
	                 exit;
  		          }
  		          
  		          
  		          else echo"<p class='error'><b>Invalid Email Id/Password!!</b></p>";
  		          
  		          
  		          
  		          
  		          
  		          }  
  		          ;			
  		          }
  		          else echo"<p class='error'><b>Please Fill the Form properly!!</b></p>";			
			  
			  }
			  
			 
			 ?>
			
			
			<div>
		</form>
    </section>
</div>
</body>
</html>