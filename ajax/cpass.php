<?php

include('../files/sqlconn.php');

if(isset($_REQUEST['search_term']) && $_REQUEST['search_term'] && isset($_REQUEST['addon']) && $_REQUEST['addon'] && isset($_REQUEST['iden']) && $_REQUEST['iden'] && isset($_REQUEST['addon']) && $_REQUEST['addon'] ){

$key=mysqli_real_escape_string($dbc,$_REQUEST['search_term']);
$db=mysqli_real_escape_string($dbc,$_REQUEST['addon']);
$zin=mysqli_real_escape_string($dbc,$_REQUEST['zinx']);
$iden=mysqli_real_escape_string($dbc,$_REQUEST['iden']);


if ($db==='oldpassword'){
 
 
 if($zin=='s'){
 
 $sh=SHA1($key);
 $old="Select studid from stud where passwd='$sh' AND studid='$iden'";
 $old_res=mysqli_query($dbc,$old) OR trigger_error("old pass  student verification error:".mysqli_error($dbc));
 if(mysqli_num_rows($old_res)==1){
  echo 'valid';}
 else {echo 'invalid'; }
 }
 
 else if($zin=='f'){
 
 $sh=SHA1($key);
 $old="Select facid from fac where passwd='$sh' AND facid='$iden'";
 $old_res=mysqli_query($dbc,$old) OR trigger_error("old pass verification error:".mysqli_error($dbc));
 if(mysqli_num_rows($old_res)==1){
  echo 'valid';}
 else {echo 'invalid'; }
 }
 
 
 
 }







else if ($db==='newpassword'){
$pattern="/^[\w$#@&]{8,}$/";
if(preg_match($pattern,trim($key)))
 {echo 'valid';}		 	
		 	else echo 'invalid';



}


}

else if(isset($_REQUEST['ne']) && $_REQUEST['ne'] && isset($_REQUEST['neww']) && $_REQUEST['neww']  && isset($_REQUEST['iden']) && $_REQUEST['iden'] && isset($_REQUEST['old']) && $_REQUEST['old'] ){
 
 $old=mysqli_real_escape_string($dbc,$_REQUEST['old']);
 $new=mysqli_real_escape_string($dbc,$_REQUEST['ne']);
 $neww=mysqli_real_escape_string($dbc,$_REQUEST['ne']);
 $iden=mysqli_real_escape_string($dbc,$_REQUEST['iden']);
 $zin=mysqli_real_escape_string($dbc,$_REQUEST['zinx']);

 
 $sh=SHA1($old);
 $shn=SHA1($new);
 if($zin=='s'){
 $old="Select studid from stud where passwd='$sh' AND studid='$iden'";
 }
 else if ($zin=='f'){
 $old="Select facid from fac where passwd='$sh' AND facid='$iden'";
 }
 $old_res=mysqli_query($dbc,$old) OR trigger_error(" cpass pwd and id donnot match :".mysqli_error($dbc));
 if(mysqli_num_rows($old_res)==1){
   if($zin=='s'){
   
   $q_s="update stud set passwd='$shn' where studid='$iden'";
   }
   else if($zin=='f'){
   
   $q_s="update fac set passwd='$shn' where facid='$iden'";
   }
   $r_s=mysqli_query($dbc,$q_s) OR trigger_error("unable to set new  password!!:".mysqli_error($dbc));
   if($r_s){
    echo 'valid';
    
   }
   else echo 'invalid';

    
 
 
 }
 else {echo 'invalid';}
  

}






?>