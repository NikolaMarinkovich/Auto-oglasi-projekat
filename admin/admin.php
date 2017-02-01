<?php 
$ACCESS_LEVEL = 2;
require_once "../lib/init.php"; ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
</head>
<body>
<?php include 'modules/user.php' ?>
	<div class="container">
		<h1>Admin</h1>
		<a href="oglasi_list.php" class="btn btn-primary">Lista oglasa</a> <br /><br />
		<a href="oglasi_insert.php" class="btn btn-primary">Unos novog oglasa</a> <br /><br />
		<a href="modeli_insert.php" class="btn btn-primary">Unos novog modela</a><br /> <br /><br />
		<a href="modeli_list.php" class="btn btn-primary">Lista modela</a><br /> <br /><br />
	</div>
</body>
</html>