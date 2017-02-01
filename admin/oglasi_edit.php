<?php
$ACCESS_LEVEL = 2; 
$TITLE='Edit oglasa';
	require '../lib/init.php';	
	require '../modules/head.php';
	
 if (isset($_REQUEST['akcija'])){
	 $id = $_REQUEST['id'];
	  
	 $km = $_REQUEST['km'];
	 $cena = $_REQUEST['cena'];
	 $snaga = $_REQUEST['snaga'];
	 
	 $model_id = $_REQUEST['model_id']; // name=model_id vraca value, a value je id modela koji ce se uneti u tabelu vozilo kao model_id
	 $gorivo = $_REQUEST['gorivo'];
	 $opis = $_REQUEST['opis'];
	 $god = $_REQUEST['god'];
	 $spec = $_REQUEST['spec'];
	 
	$upit = "UPDATE vozilo SET kilometraza = '$km' , cena = '$cena' , snaga = '$snaga', tip_goriva = '$gorivo', opis = '$opis', godiste = '$god', specijalna_ponuda = '$spec', model_id = '$model_id' WHERE id=$id " ;
	//setuj i model_id tj updetuj iz value iz prvog selecta
	$db->query($upit);
	
	//header ("Location:oglasi_list.php"); die();
	 
	

	// PoCeTAK SLIKA
		if( isset($_FILES['slika'])  ){

			$odrediste = 'slike/' . time() . $_FILES['slika']['name'];
			
			
				move_uploaded_file($_FILES["slika"]["tmp_name"], $odrediste);
				//kopirao fajl, sada treba da ih nekako povezem
				//prvo obrisem postojecu
				//$upit = "SELECT slika FROM vozilo WHERE id=$id";
				//$rez = $db->query($upit);
				//$red = $rez->fetch_object();
				//$zabrisanje = $red->slika;
				//unlink($zabrisanje);
				//pa zapisem putanju do nove
				$upit2 = " UPDATE vozilo SET slika='$odrediste' WHERE id=$id ";
				$db->query($upit2);
			
		}
		//unos je sacuvan, prebaci na spisak (a i ne mora, moze da ostane ovde)
		//header("Location: index.php"); die();
		
		
		
	}
	

		
	 
 
	
	$id = $_REQUEST['id']; // id koji stize kroz link kad na stranici lista oglasa kliknes izmeni
	$upit = " SELECT * FROM vozilo WHERE id = '$id' ";
	$rez = $db->query($upit);
	$red = $rez->fetch_object();
	
	
	
	 

	
?>
<h1><a href="admin.php" >Admin</a></h1>
		<a href="oglasi_list.php" class="btn btn-primary">Lista oglasa</a> <br /><br />
		<a href="oglasi_insert.php" class="btn btn-primary">Unos novog oglasa</a> <br /><br />
		<a href="modeli_insert.php" class="btn btn-primary">Unos novog modela</a><br /> <br /><br />
		<a href="modeli_list.php" class="btn btn-primary">Lista modela</a><br /> <br /><br />
	
<h4>Izmenite oglas</h4>	
	
<form method="post" action="oglasi_edit.php" enctype="multipart/form-data" />
	<input type="hidden" name="akcija" value="a">
	<input type="hidden" name="id" value="<?= $id ?>">  <!-- Da bi nakon submitovanja forme gore poslao id da bi znao koji oglas da update, ovaj id stize kad kliknes izmeni na stranici olgasi_list  -->

				<div class="form-group">
					<label for="model12">Model</label>
					<select class="form-control" id="model12" name="model_id">
					<?php 
							$upit2= " SELECT * FROM model";
							$rez2 = $db->query($upit2);
							
						while($red2 = $rez2->fetch_object()){ ?>
						<option <?php if($red->model_id==$red2->id) echo 'selected'; ?> value="<?=$red2->id ?>" ><?= $red2->marka ." ". $red2->model ?></option>
					
						<?php } ?>
					</select>
					
					
					<br />
					
					<label for="cena">Cena</label>
					<input type="text" class="form-control" name="cena" value="<?= $red->cena ?>">
					<br />
					
					<label for="gorivo">Tip goriva</label>
					<select class="form-control" name="gorivo">
						<option <?php if($red->tip_goriva=='Benzin') echo'selected'?> value="Benzin"> Benzin </option>
						<option <?php if($red->tip_goriva=='Dizel') echo'selected'?> value="Dizel"> Dizel </option>
						<option <?php if($red->tip_goriva=='Benzin+gas') echo'selected'?> value="Benzin+gas"> Benzin+gas </option>
						<option <?php if($red->tip_goriva=='Struja') echo'selected'?> value="Struja"> Struja </option>
						
					</select>
					<br />
					
					<label for="km">Kilometraza </label>
					<input type="text" class="form-control" name="km" value="<?= $red->kilometraza ?>">
					<br />
					
					<label for="snaga">Snaga </label>
					<input type="text" class="form-control" name="snaga" value="<?= $red->snaga ?>">
					<br />
					
					<label for="cena">Cena </label>
					<input type="text" class="form-control" name="cena" value="<?= $red->cena ?>">
					<br />
					
					<label for="god">Godiste </label>
					<input type="text" class="form-control" name="god" value="<?= $red->godiste ?>">
					<br />
					
					<label for="opis"> Opis </label><br />
					<textarea name="opis" ><?= $red->opis ?></textarea>
					<br /><br />
					Specijalna ponuda:<br />
					<input type="radio" name="spec" <?php if( $red->specijalna_ponuda == 0) echo'checked';?>  value="0" /> NE<br>
					<input type="radio" name="spec" <?php if( $red->specijalna_ponuda == 1) echo'checked';?>  value="1"> DA<br>
					<br />
					
					
					<!-- SLIKA -->
					Slika: <input type="file" name="slika" /> <br />
					<img src="<?= $red->slika ?>" /> <br /> 
					<!-- KRAJ SLIKA -->
					
					
					<br /><br />
					<input type="submit" value="Unesi oglas"/>
					
				</div>
			
			</form>

<a href="oglasi_list.php">Nazad</a>

</body></html>