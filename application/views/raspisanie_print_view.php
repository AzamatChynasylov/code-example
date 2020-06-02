<?php
	$time_lesson=array('07:00','08:20','09:40','11:00','12:20','13:40','15:00','16:20','17:40','19:00');
	// echo '<pre>';
	// print_r($teacherLessonTime);
	// echo '</pre>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
 
    
    <link href="<?=base_url()?>css/style.css" rel="stylesheet">
	<title></title>
</head>
<body>
	<div class="raspisanie_div">
		<p><?=$teacher['name']?>  c   <?=date('d-m-Y',strtotime($first_day))?> по <?=date('d-m-Y',strtotime($first_day."+5 days"))?></p>
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
											<td class="individualLesson"><?=$teacherLessonTime[$i][$j]['description']?></td>
							<?php
										}
										else{


										
							?>
								<td>+</td>
							<?php
										}
									}
							}
								
							?>
						</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
		
	
</body>
</html>