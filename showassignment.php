<style type="text/css">
textarea 
{
width:70%; height:40px;
	background:#e0e0e0 ;
	border-radius: 5px; 
	-moz-border-radius: 5px; 
	-webkit-border-radius: 5px;
	-moz-box-shadow: 0px 1px 0px #f2f2f2;
	-webkit-box-shadow: 0px 1px 0px #f2f2f2;
	font-family:segoe UI light; 

	color: #000; 
	text-transform: lowercase; 
	
}
/*textarea:-webkit-input-placeholder  
{
    color:#a1b2c3  ; 
	
}
textarea:-moz-placeholder 
{
	color: #a1b2c3; 
		
}
input:focus, textarea:focus 
{
	background:;
}*/
</style>

<div class="formLayout" style="  background-color:#f3f3f3 ;">
<center>
<?php
if(isset($_SESSION['dep'])){
$bra='FE';
$id=$_SESSION['id'];
}
else {$bra=$_SESSION['bra'];}

switch ($bra){

case 'IT':$q="SELECT DISTINCT about,memloc,anos,scode,DATE_FORMAT( doh,  '%a %D %b, %I:%i %p' ),it.course,it.college,it.semester,it.year 
FROM it,student
WHERE student.year = it.year
AND it.semester = student.year *2 order by doh DESC"
;
break;
case 'CS':$q="SELECT DISTINCT about,memloc,anos,scode,DATE_FORMAT( doh,  '%a %D %b, %I:%i %p' ),cs.course,cs.college,cs.semester,cs.year
FROM cs,student
WHERE student.year = cs.year
AND cs.semester = student.year *2 order by doh DESC";
break;
case 'FE':$q="select DISTINCT about,memloc,anos,scode,DATE_FORMAT( doh,  '%a %D %b, %I:%i %p' ),course,college,semester,year
from it
where facid='$id' order by doh DESC";

break;
}


$r=mysqli_query($dbc,$q);
while($row=mysqli_fetch_array($r)){
 $qq="select sname from subject where scode='$row[3]'";
 $rr=mysqli_query($dbc,$qq);
 $rrow=mysqli_fetch_array($rr);
 $dw="http://project.dlzip.in/".$row[1];
?>
<div id="message">
<p style="text-align:center; color:black"><big><b><?php  echo $rrow[0]."(".$row[3].")"; ?></b></big></p>
<p style="text-align:center; color:black"><big><b>Assignment Number :<?php echo "$row[2]<br />".$row[0];?></big></b></p>
download <?php echo "<a target='_blank' href='".$dw."'> Here </a>";?><br/>
posted on date :<?php echo $row[4];?>:
</div> 
<?php
$qqq="select DISTINCT comment,email from comments where anos='$row[2]' and scode='$row[3]' and semester='$row[7]' and year='$row[8]' and course='$row[5]' ";
$rrr=mysqli_query($dbc,$qqq);
if(mysqli_num_rows($rrr)>0){
while($rowww=mysqli_fetch_array($rrr)){?>
<div id="message" style=" width: 270px; font-size: 11.5px;background:#eee">
<p style="text-align:left;Width:200px;color:black; margin-left:;"><?php echo "$rowww[0]"; ?></p><br>
<small><span style="font-size:9px"> - <?php echo "$rowww[1]"; ?></span></small>
</div> 
<?php
}
}
?>
<div id="message">
<form method="post">
<textarea id="text" placeholder="comment here" name='comm' style="width:70%; height:40px;"></textarea>
<input type='hidden' name='anos' value='<?php echo $row[2]; ?>'>
<input type='hidden' name='scode' value='<?php echo $row[3]; ?>'>

<input type='hidden' name='emaill' value='<?php echo $_SESSION['email']; ?>'>
<input type='hidden' name='course' value='<?php echo $row[5];?>'>
<input type='hidden' name='college' value='<?php echo $row[6]; ?>'>
<input type='hidden' name='semester' value='<?php echo $row[7];?>'>
<input type='hidden' name='year' value='<?php echo $row[8]; ?>'>
<input type='hidden' name='xonix' value='1'>
<input type='submit' value='post' id="posts">

</form>
</div> 
<?php 


?>
<?php }?>
</center>
</div>
<?php
if(isset($_POST['xonix']) && !empty($_POST['comm']) )
{
$scode=$_POST['scode'];
$anos=$_POST['anos'];
$email=$_POST['emaill'];
$course=$_POST['course'];
$college=$_POST['college'];
$sem=$_POST['semester'];
$year=$_POST['year'];

$comm=strip_tags($_POST['comm']);
$quer="insert into comments(scode,year,semester,course,college,email,comment,anos) values ('$scode','$year','$sem','$course','$college','$email','$comm','$anos')";
mysqli_query($dbc,$quer);
header("Location:http://project.dlzip.in/assignment");
}
?>