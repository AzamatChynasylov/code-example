<div class="col-md-9">

<form action="<?=base_url()?>index.php/otchet/getotchetdate" method="post">
	<div class="form-group">
            <p class="form-inline"><label for="exampleInputName2">Дата</label>
            <input name="datesumma" type="text" class="form-control" id='first_date_lesson' value="<?=date('d-m-Y')?>">
            по
			<input name="datesumma2" type="text" class="form-control" id='last_date_lesson' value="">
            </p>
     </div>
    
          <input type="submit" class="btn btn-primary" value="Посмотреть" name="search">
</form>


<section class="">
	 <div class="tabset0">
         <div data-pws-tab="tab1" data-pws-tab-name="Кто заходил" data-pws-tab-icon="fa-video-camera">
         <h3>Кто заходил</h3>
         <table class="table table-bordered table-hover table-condensed">	
<thead>
	<th>
		#
	</th>
	<th>
		Дата
	</th>
	<th>ip</th>
	<th>Имя</th>
	
</thead>
<tbody>
<?php $k=0; 

	# code...

foreach ($who as $item):
$k++;
?>
		<tr class="info">
		<td><?=$k?></td>
		<td><?=$item['dataenter']?></td>
		<td><?=$item['ip_user']?></td>
		<td><?=$item['name']?></td>
		
		</tr>
<?php endforeach;?>

</tbody>
</table>
         </div>
         <div data-pws-tab="tab2" data-pws-tab-name="Новый студент" data-pws-tab-icon="fa-street-view">
         <h3>Новый студент</h3>
         <table class="table table-bordered table-hover table-condensed">	
<thead>
	<th>
		#
	</th>
	<th>
		Дата
	</th>
	
	<th>Имя нового студента</th>
	
</thead>
<tbody>
<?php $k=0; 

	# code...

foreach ($newstudent as $item):
$k++;
?>
		<tr class="success">
		<td><?=$k?></td>
		<td><?=$item['dataenter']?></td>
		
		<td><?=$item['name_student']?></td>
		
		</tr>
<?php endforeach;?>

</tbody>
</table>
         </div>
         <div data-pws-tab="tab3" data-pws-tab-name="Новая группа" data-pws-tab-icon="fa-user-plus">
         <h3>Новая группа</h3>
         <table class="table table-bordered table-hover table-condensed">	
<thead>
	<th>
		#
	</th>
	<th>
		Дата
	</th>
	
	<th>Название новой группы</th>
	
</thead>
<tbody>
<?php $k=0; 

foreach ($newsgroup as $item):
$k++;
?>
		<tr class="danger">
		<td><?=$k?></td>
		<td><?=$item['dataenter']?></td>
		
		<td><?=$item['name_gruppa']?></td>
		
		</tr>
<?php endforeach;?>

</tbody>
</table>
         </div>
         <div data-pws-tab="tab4" data-pws-tab-name="Оплата за учебу" data-pws-tab-icon="fa-money">
        <h3>Оплата за учебу</h3>
         <table class="table table-bordered table-hover table-condensed">	
<thead>
	<th>
		#
	</th>
	<th>
		Дата
	</th>
	
	
	<th>Имя кто  оплатил(а)</th>
	<th>Оплата за учёбу</th>
	<th>Оплата за книгу</th>
	
	
</thead>
<tbody>
<?php $k=0;

foreach ($payment as $item):
$k++;
?>
		<tr class="success">
		<td><?=$k?></td>
		<td><?=$item['dataenter']?></td>
		
		
		<td><?=$item['name_student']?></td>
		<td><?=$item['oplata_ucheba']?></td>
		
		
		</tr>
<?php endforeach;?>

</tbody>
</table>
         </div>
         <div data-pws-tab="tab5" data-pws-tab-name="Доп.оплата" data-pws-tab-icon="fa-spinner fa-spin">
        <h3>Доп.оплата</h3>
         <table class="table table-bordered table-hover table-condensed">	
<thead>
	<th>
		#
	</th>
	<th>
		Дата
	</th>
	
	<th>Оплата за книгу</th>
	

	
</thead>
<tbody>
<?php $k=0;

foreach ($payment_other as $item):
$k++;
?>
		<tr class="warning">
		<td><?=$k?></td>
		<td><?=$item['dataenter']?></td>
		
		
		
		<td><?=$item['oplata_kniga']?></td>
		
		
		</tr>
<?php endforeach;?>

</tbody>
</table>	
         </div>
         
      </div>
</section>
<section>
	
</section>	
 </div>