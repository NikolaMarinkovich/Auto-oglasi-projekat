<?php
$ACCESS_LEVEL = 2; 
$TITLE='Lista modela';
	require '../lib/init.php';	
	require '../modules/head.php';
 
 
 
 if (isset($_REQUEST['obrisi'])){
 
 $id = $_REQUEST ['obrisi'];
	
	$upit = " DELETE FROM model WHERE id=$id LIMIT 1  ";
	
	$db->query($upit);
	
	
	//header ("Location:modeli_list.php"); die();
 }
 
 
 ?>
 
 
 
 		<h1><a href="admin.php" >Admin</a></h1>
		<a href="modeli_list.php" class="btn btn-primary">Lista modela</a><br /> <br />
		<a href="oglasi_list.php" class="btn btn-primary">Lista oglasa</a> <br /><br />
		<a href="oglasi_insert.php" class="btn btn-primary">Unos novog oglasa</a> <br /><br />
		<a href="modeli_insert.php" class="btn btn-primary">Unos novog modela</a><br /> <br /><br />
 
 <h3>Lista modela </h3>
 
 
 <?php
	$upit = "SELECT * FROM model";
	$rez = $db->query($upit);
	
	while ($red = $rez->fetch_object()){ ?>
		
	<span><?= $red->marka ?></span>
	
	<span><?= $red->model ?></span>
	<br />
	<a href="modeli_edit.php?id=<?= $red->id ?>">Izmeni</a>
	<a href="javascript:void(0)" onclick=" if(confirm('Potvrdite brisanje')) window.location.href='modeli_list.php?obrisi=<?= $red->id ?>'; ">Obrisi</a>
	
	<br/ >
	<span style="border-bottom:1px solid">--------------</span>
	<br /><br />
		
		
		
		
<?php
		}
 ?>