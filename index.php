<?php
session_start();
if(isset($_SESSION['iden'])){
 	$url ='http://project.dlzip.in/home';
	header("Location: $url");
	exit();

}

else{
$url='http://project.dlzip.in/login';
	header("Location: $url");
	exit();

}


?>