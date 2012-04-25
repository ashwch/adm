<div class='formLayout'><br />
<?php
echo "
<script type='text/javascript' src='http://project.dlzip.in/files/js/cpass.js'></script>
";
if($_SESSION['iden']=='s'){
$email=$_SESSION['email'];
$que_pro="Select rollno,cellno,course from student where email='$email'";
$res_pro=mysqli_query($dbc,$que_pro) OR trigger_error("profile page:".mysqli_error($dbc));
if(mysqli_num_rows($res_pro)==1){
 $row=mysqli_fetch_array($res_pro);
$iden=$_SESSION['id'];
echo"
<h1>INFORMATION</h1><br />
<p><label>Name:</label>".$_SESSION['fname']."</p><br/>

<p><label>Course:</label>".$row[2]."</p><br/>

<p><label>Roll Number:</label>".$row[0]."</p><br/>

<p><label>Branch:</label>".$_SESSION['bra']."</p><br/>

<p><label>Year:</label>".$_SESSION['year']."</p><br/>

<p><label>Email ID:</label>".$_SESSION['email']."</p><br/>


<p><label>Contact Number:</label>".$row[1]."</p><br/>
<p><label>Old Password:</label>
<input class='cpass_ajax' type='password' addon='oldpassword' zinx='".$_SESSION['iden']."' iden='".$iden."' name='oldpassword' >&nbsp;&nbsp;&nbsp;&nbsp;<span id='oldpassword_notify'></span></p><br/>
<p><label>New Password:</label>
<input class='cpass_ajax' type='password' readonly='readonly'  zinx='".$_SESSION['iden']."' addon='newpassword' iden='".$iden."' name='newpassword' >&nbsp;&nbsp;&nbsp;&nbsp;<span id='newpassword_notify'></span></p><br/>
<p><label>Re-enter Password:</label>
<input class='cpass_ajax' type='password' readonly='readonly'  zinx='".$_SESSION['iden']."'  addon='newpasswordd' iden='".$iden."' name='newpasswordd' >&nbsp;&nbsp;&nbsp;&nbsp;<span id='newpasswordd_notify'></span></p><br/>
<br />
<br /><br />
<br />
<input id='c_p' class='sign' type='button' value='Change Password'></input>
<br/>
<p id='p_c_n'></p>
";
}
else echo"<p class='error'><b>Something Went Wrong!!</b></p>";
}

else if($_SESSION['iden']=='f'){

$email=$_SESSION['email'];
$que_pro="Select course,cellno from faculty where email='$email'";
$res_pro=mysqli_query($dbc,$que_pro) OR trigger_error("profile page:".mysqli_error($dbc));
if(mysqli_num_rows($res_pro)==1){
 $row=mysqli_fetch_array($res_pro);
$iden=$_SESSION['id'];
echo"
<h1>INFORMATION</h1><br />
<p><label>Name:</label>".$_SESSION['fname']."</p><br/>

<p><label>Course:</label>".$row[0]."</p><br/>

<p><label>Cell Number:</label>".$row[1]."</p><br/>

<p><label>Branch:</label>".$_SESSION['dep']."</p><br/>

<p><label>Email ID:</label>".$_SESSION['email']."</p><br/>

<p><label>Contact Number:</label>".$row[1]."</p><br/>
<p><label>Old Password:</label>
<input class='cpass_ajax' type='password' addon='oldpassword'  zinx='".$_SESSION['iden']."' iden='".$iden."' name='oldpassword' >&nbsp;&nbsp;&nbsp;&nbsp;<span id='oldpassword_notify'></span></p><br/>
<p><label>New Password:</label>
<input class='cpass_ajax' type='password' readonly='readonly' zinx='".$_SESSION['iden']."'  addon='newpassword' iden='".$iden."' name='newpassword' >&nbsp;&nbsp;&nbsp;&nbsp;<span id='newpassword_notify'></span></p><br/>
<p><label>Re-enter Password:</label>
<input class='cpass_ajax' type='password' readonly='readonly'  zinx='".$_SESSION['iden']."'  addon='newpasswordd' iden='".$iden."' name='newpasswordd' >&nbsp;&nbsp;&nbsp;&nbsp;<span id='newpasswordd_notify'></span></p><br/>
<br />
<br /><br />
<br />
<input id='c_p' class='sign' type='button' value='Change Password'></input>
<br/>
<p id='p_c_n'></p>
";
}
else echo"<p class='error'><b>Something Went Wrong!!</b></p>";





}

?>


</div>



