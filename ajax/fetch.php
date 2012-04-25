<?php
include('../files/sqlconn.php');
if(isset($_REQUEST['bra']) && $_REQUEST['bra'] && isset($_REQUEST['sem']) && $_REQUEST['sem']){

$sem=mysqli_real_escape_string($dbc,$_REQUEST['sem']);
$bra=mysqli_real_escape_string($dbc,$_REQUEST['bra']);
$q="select sname,scode from subject where branch='$bra' and semester='$sem'";
$r=mysqli_query($dbc,$q);

while($row=mysqli_fetch_array($r)){

echo "<option value=".$row[1].">".$row[0]."</option>";

}
}
else echo 'o.O';
?>