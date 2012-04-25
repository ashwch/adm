<?php

include('../files/sqlconn.php');
if(isset($_REQUEST['ding']) && $_REQUEST['ding'] && isset($_REQUEST['iden']) && $_REQUEST['iden']){
$iden=mysqli_real_escape_string($dbc,$_REQUEST['iden']);
$ding=mysqli_real_escape_string($dbc,$_REQUEST['ding']);
if ($iden=='f'){
$q="update faculty set live='0' where facid='$ding'";
}
else if ($iden=='s'){
$q="update student set live='0' where studid='$ding'";
}

$r=mysqli_query($dbc,$q) or trigger_error("live unlive set error:".mysqli_error($dbc));
if($r)
{echo 'done';}
else
 {echo 'undone';}

}

?>