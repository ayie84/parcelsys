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