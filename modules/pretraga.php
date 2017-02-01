		
			<form method="get" action="oglasi.php">
				<div class="form-group">
					<label for="model12">Model</label>
					<select class="form-control" id="model12" name="model">
						<?php
						$rez = $db->query("select * from model");
						while ($red=$rez->fetch_object()){
						?>
						<option value="<?=$red->id ?>"><?=$red->marka.' '.$red->model ?></option>
						<?php } ?>
					</select>
					<br />
					
					<label for="cena">Cena do:</label>
					<input type="text" class="form-control" name="cena" value=""/>
					<br />
					
					<label for="gorivo">Tip goriva</label>
					<select class="form-control" name="gorivo">
						<option value="Benzin">Benzin</option>
						<option value="Dizel">Dizel</option>
						<option value="Benzin+gas">Benzin+gas</option>
						<option value="Struja">Struja</option>
					</select>
					<br />
					
					<label for="km">Kilometraza do:</label>
					<input type="text" class="form-control" name="km" value="" />
					<br />
					<input type="submit" value="Pretrazi"/>
					
				</div>
			
			</form>
		