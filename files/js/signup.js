window.onload=function(){


$(document).ready(function(){

 verma=false;
kumar=false;
dhruv=false;


$('.signup_ajax').change(function(){

 var m=$(this).val();
 var o=$(this).attr('addon');
 var name=$(this).attr('name');
 var elem=o+'_notify';
 var cat=document.getElementById(elem);
 cat.innerHTML="<img src='http://project.dlzip.in/files/images/snake.gif'>"
 if(name!=='passwordd'){
 $.post('http://project.dlzip.in/ajax/mailsearch.php',{search_term:m,addon:o},function(data){
  if(data==='valid'){
  if(name==='email' || name==='contact' || name==='roll'){
  var dog= document.getElementsByName(name)[0];
  dog.setAttribute('readonly','readonly');
  }
  if(name=='email'){
   verma=true;
  }
  if(name=='contact'){
  dhruv=true;
  
  }
  
  if(name=='roll'){
   kumar=true;
  
  }

  
  
  cat.innerHTML="<img src='http://project.dlzip.in/files/images/accepted.png'>";
  
  if(name=='password'){
  var bitch=document.getElementsByName('passwordd')[0];
  bitch.removeAttribute('disabled');
     var newpwd=document.getElementsByName('password')[0];
 mickey=newpwd.value;
var newpwdd=document.getElementsByName('passwordd')[0];
 mouse=newpwdd.value;
 var spa=document.getElementById('passwordd_notify');
 if(mickey===mouse){
  
  spa.innerHTML="<img src='http://project.dlzip.in/files/images/accepted.png'>";
      
    if(verma && kumar && dhruv){
  
  $('#sign').removeAttr('disabled');
  }
 
 }
 else {spa.innerHTML="<img src='http://project.dlzip.in/files/images/rejected.png'>";
    $('#sign').attr('disabled','disabled');}
  
  
  
  }
  
  }
  
  
  else if(data==='invalid')
   {
     if(name=='password'){
     var bitch=document.getElementsByName('passwordd')[0];
     bitch.value='';
     bitch.setAttribute('disabled','disabled');
    document.getElementById('passwordd_notify').innerHTML='';
  
   }

   
   
   cat.innerHTML="<img src='http://project.dlzip.in/files/images/rejected.png'>";
   $('#sign').attr('disabled','disabled');
  }
  
 
 });
 
 }
 
  else if(name==='passwordd'){
 
var newpwd=document.getElementsByName('password')[0];
 mickey=newpwd.value;
var newpwdd=document.getElementsByName('passwordd')[0];
 mouse=newpwdd.value;
 var spa=document.getElementById('passwordd_notify');
 if(mickey===mouse){
  
  spa.innerHTML="<img src='http://project.dlzip.in/files/images/accepted.png'>";
   if(verma && kumar && dhruv){
  $('#sign').removeAttr('disabled');
  }
 }
 else {spa.innerHTML="<img src='http://project.dlzip.in/files/images/rejected.png'>";
 $('#sign').attr('disabled','disabled');

 }
 
 
 }
 
 

});


});




}