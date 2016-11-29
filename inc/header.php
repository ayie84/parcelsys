<!DOCTYPE html>
<html lang="en">
<head>
  <?php pageTitle(); ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="public/css/bootstrap.min.css">
  <link rel="stylesheet" href="public/css/style.min.css">
  
  
  <script src="public/js/jquery.min.js"></script>
  <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/jquery-1.8.3.js"></script>
	
	 <link rel="stylesheet" href="public/css/bootstrap-datepicker3.min.css">
    <script type='text/javascript' src="public/js/bootstrap-datepicker.min.js"></script>
<script type='text/javascript'>
$(function(){
$('.input-group.date').datepicker({
	
    calendarWeeks: true,
    todayHighlight: true,
    autoclose: true,
	dateFormat: "yyyy-mm-dd"
});  
});

</script>
</head>
<body>

<?php 
if($navbar=='0')
{
	//no Nav bar
}else{
	navbar();
}
 
?>
  
<div class="container spacer">