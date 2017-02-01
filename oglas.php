<?php
$ACCESS_LEVEL = 0; 
$TITLE='Oglas';
		require 'lib/init.php';	
	require 'modules/head.php';
 ?>
<?php include 'modules/main-menu.php'; ?>

<?php


$id2 = $_REQUEST['id'];  

$upit = "SELECT * FROM model JOIN vozilo ON vozilo.model_id=model.id WHERE vozilo.id=$id2 " ;

$rez = $db->query($upit);




$red = $rez->fetch_object()





?>



<div class="container-fluid">
	<div class="row">
	
					
					
					<div class="col-sm-8">
					<h3><b>Oglas</b></h3>
							<div class="panel panel-default">
								<div class="panel-heading"><strong> <?= $red->marka." ".$red->model ?> </strong></div>
								<div class="panel-body"><img src="admin/<?= $red->slika ?>" /></div>
								<div class="panel-footer">Cena:<?= $red->cena ?> &euro; </div>
								<div class="panel-footer">Godiste:<?= $red->godiste ?><span> god.</span></div>
								<div class="panel-footer">Snaga:<?= $red->snaga ?> <span>KW</span></div>
								<div class="panel-footer">Gorivo:<?= $red->tip_goriva ?></div>
								<div class="panel-footer">Datum oglasa:<?= $red->datum ?></div>
								<div class="panel-footer">Opis:<?= $red->opis ?></div>
								
							</div>
						</div>
					<div class="col-sm-4">
						
					</div>	
	</div>
</div>