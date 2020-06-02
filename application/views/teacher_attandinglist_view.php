<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
 	
    <link href="<?=base_url()?>css/bootstrap.css" rel="stylesheet">
    <link href="<?=base_url()?>css/style.css" rel="stylesheet">
	<title></title>
</head>
<body>
	
	<?php
		// print_r("<pre>");
		// 		print_r($teacher);
		// print_r("</pre>");
		//print_r($teacher);
				//echo("<br/>");
				//echo("<br/>");

				//$teacher_spisok=$teacher_count;
				//echo("<br/>");
				//print_r($teacher_spisok);
	$class='ots_div';
	$kol=0;
		for ($i=1; $i <count($teacher)+1 ; $i++) 
		{ 
			
			$kol++;
			if($kol==3)
			{
			?>
				<div class="ots_div">
			<?php
			$kol=0;
			}
			else
			{
				?>
				<div class="teacher_at_div">
				<?php
			}
	?>
			
			
		<p class="teacher_at_div2"><?=$teacher_name[$i-1]['name']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$first_day?>года <?=$second_day?>года</p>
		<table class="teacher_at">
			<tr class="">
				<td>
					Время
				</td>
				<td>
					Понидельник <?=$day_kol[0]?><br/>
					Monday
				</td>
				<td>
					Вторник <?=$day_kol[1]?><br/>
					Tuesday
				</td>
				<td>
					Среда <?=$day_kol[2]?><br/>
					Wednesday
				</td>
				<td>
					Четверг <?=$day_kol[3]?><br/>
					Thursday
				</td>
				<td>
					Пятница <?=$day_kol[4]?><br/>
					Friday
				</td>
				<td>
					Суббота <?=$day_kol[5]?><br/>
					Saturday
				</td>
			</tr>
			<tbody>
				<?php
				$v = array(
								 1 => '7:30',
								 2 => '8:45',
								 3 => '10:05',
								 4 => '11:25',
								 5 => '12:45',
								 6 => '13:40',
								 7 => '15:00',
								 8 => '16:20',
								 
								 9 => '17:40',
								 10 => '19:00'
							);

						for ($i2=1; $i2 <11 ; $i2++) 
						{ 
				?>
							<tr>
								<td><?=$v[$i2]?></td>
								<?php
									//echo('p'.$i2);
										if($teacher[$i]['p'.$i2]!='')
										{


								?>

										<td><input type="text" class="tdinput" value="+"></td>
								<?php
										}
										else
										{//echo "string";
										?>
										<td><input type="text" class="tdinput" value=""></td>
										<?php
										}
								?>
								<?php
									
										if($teacher[$i]['v'.$i2]!='')
										{


								?>

										<td><input type="text" class="tdinput" value="+"></td>
								<?php
										}
										else
										{
										?>
										<td><input type="text" class="tdinput" value=""></td>
										<?php
										}
								?>
								<?php
									
										if($teacher[$i]['s'.$i2]!='')
										{


								?>

										<td><input type="text" class="tdinput" value="+"></td>
								<?php
										}
										else
										{
										?>
										<td><input type="text" class="tdinput" value=""></td>
										<?php
										}
								?>
								<?php
									
										if($teacher[$i]['ch'.$i2]!='')
										{


								?>

										<td><input type="text" class="tdinput" value="+"></td>
								<?php
										}
										else
										{
										?>
										<td><input type="text" class="tdinput" value=""></td>
										<?php
										}
								?>
								<?php
									
										if($teacher[$i]['pt'.$i2]!='')
										{


								?>

										<td><input type="text" class="tdinput" value="+"></td>
								<?php
										}
										else
										{
										?>
										<td><input type="text" class="tdinput" value=""></td>
										<?php
										}
								?>
								<?php
									
										if($teacher[$i]['st'.$i2]!='')
										{


								?>

										<td><input type="text" class="tdinput" value="+"></td>
								<?php
										}
										else
										{
										?>
										<td><input type="text" class="tdinput" value=""></td>
										<?php
										}
								?>
							</tr>
				<?php
						}
				?>
			</tbody>
		</table>
	</div>


	<?php
		}
	?>
	
</body>
</html>