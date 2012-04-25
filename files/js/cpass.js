window.onload=function(){


$(document).ready(function(){

var newpwd=document.getElementsByName('newpassword')[0];
var newpwdd=document.getElementsByName('newpasswordd')[0];



$('.cpass_ajax').keyup(function(){


 var m=$(this).val();
 var o=$(this).attr('addon');
 var name=$(this).attr('name');
 var zinx=$(this).attr('zinx');
 var elem=o+'_notify';
 var iden=$(this).attr('iden');
 cat=document.getElementById(elem);
 if(m!==''){
 cat.innerHTML="<img src='http://project.dlzip.in/files/images/snake.gif'>";}
 if(name!=='newpasswordd'){
 $.post('http://project.dlzip.in/ajax/cpass.php',{search_term:m,addon:o,iden:iden,zinx:zinx},function(data){
  if(data==='valid'){
    
  
  
  
  
  cat.innerHTML="<img src='http://project.dlzip.in/files/images/accepted.png'>";
  
  if(name=='oldpassword'){
  var dog= document.getElementsByName(name)[0];
  dog.setAttribute('readonly','readonly');
  var bitch=document.getElementsByName('newpassword')[0];
  bitch.removeAttribute('readonly');

  }
  else if(name=='newpassword'){
  var bitch=document.getElementsByName('newpasswordd')[0];
  bitch.removeAttribute('readonly');
  
  if(bitch.value!==''){
  
   var newpwd=document.getElementsByName('newpassword')[0];
 mickey=newpwd.value;
var newpwdd=document.getElementsByName('newpasswordd')[0];
 mouse=newpwdd.value;
 var spa=document.getElementById('newpasswordd_notify');
 if(mickey===mouse){
  
  spa.innerHTML="<img src='http://project.dlzip.in/files/images/accepted.png'>";
  $('#c_p').removeAttr('disabled');
  
 
 }
 else {spa.innerHTML="<img src='http://project.dlzip.in/files/images/rejected.png'>";
    $('#c_p').attr('disabled','disabled');}
   
  }
    
  
  
  }
  
  }
  else if(data==='invalid'){
  
  if(name=='newpassword'){
     var bitch=document.getElementsByName('newpasswordd')[0];
     bitch.value='';
     bitch.setAttribute('readonly','readonly');
     document.getElementById('newpasswordd_notify').innerHTML='';
  
   }
  cat.innerHTML="<img src='http://project.dlzip.in/files/images/rejected.png'>"
  $('#c_p').attr('disabled','disabled');
 
  }
  
 
 });
 
 }
 else if(name==='newpasswordd'){
 
var newpwd=document.getElementsByName('newpassword')[0];
 mickey=newpwd.value;
var newpwdd=document.getElementsByName('newpasswordd')[0];
 mouse=newpwdd.value;
 var spa=document.getElementById('newpasswordd_notify');
 if(mickey===mouse){
  
  spa.innerHTML="<img src='http://project.dlzip.in/files/images/accepted.png'>";
 $('#c_p').removeAttr('disabled');
  
 }
 else {spa.innerHTML="<img src='http://project.dlzip.in/files/images/rejected.png'>";
 $('#c_p').attr('disabled','disabled');

 }
 
 
 }

}

);

$('#c_p').attr('disabled','disabled');
$('#c_p').click(function(){
var newpwd=document.getElementsByName('newpassword')[0];
var newpwdd=document.getElementsByName('newpasswordd')[0];
var oldpwd=document.getElementsByName('oldpassword')[0];
if(newpwd.value !=='' && newpwdd.value!=='' && oldpwd.value!==''){
  
  var old=oldpwd.value;
  var ne=newpwd.value;
  var neww=newpwdd.value;
  var iden_t=document.getElementsByName('oldpassword')[0];
      iden=iden_t.getAttribute('iden'); 
      var zinx=iden_t.getAttribute('zinx');
   //alert('hooray');
   $('#p_c_n').html("<img src='http://project.dlzip.in/files/images/snake.gif'>");
   $.post('http://project.dlzip.in/ajax/cpass.php',{iden:iden,old:old,ne:ne,neww:neww,zinx:zinx},function(data){
    if(data==='valid'){
    
     $('#p_c_n').html('Password Changed Successfully');
    }
    
    else{
    $('#p_c_n').html('Something Went Wrong!!');
    alert(':(')
    }
   
   }
   
   
   );
   

}
else{
alert('please fill the form Properly!!');
}

});




});







}