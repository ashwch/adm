<?php 
define('LIVE',false);//variable to check site's status.

function error_handler($error_num,$error_msg,$error_file,$error_line,$error_vars)
	 {
	   if(LIVE)
	   	 {
	   	 
	   	 	echo "<p class='error'> Something Went Wrong.We're Fixing it.</p>";
	   	 
         }    
	   elseif(!LIVE)
	      {	
				
				$message="error # :{$error_num} on line {$error_line} and of the file {$error_file}, and variables are {$error_vars}<br />error message :{$error_msg} ";
				echo "<b>".$message."</b><br />";
				
	    
          }
    }
set_error_handler('error_handler');


define('DB_HOST','localhost');
define('DB_PWD','fgbfdxgbfxb');
define('DB_USER','bfdbgfd');
define('DB_NAME','fhfdhbfdhb');

$dbc=@mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME) OR die('couldn\'t connect');
//qecho $dbc;
?>