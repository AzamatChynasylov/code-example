<div class="container">
        <div class="row">
<div class="col-md-8">
	<br>
	<br>
<?php 
//print_r($gruppa_n);
//print_r($student_sp);
?>
 <section>
 	
	<?php
	//print_r($gruppat);

	//echo money_format('%.2n', $gruppat[0][0]['time'])
	?>
		<select class="form-control selectpicker" onChange="if(this.options[this.selectedIndex].value!=''){window.location=this.options[this.selectedIndex].value}else{this.options[selectedIndex=0];}">
		<option value="">Выберите группу из списка</option>
	<?php

		for ($i=0; $i <count($gruppat) ; $i++)
		{ 
			$string=(string)$gruppat[$i][0]['time'];
			echo $string;
			$string2=substr($string, 0,2);
			$string3=substr($string, 2);
			$string=$string2.':'.$string3;
			if($gruppa_n['lastDate']=='')
			{
				$bg='redNot';
			}
			else
			{
				$bg='bg-success';
			}
		?>


		<option value="" class="bg-primary opt"><?=$string?></option>
			<?php foreach ($gruppat[$i] as $item):
				$bgc='';

				if($item['lastDate']=='')
				{
					$bgc='redNot';
				}

			?>
			    <option value="<?=base_url('gruppa/student_sp/'.$item['id'])?>" data-subtext="<?=$item['stCont']?>" class="<?=$bgc?>"><?=$item['namegroup']?></option>
			<?php endforeach;?>
		<?php
		}
		if(isset($gruppaindi)){
			?>
				<option value="" class="bg-danger opt">Индивидуальные</option>
				<?php foreach ($gruppaindi as $item):?>
			    <option value="<?=base_url('gruppa/student_sp/'.$item['id'])?>"><?=$item['namegroup']?></option>
				<?php endforeach;?>
			<?php
		}
		?>
		<?php 
			if(count($gruppa)>0){
				//print_r($gruppa)
		?>
		<option value="" class="bg-danger opt">Изменить</option>
				<?php foreach ($gruppa as $item):?>
			    <option value="<?=base_url('gruppa/student_sp/'.$item['id'])?>"><?=$item['namegroup']?></option>
				<?php endforeach;?>
			<?php
		}
		?>
		</select>


</section>
<?php //print_r($gruppa_n);
$kolS=0;
	
	if($gruppa_n['level']==1)
	{
		$kolS=880;
	}
	if($gruppa_n['level']==2)
	{
		$kolS=980;
	}
	if($gruppa_n['level']==3)
	{
		$kolS=1880;
	}
?>
<div class="alert"></div>
<h1 class="<?=$bg?>">Группа <?=$gruppa_n['namegroup']?> <span class="small"><?=$gruppa_n['lastDate']?></span></h1>
<?php
	if($kolS==0)
	{
?>
<h3 class="redNot"> Срочно поменяйте уровень группы!!!</h3>
<?php
	}

	if($gruppLessonNumber['lesson']!='')
	{
		?>
			<h5 class="bg-primary">№ урока <?=$gruppLessonNumber['lesson']?></h5>
		<?php

	}
?>

<section class="stv">
<table class="table table-bordered table-condenced ">
<thead>
	<th>#</th>
	<th>Студент</th>
	<th>Начало курса</th>
	<th>Конец курса</th>
</thead>
<tbody id="fam"> 
<?php $k=0; foreach ($student_sp as $item):
$k++;
$clDan='';
	if($item['infoOpl']<$kolS)
	{
		$clDan='redNot';
	}
?>
	<tr class="<?=$clDan?>">
		<td>
			<?=$k;?>		
		</td>
		<td  id="">
		<?php 
			 $name = $item['fio'];
								    //$name = iconv("UTF-8", "UTF-8", $name);

								    $first = mb_substr($name,0,1, 'UTF-8');//первая буква
								    $last = mb_substr($name,1);//все кроме первой буквы
								    $first = mb_strtoupper($first, 'UTF-8');
								    $last = mb_strtolower($last, 'UTF-8');
								    $item['fio'] = $first.$last;
		?>
			<a href="<?=base_url('student/get_student/'.$item['id']);?>"><p id="farm<?=$k?>"><?=$item['fio']?> </p></a>	
		</td>
		<td><?=date('d-m-Y', strtotime($student_opl[$k-1]['first_date_lesson']))?></td>
		<td><?=date('d-m-Y', strtotime($student_opl[$k-1]['last_date_lesson']))?></td>
		
	</tr>
<?php endforeach;
//print_r($student_opl)
?>
</tbody>



</table>
</section>
<section>
	<a href="<?=base_url('edit/del_gruppa/'.$gruppa_n['id'])?>" class="btn btn-danger">Удалить группу</a>
	<a href="<?=base_url('edit/edit_gruppa/'.$gruppa_n['id'])?>" class="btn btn-info">Изменить данные группы</a>
	<a href="#" class="btn btn-info" id="st_cop">Скопировать</a>
<button class="btn btn-primary " data-toggle="modal" data-target="#myModal">
        Attanding List
      </button>
      
      
      <?php 
	if($gruppLessonNumber=='')
	{
		?>
			<button class="btn btn-primary " data-toggle="modal" data-target="#lessonModal" id="lessonNumber">
       Добавить урок
      </button>
		<?php

	}
?>
<br>
<br>
<a href="<?=base_url('gruppa/gruppaStInfo/'.$gruppa_n['id'])?>" class="btn btn-info" target="_blank">Данные студентов</a>
      <div class="alert"></div> 

</section>
<div id="modal_form"><!-- Само окно --> 

</div>
<div id="overlay"></div><!-- Подложка -->
<!-- Modal -->
<form action="<?=base_url('gruppa/attanding_list/'.$gruppa_n['id'])?>" method='post'>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Attanding List c какого числа:</h4>
      </div>
      <div class="modal-body">
        <p>Дата</p>
        <input type="text" id="first_date_lesson" name="pervoe_chislo">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
        
        <input type="submit" class="btn btn-primary" value="Attanding List" formtarget="_blank">
        
      </div>
    </div>
  </div>
</div><!--modal-->
</form>

<div class="modal fade" id="lessonModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Добавить урок группе</h4>
            </div>
            <div class="modal-body">
            	<div class="container">
            		
            	
                <div class="error"></div>
                <form class="form-horizontal" id="crud-form">
                
                <div class="row">
		           <div class="col-md-4">
		             <div class="input-group">
		                <span class="input-group-addon">Номер урока&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-book"></span></span>
		                <input type="number" class="form-control" placeholder="Номер урока"  name="numberLesson" id="numberLesson" required>
		            </div>
		           </div>
		        </div>
		        <input type="hidden" name="idGr" id="idGr" value="<?=$gruppa_n['id']?>">
                </form>
            </div>
            </div>
            <div class="modal-footer">
            	<button type="button" class="btn btn-primary" id="addLesson">Добавить урок</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

</div>
