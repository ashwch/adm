<?php

session_start();
ob_start();
if(!isset($_SESSION['email']) ) 
	{
	    function curPageURL() {
 $pageURL = 'http';
  
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}
	
	 $curr_page= curPageURL();
	 $curr_page=htmlentities($curr_page);
	 	$url ='http://project.dlzip.in/login.php?redirect='.$curr_page;
	header("Location: $url");
	exit();
}
else{


function curPageURL() {
 $pageURL = 'http';
  
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}


$curr_page= curPageURL();
switch($curr_page){
case 'http://project.dlzip.in/index.php':
   


}



include('files/sqlconn.php');
$ckid=$_SESSION['id'];
if ($_SESSION['iden']=='f'){
$ck="update faculty set dt=Now(),live='1' where facid='$ckid'";
mysqli_query($dbc,$ck);

}
else if($_SESSION['iden']=='s'){
$ck="update student set dt=Now(),live='1' where studid='$ckid'";
mysqli_query($dbc,$ck);

}





?>
<html>
<head>
<noscript>

  <meta http-equiv="refresh" content="0;url=http://project.dlzip.in/noscript">


</noscript>

<meta name="description" content="In an attempt to ease students' burden of finding, searching and downloading notes, assignments, notices & books; we undertook our mini web based project to be a Web Application that provides a one stop solution for students." >
  <meta name="keywords" content="Advance document Management, Imsec, IMS,document management,imsec.ac.in, ims ghaziabad" >
 <link REL="SHORTCUT ICON" Href='http://project.dlzip.in/files/images/docs.png'>

 <link href='files/css/jquery.custom.css' rel='stylesheet' type='text/css'>
<title><?php if(isset($title))echo $title; ?></title>
 <link rel="stylesheet" href="files/css/style.css" type="text/css" media="all"></script>
 <script type='text/javascript' src='http://project.dlzip.in/files/js/jquery.js'></script>
  <script type='text/javascript' src='http://project.dlzip.in/files/js/jquery-ui.js'></script>

   
    <script type='text/javascript' src='http://project.dlzip.in/files/js/index.js'></script>
</head>
<body>
<center>
<ul id="menu">
	<a href="http://project.dlzip.in" id='hom' ><li <?php if($curr_page=='http://project.dlzip.in/home.php' || $curr_page=='http://project.dlzip.in/home' ){echo "class='selected'";} ?> >HOME</li></a>
	
	<a href="assignment" id='ass'><li <?php if($curr_page=='http://project.dlzip.in/assignment.php' || $curr_page=='http://project.dlzip.in/assignment')echo"class='selected'";?> >ASSIGNMENT</li></a>
	<a href="about" id=''><li <?php if($curr_page=='http://project.dlzip.in/about.php' || $curr_page=='http://project.dlzip.in/about')echo"class='selected'";?>   >ABOUT</li></a>
	<a href="notice" id=''><li <?php if($curr_page=='http://project.dlzip.in/notice.php' || $curr_page=='http://project.dlzip.in/notice')echo"class='selected'";?>  >NOTICE</li></a>
	<a href="feedback" id=''><li <?php if($curr_page=='http://project.dlzip.in/feedback.php' || $curr_page=='http://project.dlzip.in/feedback')echo"class='selected'";?>  >FEEDBACK</li></a>
	<a href="profilec" id='user'><li <?php if($curr_page=='http://project.dlzip.in/profilec.php' || $curr_page=='http://project.dlzip.in/profilec')echo"class='selected'";?> ><?php echo $_SESSION['fname']?></li></a>
	<a href="logout"><li style='float:right;padding-top:7px;'><img  height='25px'  src='http://cdn3.iconfinder.com/data/icons/minimal/64x64/apps/gnome-logout.png'/></li></a>
</ul>
</center>

<div class="sleft">
<?php

echo "<br /><h3>Students OnLine</h3>";
$quer="select studid from student WHERE dt<SUBTIME(NOW(),'0 0:1:0')";
$quer_r=mysqli_query($dbc,$quer);
while($row=mysqli_fetch_array($quer_r)){
 mysqli_query($dbc,"update student set live='0' where studid='$row[0]'");

}

$quer="select facid from faculty WHERE dt<SUBTIME(NOW(),'0 0:1:0')";
$quer_r=mysqli_query($dbc,$quer);
while($row=mysqli_fetch_array($quer_r)){
 mysqli_query($dbc,"update faculty set live='0' where facid='$row[0]'");

}

$liv_que="SELECT fname,lname,branch,year,email as live FROM student where live='1'";
$res_que=mysqli_query($dbc,$liv_que) OR trigger_error('show live people:'.mysqli_error($dbc));   

while($row=mysqli_fetch_array($res_que))
	{$yr=0;
	 switch($row[3]){
	  case '1':$yr="1st Year";
	            break;
	  case '2':$yr="2nd Year";
	           break;
	  case '3':$yr="3rd Year";
	           break;  
	  case '4':$yr="4th Year";
	           break;                          
	 
	 }
	 
	echo "<br /><br /><div class='hpop'><p><img src='http://project.dlzip.in/files/images/flash.gif'> ".$row[0]." ".$row[1]."</p><span>
        ".$row[2]."<br/>".$yr."<br />".$row[4]."<br /></span></div>";
	}
echo "<br /><br /><br /><h3>Faculties OnLine</h3>";	
$liv_que="SELECT fname,lname,dept,email as live FROM faculty where live='1'";
$res_que=mysqli_query($dbc,$liv_que) OR trigger_error('show live people:'.mysqli_error($dbc));   

while($row=mysqli_fetch_array($res_que))
	{
	 
	echo "<br /><br /><div class='hpop'><p><img src='http://project.dlzip.in/files/images/flash.gif'> ".$row[0]." ".$row[1]."</p><span>
        ".$row[2]."<br />".$row[3]."<br /></span></div>";
	}	
	
	

?>

</div>


<center>
<div id='load_here' class="smiddle">


<?php
}
?>