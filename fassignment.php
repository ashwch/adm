<link rel="stylesheet" type="text/css" href="files/css/style.css" />
<style type="text/css">
textarea 
{
	width: 300px; 
	height: 170px; 
	padding: 12px 20px 0px 20px; 
	margin: 0 0 20px 0;
	background:#e0e0e0 ;
	border-radius: 5px; 
	-moz-border-radius: 5px; 
	-webkit-border-radius: 5px;
	-moz-box-shadow: 0px 1px 0px #f2f2f2;
	-webkit-box-shadow: 0px 1px 0px #f2f2f2;
	font-family: georgia; 
	font-size: 18px; 
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
<h1>ASSIGNMENT</h1>
<div class="formLayout">
<script type='text/javascript' src='http://project.dlzip.in/files/js/fetch.js'>

</script>
<form enctype='multipart/form-data' method='post' action='upload.php'>
<textarea id="" placeholder="Write Something about this assignment" name="textar"></textarea>
<div style="float:right; margin-right:50px;">
<input type='file' name='upload'></input><br />
Assignment Number:<br/><input type='text' name='anos'></input><br />
<select class="" name="branch" id="branch">
<option value="0">Select Branch</option>
<option value="BT">BT</option>
<option value="CS">CS</option>
<option value="IT">IT</option>
<option value="EC">EC</option>
<option value="EN">EN</option>
<option value="ME">ME</option>
</select><br/>
<select class="" name="semester" id="semester">
<option value="0">Select Semester</option>
<option value="2">Second</option>
<option value="4">Fourth</option>
<option value="6">Sixth</option>
<option value="8">Eight</option>
</select><br />
<a href='#' id='fet'>Fetch Subjects</a><br />
<select class="" name="sub" id="sub">

</select><br /><br /><br /><br />
<input type='hidden' name='xonix' value='1'></input>
<input type="submit" value="upload" class="cow" id="sign" style="width:130px; margin-right:px;"/>
</form>
</div>
</div>