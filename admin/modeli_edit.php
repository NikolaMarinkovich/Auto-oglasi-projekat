<?php
$ACCESS_LEVEL = 2; 
$TITLE='Insert modela';
	require '../lib/init.php';	
	require '../modules/head.php';
	
 if (isset($_POST['akcija'])){
	 
	 $model = $_POST['model'];
	 $marka = $_POST['marka'];
	 $id = $_POST['id'];
	 
	$upit = "UPDATE model SET model='$model', marka='$marka' WHERE id=$id" ;
	$db->query($upit);
	//echo $upit;
	header ("Location:modeli_list.php"); die();
	 
	 
	 
 }
	
	$id = $_REQUEST['id'];
	$upit = " SELECT * FROM model WHERE id=$id ";
	$rez = $db->query($upit);
	$red = $rez->fetch_object();
	
?>
<h1><a href="admin.php" >Admin</a></h1>
		<a href="oglasi_list.php" class="btn btn-primary">Lista oglasa</a> <br /><br />
		<a href="oglasi_insert.php" class="btn btn-primary">Unos novog oglasa</a> <br /><br />
		<a href="modeli_insert.php" class="btn btn-primary">Unos novog modela</a><br /> <br /><br />
		<a href="modeli_list.php" class="btn btn-primary">Lista modela</a><br /> <br /><br />
 
	
<h4>Unesite izmene</h4>	
	
<form method="post" action="#">


<br />
	<input type="hidden" name="akcija">
	<input type="hidden" name="id" value="<?= $_REQUEST['id'] ?>">
	Model:<br />
	<input type="text" name="model" value="<?=$red->model ?>"/><br />
	Marka:<br />
	<input type="text" name="marka" value="<?=$red->marka ?>"/>
	<br />
	<br />
	<input type="submit" value="Unesi"/>
	
	
</form>	
<br />

<a href="modeli_list.php">Nazad</a>

</body></html>