<div class="row">
	<div class="col-md-8">
		<table class="table table-condensed table-bordered">
			<thead>
				<th>№</th>
				<th>ФИО</th>
				<th>Учитель</th>
				<th>Дата оплаты</th>
				<th>Номер телефона</th>
			</thead>
			<tbody>
				
			
		
		<?php $kolUser=0;$kolZapisalis=0;$kolNeZapisalis=0; for($i=0;$i<count($users);$i++){$kolUser++;
			$clas='';
			if($users[$i]['zapisalsya']==1){
				$clas='zapisalsya';
				$kolZapisalis++;
			}
			?>
			
				<tr class="<?=$clas?>">
					<td><?=$kolUser?>
						<?php if($users[$i]['zapisalsya']==1){}else{ $kolNeZapisalis++;?>
						<a class="btn btn-primary" href="<?=base_url('probnik/zapisat/'.$users[$i]['id'])?>"> Записать</a>
						<?php }?>
					</td>
					<td><?=$users[$i]['name']?></td>
					<td><?=$users[$i]['teacher']?></td>
					<td><?=$users[$i]['date_registration']?></td>
					<td><?=$users[$i]['tel']?></td>
				</tr>
			<?php
		}?>
		<tr>
			<td class="zapisalsya">Записались :</td>
			<td class="zapisalsya"><?=$kolZapisalis?></td>
			<td class="nezapisalsya">Не записались :</td>
			<td class="nezapisalsya"><?=$kolNeZapisalis?></td>
		</tr>
			</tbody>
		</table>
	</div>
