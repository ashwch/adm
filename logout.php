<?php
session_start();
ob_start();

if(!isset($_SESSION['email']))
	{
		$url='http://project.dlzip.in';
		HEADER("Location:$url");
		exit();
	}
else{
       include('files/sqlconn.php');
       $mail=$_SESSION['email'];
       $q=" update student set live='0' where email='$mail'";
       $r=mysqli_query($dbc,$q);
    
	$page_title="Log Out";
    unset($_SESSION['id']);
    unset($_SESSION['email']);
    unset($_SESSION['bra']);
    unset($_SESSION['sec']);
    unset($_SESSION['fname']);
    unset($_SESSION['sec']);
    unset($_SESSION['year']);
    session_destroy();
    setcookie('Uid','',time()-3600);
        $url=$url='http://project.dlzip.in';
		ob_end_clean();
		HEADER("Location:$url");
		exit();
    
    }