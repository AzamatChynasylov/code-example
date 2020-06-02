<div class="col-md-9">
<form action="<?=base_url('ob_summa/getsummadate')?>" method="post">
	<div class="form-group">
            <p class="form-inline"><label for="exampleInputName2">Дата</label>
            <input name="datesumma" type="text" class="form-control" id='first_date_lesson' value="<?=date('d-m-Y')?>">
            по
			<input name="datesumma2" type="text" class="form-control" id='last_date_lesson' value="">
            </p></div>
          <input type="submit" class="btn btn-primary" value="Посмотреть" name="search">
</form>
         <table class="table table-bordered table-hover table-condensed">	
<thead>
	<th>
		#
	</th>
	<th>
		ФИО
	</th>
	<th>
		Дата
	</th>
	<th>Деньги за обучение</th>
	<th>Деньги  за книгу</th>
	
	
</thead>
<tbody>
	<?php
	//print_r($summa);
	 $k=0;$summa2=0; foreach ($summa as $item):
	$k++;
	$summa2+=(int)$item['summa']+(int)$item['book_price']+(int)$item['cd_price']+(int)$item['print_price']+(int)$item['ks_price'];
	?>
	<tr class="danger">
		<td><?=$k?></td>
		<td><a href="<?= base_url('student/get_student/'.$item['id_student'])?>" target="_blank"><?=$item['fio']?></a></td>
		<td><?=date('d-m-Y H:m:s', strtotime($item['date_payment']))?></td>
		<td><?=$item['summa']?></td>
		<td><?=$item['book_price']?></td>
		
	</tr>
<?php endforeach;?>
<tr>
	<td>Итого</td>
	<td><?=$summa2?></td>
</tr>
</tbody>
</table>

			
 </div>