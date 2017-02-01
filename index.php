<?php
$ACCESS_LEVEL = 0; 
$TITLE='Auto plac';
		require 'lib/init.php';	
	require 'modules/head.php';
 ?>
<?php include 'modules/main-menu.php'; ?>


<span><a href="admin/login.php">Admin</a></span>

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
			<h3>Specijalna ponuda</h3>
				<div class="container-fluid">
						
						<?php
						$upit = "SELECT * FROM model JOIN vozilo ON vozilo.model_id=model.id WHERE specijalna_ponuda=1";
						$rez = $db->query($upit);
						while ($red = $rez->fetch_object()){?>
						<div class="col-sm-4">
							<div class="panel panel-default">
								<div class="panel-heading"><?= $red->marka." ".$red->model ?></div>
								<div class="panel-body"> <img src="admin/<?=$red->slika ?>" /></div>
								<div class="panel-footer"><?= $red->cena ?> &euro;</div>
								<div class="panel-footer"> <a href="oglas.php?id=<?= $red->id ?>" > Opsirnije </a> </div>
							</div>
						</div>	
						
						
						<?php } ?>
					
				</div>	
					
	
				
				
				
				<h3>Last minute</h3>
				<div class="container-fluid">
						
						<?php
						$upit = "SELECT * FROM model JOIN vozilo ON vozilo.model_id=model.id ORDER BY datum DESC LIMIT 3";
						$rez = $db->query($upit);
						while ($red = $rez->fetch_object()){?>
						<div class="col-sm-4">
							<div class="panel panel-default">
								<div class="panel-heading"><?= $red->marka." ".$red->model ?></div>
								<div class="panel-body"><img src="admin/<?= $red->slika ?>" /></div>
								<div class="panel-footer"><?= $red->cena ?> &euro;</div>
								<div class="panel-footer"><a href="oglas.php?id=<?= $red->id ?>" >Opsirnije</a></div>
							</div>
						</div>	
						
						
						<?php } ?>
						
						
						
						
			</main>
		</div>
		<!--KRAJ MAIN -->
	</div>
</div>
<!--KRAJ MAINA LEVOG I DESNOG -->
<?php include 'modules/footer.php'; ?>