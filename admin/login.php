<?php 
$ACCESS_LEVEL = 0;
require_once "../lib/init.php"; 
	
//ovo je deo za login
if( isset($_POST['u']) ){
	$username = $_POST['u'];
	$password = $_POST['p'];
	
	$upit = " SELECT * FROM users WHERE username='$username' AND password='$password' ";
	$rez = $db->query($upit);
	$user = $rez->fetch_object();
	if($user){
		//super, fetch-ovao je jedan red, korisnik ovakav postoji
		
		session_start();
		$_SESSION['username'] = $user->username;
		$_SESSION['access_level'] = $user->access_level;
		
		header("Location: admin.php");
	}
	else{
		//ne valja, upit nije vratio nista
		$status = 'Login nije uspeo';
	}
}

//deo za logout
if( isset($_REQUEST['akcija']) and $_REQUEST['akcija']=='logout' ){
	$_SESSION['username'] = '';
	$_SESSION['access_level'] = 0;
	$status = 'Odjavljeni ste';
}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<h1>Login</h1>
		<?php  if(isset($status)) echo $status; ?>
		<?php
			if(isset($_REQUEST['poruka'])){
				if($_REQUEST['poruka'] == 'pristup_zabranjen') echo 'Zabranjen pristup! Ulogujte se';
				
			}
		?>
		<form method="post" action="login.php">
			Username: <input type="text" name="u" /> <br />
			Password: <input type="password" name="p" /> <br />
			<button>Login</button>
		</form>
	</div>
</body>
</html>