<?php
session_start();


include('files/sqlconn.php');
if(empty($_SESSION['email']))
{
		$page_title="Account Activation";
		echo"<!DOCTYPE html>
		<html><head><title>".$page_title."</title><link rel='stylesheet' href='http://project.dlzip.in/files/css/style.css' ></head>
		<body bgcolor='black'><center><div class='message'>
		
		";
		
			
		if(!empty($_GET['activid']) && !empty($_GET['mail']))
		
		{   
			$splitmail=preg_split('/(user\/)/', $_GET['mail']);			
			//echo $splituser[0];
			//echo "<br />";
			$split=preg_split('/(avtivid\/)/', $_GET['activid']);
 			//echo $split[0];
 			echo "<br />";
 			$q="SELECT studid,email,activation
			FROM student
			WHERE activation='$split[0]'
			AND email='$splitmail[0]'";
  	    $r=mysqli_query($dbc,$q) OR trigger_error("Query 1:".mysqli_error($dbc));
  	    
  	    if(mysqli_affected_rows($dbc)==1)
  	    {
  	    $q1="update student set activation='1' where email='$splitmail[0]' AND activation='$split[0]'";
        $r1=mysqli_query($dbc,$q1);
  	    echo "Hooray!! Your account has been activated Succesfully, You can now <a href='login.php'>LOGIN</a></div></center>";	
  	    }
  	    else
  	    echo "<p class='error'>Incorrect Activation id or user !!</p></div></center>";	
		}
		
		else{
					$url='http://project.dlzip.in';
				header("Location:$url");
					            exit;
            }
}
else{
	$url='http://project.dlzip.in';
header("Location:$url");
	            exit;
            }
?>

