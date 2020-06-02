
<div class="col-md-8">

<?php

//echo($teacherLessonTime[0][0][0]);
// echo '<pre>';
// print_r($teacherLessonTime);
// echo '</pre>';
	//print_r($result);
	//print_r($lesson_today);
	//print_r($teacher_w);
	$time_lesson=array('07:00','08:20','09:40','11:00','12:20','13:40','15:00','16:20','17:40','19:00');
	// foreach ($result as $key){
	// 	if(date('Y-m-d H:i:s',strtotime($key['start'])) == date('Y-m-d H:i:s',strtotime($first_day.' '.'07:00:00'))){
	// 			echo("aza");
	// 	}
		//echo($key['start']);
	//}
	//echo(date('Y-m-d H:i:s',strtotime($result[0]['start'])));
	//	echo('<br/>');
	//echo(date('Y-m-d H:i:s',strtotime($first_day.' '.'07:00:00')));
?>
	<h3><?=$teacher['name'];?></h3>
	<p><?=$teacher['telefon'];?></p>
	<?php
							if($teacher['dop_info'])
								{
									$nameDay=array('Понeдельник','Вторник','Среда','Четверг','Пятница','Суббота');
									$d=substr($teacher['dop_info'],2,12);
									$d=date('N',strtotime($d));
									

						?>
						 <p class="bg-danger">Дежурство по <?=$nameDay[$d-1]?> <?=substr($teacher['dop_info'],12);?></p>
						<?php
							}
						?>
	
	<form action="<?=base_url()?>index.php/raspisanie/teacher_detail/<?=$teacher['id']?>" method="post">
		<input  type="text" class="form-control" id="first_date_lesson" name="date" data-date-format="mm/dd/yyyy"></p>
		<input type="submit" name="search" value="Найти" class="btn btn-primary"> 
	</form>
	
	<hr>
	<section>
		<h5>Уроки на этой неделе</h5>
		<?php

			//print_r('<pre>');
			//print_r($teacher_w);
			//print_r('</pre>');
		
		?>
		<table class="table table-bordered table-condenced">
			<thead>
				<th>
					Время
				</th>
				<th>
					Понeдельник - Monday
					<br/>
					<?=date('d-m-Y',strtotime($first_day))?>
				</th>
				<th>
					Вторник - 
					Tuesday<br/><?=date('d-m-Y',strtotime($first_day)+(86400))?>
				</th>
				<th>
					Среда - 
					Wednesday<br/><?=date('d-m-Y',strtotime($first_day)+(86400*2))?>
				</th>
				<th>
					Четверг - 
					Thursday <br/><?=date('d-m-Y',strtotime($first_day)+(86400*3))?>
				</th>
				<th>
					Пятница - 
					Friday <br/><?=date('d-m-Y',strtotime($first_day)+(86400*4))?>
				</th>
				<th>
					Суббота - 
					Saturday <br/><?=date('d-m-Y',strtotime($first_day)+(86400*5))?>
				</th>
				
			</thead>
			<tbody>
				<?php
					for($i=0;$i<10;$i++)
					{
				?>
						<tr>
							<td><?=$time_lesson[$i]?></td>
							<?php
								for ($j=0; $j <6 ; $j++) 
								{ 
									
									
									
									if($teacherLessonTime[$i][$j]=='')
									{

							?>
								<td></td>
							<?php
									}
									else
									{
										$infoG=mb_strtolower(mb_substr($teacherLessonTime[$i][$j]['description'], 0, 3));
										//echo($infoG);
										if($infoG=='инд' || $infoG=='out')
										{
							?>
											<td><?=$teacherLessonTime[$i][$j]['shortdesc']?></td>
							<?php
										}
										else{


										
							?>
								<td>+</td>
							<?php			}
									}
							}
								
							?>
						</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</section>
	<a href="<?=base_url()?>index.php/shedule/teachers" class="btn btn-default">Назад</a>
	<a class='btn btn-info' href="<?=base_url()?>index.php/shedule/teacherUpdate/<?=$teacher['id']?>">Изменить данные</a>
	<a class='btn btn-danger' href="<?=base_url()?>index.php/shedule/teacherDell/<?=$teacher['id']?>">Удалить</a>
	<a class='btn btn-warning' href="<?=base_url()?>index.php/shedule/teacherShedule/<?=$teacher['id']?>/<?=$first_day?>" target="_blank">Напечатать Расписание</a>
</div>