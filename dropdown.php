<?php require('dbcon.php');?>
<html>
<head>
<title>
Dependent Dropdown country list
</title>
<style>
body{
	background-color:aqua;
	width:50%;
	margin:100 auto;	
}
#container{
	border:2px dotted red;
	background-color:c8ff88;
	margin:2px 0px;
	padding:40px;
	border-radius:4px;
}
.row , .rows{
	padding-bottom:25px;
}
.dropdown{
	padding:10px;
	border:2px solid;
	background-color:white;
	width:40%;
}
</style>
</head>
<body>
<div id="container">
<div class="row">
<label>Select Your Country</label>
<select name="country" class="dropdown"onchange="getcity(this.value)";>
<?php 
$query = ("Select * from countries");
$result = mysqli_query($conn,$query);
while($rows = mysqli_fetch_array($result))
{?>
<option value="<?php echo $rows['id'];?>"><?php echo $rows['name'];?></option>
<?php
}
?>
</select>
</div> 
<div class="rows">
</div>
</div>
<script src="jqueryfile.js"></script>
<script>  
function getcity(countryval)
{
	$.post("ajax_call.php",
  {
		countryvalue:countryval
  },
  function(dropdown, status){
	    $('.rows').html(dropdown);

  });	
}
  
  </script>

