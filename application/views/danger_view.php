
<div class="col-md-9">
<?php 
//print_r($students);


?>
<table class="table table-bordered table-hover table-condensed">	
<thead>
	<th>
		#
	</th>
	<th>
		Сегодня
	</th>
	<th>Окончание курса студента</th>
	<th>Имя студента</th>
	<th>Телефон</th>
	<th>Email</th>
	<th>Доп.инфо</th>
	
</thead>
<tbody>
	<?php $k=0; 
	for ($i=0; $i <count($students3) ; $i++)
	 { 
	
	$k++;

		


	?>
	<tr class="danger">
		<td><?=$k?></td>
		<td><?=date('d-m-Y')?></td>
		<td><?=$students3[$i]['last_date_lesson']?></td>
		<td><?=$students3[$i]['fio']?></td>
		<td><?=$students3[$i]['phone']?></td>
		<td><?=$students3[$i]['email']?></td>
		<td><?=$students3[$i]['metka']?></td>
	</tr>
<?php }?>
</tbody>
</table>

<?php
//$tomorrow = date("m/d/Y",mktime(0, 0, 0, date("m") , date("d")+1, date("Y")));
//echo($tomorrow);
?>
</div>
