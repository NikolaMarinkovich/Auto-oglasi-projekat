<?php
$ACCESS_LEVEL = 0; 
$TITLE='Oglasi';
		require 'lib/init.php';	
	require 'modules/head.php';
 ?>
<?php include 'modules/main-menu.php'; ?>

<!--main levi i desni -->
<div class="container">
	<div class="row">
	
		<!--POCETAK PRETRAGE -->
		<div class="col-sm-3" id="pretraga">
			<aside>
			<?php include 'modules/pretraga.php'; ?>
			</aside>
		</div>
		<!--KRAJ PRETRAGE -->
		
		
		<!--pocetak MAIN -->
		<div class="col-sm-9">
			<main>
				<h3>Svi oglasi</h3>
				<div class="container-fluid">
						
						<?php
						$upit = "SELECT * FROM model JOIN vozilo ON vozilo.model_id=model.id WHERE 1 ";
						
						if( isset($_REQUEST['model']) ){
							$upit .= ' AND vozilo.model_id= ' .$db->real_escape_string( $_REQUEST['model']);
						}
						if( isset($_REQUEST['cena'])  and $_REQUEST['cena']>0 ){
							$upit .= ' AND vozilo.cena< ' . intval ($_REQUEST['cena']);
						}
						if(isset($_REQUEST['km'])   and $_REQUEST['km']>0 ){
							$upit .= ' AND vozilo.kilometraza <'.intval ($_REQUEST['km']);  // PAZI NA SPEJSOVE TREBA DA IH IMAS IZMEDJU ' I AND
						}
						if(isset($_REQUEST['gorivo'])){
							$upit .= ' AND vozilo.tip_goriva =  "'.$db->real_escape_string($_REQUEST['gorivo']).'"'; // REAL ESCAPE MORA POD NAVODNIKE
						}
						
						
						$rez = $db->query($upit);
						while ($red = $rez->fetch_object()){?>
						<div class="col-sm-4">
							<div class="panel panel-default">
								<div class="panel-heading"><strong> <?= $red->marka." ".$red->model ?> </strong></div>
								<div class="panel-body"><img src="admin/<?= $red->slika ?>" /></div>
								<div class="panel-footer"><?= $red->cena ?> &euro; </div>
								<div class="panel-footer"><?= $red->godiste ?><span> god.</span></div>
								<div class="panel-footer"><?= $red->snaga ?> <span>KW</span></div>
								<div class="panel-footer"><?= $red->tip_goriva ?></div>
								<div class="panel-footer">Datum oglasa:<?= $red->datum ?></div>
								<div class="panel-footer"><?= $red->opis ?></div>
								<div class="panel-footer"><a href="oglas.php?id=<?= $red->id ?>">Opsirnije</a></div>
							</div>
						</div>	
						
						
						<?php } ?>
					
				</div>	
					
			</main>
		</div>
		<!--KRAJ MAIN -->
	</div>
</div>
<!--KRAJ MAINA LEVOG I DESNOG -->
<?php include 'modules/footer.php'; ?>