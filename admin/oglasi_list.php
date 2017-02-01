<?php
$ACCESS_LEVEL = 2; 
$TITLE='Lista oglasa';
	require '../lib/init.php';	
	require '../modules/head.php';
 
 
 
 if (isset($_REQUEST['obrisi'])){
 
 $id = $_REQUEST ['obrisi'];
	
	$upit = " DELETE FROM vozilo WHERE id=$id LIMIT 1  ";
	
	$db->query($upit);
	
	
	//header ("Location:modeli_list.php"); die();
 }
 
 
 ?>
 
 
 
 <h1><a href="admin.php" >Admin</a></h1>
		<a href="oglasi_list.php" class="btn btn-primary">Lista oglasa</a> <br /><br />
		<a href="oglasi_insert.php" class="btn btn-primary">Unos novog oglasa</a> <br /><br />
		<a href="modeli_insert.php" class="btn btn-primary">Unos novog modela</a><br /> <br /><br />
		<a href="modeli_list.php" class="btn btn-primary">Lista modela</a><br /> <br /><br />
 
 <h3>Lista oglasa</h3>
 
 
 <?php
	//$upit = " SELECT * FROM vozilo JOIN model ON vozilo.model_id = model.id ORDER  BY vozilo.id ASC ";
	
	$upit = "  SELECT * FROM model JOIN vozilo ON vozilo.model_id = model.id ORDER  BY vozilo.id ASC ";
	
	
	$rez = $db->query($upit);
	
	while ($red = $rez->fetch_object()){ ?>
	
	
	
	<strong>Model:</strong><br />	
	<span><?= $red->marka ." ". $red->model ?></span>
	<br />
	<strong>Opis:</strong><br />
	<span><?= $red->opis?></span>
	<br />
	<b>Slika:</b>
	<span><img src="<?= $red->slika ?>" /></span>
	<br />
	<strong>Kilometraza:</strong>
	<span><?= $red->kilometraza?></span>
	<br />
	<strong>Godiste:</strong>
	<span><?= $red->godiste?></span>
	<br />
	<strong>Snaga:</strong>
	<span><?= $red->snaga?></span>
	<br />
	<strong>Gorivo:</strong>
	<span><?= $red->tip_goriva?></span>
	<br />
	<strong>Cena:</strong>
	<span><?= $red->cena?> &euro;</span>
	<br />
	
	
	
	<br />
	<a href="oglasi_edit.php?id=<?= $red->id ?>">Izmeni</a>
	<a href="javascript:void(0)" onclick=" if(confirm('Potvrdite brisanje')) window.location.href='oglasi_list.php?obrisi=<?= $red->id ?>'; ">Obrisi</a>
	
	<br/ >
	<span style="border-bottom:1px solid">--------------</span>
	<br /><br />
		
		
		
		
<?php
		}
 ?>
 
 
 </body></html>