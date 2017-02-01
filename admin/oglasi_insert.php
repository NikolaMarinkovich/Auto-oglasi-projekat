<?php
$ACCESS_LEVEL = 2; 
$TITLE='Insert oglasa';
	require '../lib/init.php';	
	require '../modules/head.php';
	
 if (isset($_REQUEST['akcija'])){
	 
	 $km = $_REQUEST['km'];
	 $cena = $_REQUEST['cena'];
	 $snaga = $_REQUEST['snaga'];
	 $datum = $_REQUEST['datum'];
	 $model_id = $_REQUEST['model_id'];
	 $gorivo = $_REQUEST['gorivo'];
	 $opis = $_REQUEST['opis'];
	 $god = $_REQUEST['god'];
	 $spec = $_REQUEST['spec'];
	 
	$upit = "INSERT INTO vozilo (kilometraza, cena, snaga, model_id, tip_goriva, opis, godiste, specijalna_ponuda, datum) VALUES ('$km', '$cena', '$snaga', '$model_id', '$gorivo', '$opis', '$god', '$spec', '$datum')" ;
	
	//echo $upit;  // srediti insert upit, ne gadjaju se kolone ivrednosti
	$db->query($upit);
	header ("Location:oglasi_list.php"); die();
	 
	 
	 
 }
	
	

	
?>
<h1><a href="admin.php" >Admin</a></h1>
		<a href="oglasi_list.php" class="btn btn-primary">Lista oglasa</a> <br /><br />
		<a href="oglasi_insert.php" class="btn btn-primary">Unos novog oglasa</a> <br /><br />
		<a href="modeli_insert.php" class="btn btn-primary">Unos novog modela</a><br /> <br /><br />
		<a href="modeli_list.php" class="btn btn-primary">Lista modela</a><br /> <br /><br />
 
	
<h4>Unesite nov oglas</h4>	
	
<form method="get" action="oglasi_insert.php">
	<input type="hidden" name="akcija" value="a">
	<input type="hidden" name="datum" value="<?=  date("Y/m/d")?>;"/>

				<div class="form-group">
					<label for="model12">Model</label>
					<select class="form-control" id="model12" name="model_id">
						<?php
						$rez = $db->query("select * from model");
						while ($red=$rez->fetch_object()){
						?>
						<option value="<?=$red->id ?>"> <?=$red->marka.' '.$red->model ?> </option> <!-- ISTO KAO OVO ISPOD SAMO STO SE PREPOZNAJE PO ID KOJI SE DIREGNO UNOSI IZ BAZE U ZAVISNOSTI KOJI JE OPTION IZABRAN TJ KOJI MODEL AUTA-->
						<?php } ?>
					</select>
					<br />
					
					<label for="cena">Cena</label>
					<input type="text" class="form-control" name="cena">
					<br />
					
					<label for="gorivo">Tip goriva</label>
					<select class="form-control" name="gorivo">
						<option value="Benzin"> Benzin </option>
						<option value="Dizel"> Dizel </option>
						<option value="Benzin+gas"> Benzin+gas </option>     <!--OPTION IMA VALUE A CEO SELECT NAME, KAD IZABERES JEDNU OPCIJU TO POSTAJE VALUE CELOG SELECTA KAD UZMES SELECT PO NAME VRACA SE VALUE IZABRANE OPCIJE -->
						<option value="Struja"> Struja </option>
					</select>
					<br />
					
					<label for="km">Kilometraza </label>
					<input type="text" class="form-control" name="km">
					<br />
					
					<label for="snaga">Snaga </label>
					<input type="text" class="form-control" name="snaga">
					<br />
					
				
					
					<label for="god">Godiste </label>
					<input type="text" class="form-control" name="god">
					<br />
					
					<label for="opis"> Opis </label><br />
					<textarea name="opis" ></textarea>
					<br /><br />
					Specijalna ponuda:<br />
					<input type="radio" name="spec" value="0" checked> NE<br>
					<input type="radio" name="spec" value="1"> DA<br>
					<br />
					
					<input type="submit" value="Unesi oglas"/>
					
				</div>
			
			</form>

<a href="oglasi_list.php">Nazad</a>

</body></html>