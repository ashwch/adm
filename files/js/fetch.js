window.onload=function(){
$(document).ready(function(){



$('#fet').live({'click':function(){
$('#sub').html('');
sem=$('#semester').val();
bra=$('#branch').val();
sem=parseInt(sem);
if(sem!=='0' && bra!=='0'){
$.post('http://project.dlzip.in/ajax/fetch.php',{sem:sem,bra:bra},function(data){

$('#sub').append(data);



});

}





}});






});


}