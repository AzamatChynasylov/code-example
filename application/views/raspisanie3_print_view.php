<?php
	$time_lesson=array('07:00','08:20','09:40','11:00','12:20','13:40','15:00','16:20','17:40','19:00');
	$time_lesson2=array('08:20','09:40','11:00','12:20','13:40','15:00','16:20','17:40','19:00','20:20');
	// echo '<pre>';
	// print_r($teacherLessonTime);
	// echo '</pre>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
 
    
    <link href="<?=base_url('assets/css/style.css')?>" rel="stylesheet">
	<title></title>
</head>
<body class="shedulePrintBig">
	
	<div class="bigShedule">
		<p class="sheduletopTime">c   <?=date('d-m-Y',strtotime($first_day))?> по <?=date('d-m-Y',strtotime($first_day."+5 days"))?></p>
		<table class="table table-bordered table-condenced" id="MatrixTable" width="100%">
			<thead>
				<th class="timeShedule">
					Время
				</th>
				<th>
					Понeдельник - Monday
					<br/>
					<?=date('d-m-Y',strtotime($first_day))?>
					<br/>
					<?php
						if($dejur[0])
						{
							echo("Деж".' '.$dejur[0]['name'].substr($dejur[0]['dop_info'],12));
						?>
						
						<?php
						}
						else
						{

						}
					?>
				</th>
				<th>
					Вторник - 
					Tuesday<br/><?=date('d-m-Y',strtotime($first_day)+(86400))?>
					<br/>
					<?php
						if($dejur[1])
						{
							echo("Деж".' '.$dejur[1]['name'].substr($dejur[1]['dop_info'],12));
						?>
						
						<?php
						}
						else
						{

						}
					?>
				</th>
				<th>
					Среда - 
					Wednesday<br/><?=date('d-m-Y',strtotime($first_day)+(86400*2))?>
					<br/>
					<?php
						if($dejur[2])
						{
							echo("Деж".' '.$dejur[2]['name'].substr($dejur[2]['dop_info'],12));
						?>
						
						<?php
						}
						else
						{

						}
					?>
				</th>
				<th>
					Четверг - 
					Thursday <br/><?=date('d-m-Y',strtotime($first_day)+(86400*3))?>
					<br/>
					<?php
						if($dejur[3])
						{
							echo("Деж".' '.$dejur[3]['name'].substr($dejur[3]['dop_info'],12));
						?>
						
						<?php
						}
						else
						{

						}
					?>
				</th>
				<th>
					Пятница - 
					Friday <br/><?=date('d-m-Y',strtotime($first_day)+(86400*4))?>
					<br/>
					<?php
						if($dejur[4])
						{
							echo("Деж".' '.$dejur[4]['name'].substr($dejur[4]['dop_info'],12));
						?>
						
						<?php
						}
						else
						{

						}
					?>
				</th>
				<th>
					Суббота - 
					Saturday <br/><?=date('d-m-Y',strtotime($first_day)+(86400*5))?>
					<br/>
					<?php
						if($dejur[5])
						{
							echo("Деж".' '.$dejur[5]['name'].substr($dejur[5]['dop_info'],12));
						?>
						
						<?php
						}
						else
						{

						}
					?>
				</th>
				
			</thead>
			<tbody>
				<?php
					for($i=0;$i<10;$i++)
					{
						//echo('aza');
				?>
						<tr>
							<td class="timeShedule"><?=$time_lesson[$i].' - '. $time_lesson2[$i]?></td>
							<?php
								for ($j=0; $j <6 ; $j++) 
								{ 
									//echo (count($teacherLessonTime[$i][$j]));
									if(count($teacherLessonTime[$i][$j])>0)
									{
										?>
										<td class="dltd shedulePad">
									<?php
										for ($i2=0; $i2 <count($teacherLessonTime[$i][$j]) ; $i2++){
											echo($teacherLessonTime[$i][$j][$i2]['shortdesc'].' - '.$teacherLessonTime[$i][$j][$i2]['title']);
											echo('<br/>');
										}
										?> 
											</td>								
										<?php
									}
									else
									{

									
									
										
									?>
										<td class="dltd"></td>
									<?php
									}
											
										
								}
					}	
							?>
						</tr>
			</tbody>
		</table>
	</div>
<?php 
	
?>
	
</body>
</html>