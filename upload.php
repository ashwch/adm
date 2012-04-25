<?php include('files/sqlconn.php');
session_start();
$id=$_SESSION['id'];
if(!empty($_POST['xonix']) ){
$trimmed=array_map('trim',$_POST);
$trimmed['branch']=mysqli_real_escape_string($dbc,$trimmed['branch']);
$trimmed['textar']=mysqli_real_escape_string($dbc,$trimmed['textar']);
$trimmed['semester']=mysqli_real_escape_string($dbc,$trimmed['semester']);

$trimmed['anos']=mysqli_real_escape_string($dbc,$trimmed['anos']);
$trimmed['sub']=mysqli_real_escape_string($dbc,$trimmed['sub']);
//echo "branch ".$trimmed['branch']."<br />";
//echo $trimmed['textar']."<br />";
//echo $trimmed['semester']."<br />";
//echo $trimmed['sub']."<br />";
//echo $trimmed['anos']."<br />";

$branch=$trimmed['branch'];
$textar=$trimmed['textar'];
$semester=$trimmed['semester'];
$sub=$trimmed['sub'];
$anos=$trimmed['anos'];
if($_FILES['upload']['error']==0 && $branch && $textar && $semester && $sub && $anos)
	{$upload_path="downloads/";
	$file_path="$upload_path".$_FILES['upload']['name'];
        $split=preg_split('/(downloads\/)/', $file_path);
	//echo $file_path;
	$upload_success=move_uploaded_file($_FILES['upload']['tmp_name'],"$file_path");		
         if($upload_success)
           {
         	 echo "<script type='text/javascript'>alert('upload done')</script>";
         	
	       
           }
           
  $anos=(int)$anos;
 $semester=(int)$semester;
 
 
 //echo "sem".$semester;
 switch($semester)
{
case 2:$year=1;
break;
case 4:$year=2;
break;
case 6:$year=3;
break;
case 8:$year=4;
break;
}
  switch($branch)
{
       case 'IT':$q="insert into it(scode,year,semester,anos,dos,memloc,facid,session,about)values('$sub','$year','$semester','$anos',Now(),'$file_path','$id','2011-2012','$textar')";
       break;
       case 'CS':$q="insert into cs(scode,year,semester,anos,dos,memloc,facid,session,about)values('$sub','$year','$semester','$anos',Now(),'$file_path','$id','2011-2012','$textar')";
       break;
       case 'EC':$q="insert into ec(scode,year,semester,anos,dos,memloc,facid,session,about)values('$sub','$year','$semester','$anos',Now(),'$file_path','$id','2011-2012','$textar')";
       break;
       case 'EN':$q="insert into en(scode,year,semester,anos,dos,memloc,facid,session,about)values('$sub','$year','$semester','$anos',Now(),'$file_path','$id','2011-2012','$textar')";
       break;
       case 'BT':$q="insert into bt(scode,year,semester,anos,dos,memloc,facid,session,about)values('$sub','$year','$semester','$anos',Now(),'$file_path','$id','2011-2012','$textar')";
       break;
       case 'ME':$q="insert into me(scode,year,semester,anos,dos,memloc,facid,session,about)values('$sub','$year','$semester','$anos',Now(),'$file_path','$id','2011-2012','$textar')";
       break;
}  
 




           
           
           
           
          
    $r=mysqli_query($dbc,$q) OR trigger_error(mysqli_error($dbc));
    if(mysqli_affected_rows($dbc)==1)
    {
    	echo "<script type='javascript'>alert('upload is successful')</script>";
    	echo "click <a href='http://project.dlzip.in/assignment' >here</a> to go back";
    } 
           
           
	}
	
	else {
	echo "Please Fill the Form properly";
	 switch($_FILES['upload']['error']){
	     	
	     	case 1: echo"<script type='text/javascript'>
		     	         
	     	             alert('the file size exceeds the upload_max_size
		     	             setting of php.ini');</script>";
		     	   break;          
		    case 2: echo"<script type='text/javascript'>
	     	             alert('file size error');</script>";
		     	   break; 	   
		    case 3: echo"<script type='text/javascript'>
	     	             alert('the file wasonly partially uploaded');</script>";
		     	   break; 	    	   
		    case 4: 
		            echo"<script type='text/javascript'>
	                     alert('! No file Selected. ');
	     	             </script>";
		     	   break; 	    	    	   
		    case 6: echo"<script type='text/javascript'>
	     	             alert('no temporary folder available');</script>";
		     	   break; 	    	    	   
		    case 7: echo"<script type='text/javascript'>
	     	             alert('unable to write to the disk');</script>";
		     	   break; 	    	    	   
		    case 8: echo"<script type='text/javascript'>
	     	             alert('file upload stopped');</script>";
		     	   break; 	    	    	   
		    default : echo"<script type='text/javascript'>
	     	             alert('something went wrong.We are fixing it');</script>";
		     	   break; 	    	    	   
	     } 
	
	
	
	
	}
	
	

}
?>