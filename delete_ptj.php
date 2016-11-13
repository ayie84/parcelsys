<?php
include 'inc/function.php';
con2db();
$id = $_REQUEST['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="inc/css/bootstrap.min.css">
  <link rel="stylesheet" href="inc/css/style.min.css">
  <script src="inc/js/jquery.min.js"></script>
  <script src="inc/js/bootstrap.min.js"></script>
  <style>

.spacer {
    margin-top: 40px; /* define margin as you see fit */
}
</style>
  
</head>
<body>

<?php navbar(); 
del_ptj();
?>
  
<div class="container row spacer">
</div>

</body>
</html>

