<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
 
    <link href="<?=base_url('assets/css/style.css')?>" rel="stylesheet">
	<title></title>
</head>
<body class="attanBg">
	
		
				<?php 
					//print_r($gruppa_n);
				$tomorrow = $first_day;
				$time = strtotime($tomorrow);
				$month   = date( 'm',$time );
				$number_atanding = date('N',$time);

				$number = date('N',$time);////Number of day in week
				$day  = date( 'd',$time );
				$year = date('Y',$time);

				



				if($number_atanding%2==0)
				{
					$lesson_dni='Вт/Чт/Сб';
				}
				else
				{
					$lesson_dni='Пн/Ср/Пт';
				}
				//echo ($month);
				$m = array(
								 11 => 'Январь',
								 12 => 'Февраль',
								 13 => 'Март',
								 14 => 'Апрель',
								 15 => 'Май',
								 16 => 'Июнь',
								 17 => 'Июль',
								 18 => 'Август',
								 
								 19 => 'Сентябрь',
								 20 => 'Октябрь',
								 21 => 'Ноябрь',
								 22 => 'Декабрь'
							);
				$name_current_month=$m[$month+10];
				//print_r($m[$month+10]);
				if($month==12)
				{
					//$month==0;
					$name_next_month=$m[11];
				}
				//print_r($month);
				else
				{
					$name_next_month=$m[$month+11];

				}
				//echo ($name_next_month);
				$t_first = mb_substr($gruppa_n['time'],0,2, 'UTF-8');//первая буква
				$t_second = mb_substr($gruppa_n['time'],2,2, 'UTF-8');//первая буква
				
				?>

				<h4>Группа <?=$gruppa_n['namegroup']?> <?=$t_first.':'.$t_second?> <input type="text" class="ucheb_dni" value="<?=$lesson_dni?>"><?=$name_current_month?>-<?=$name_next_month?><input type="text" class="kabinet">
				&nbsp; &nbsp; &nbsp; Please, write the number of lessons!!!
				</h4>
<section class="attanding_list">
					<table class="attanding">
						<thead>
							<tr>
								<td></td>
								<td id="bookname">Book № 
									<?php
										if($gruppa_n['level']==1 || $gruppa_n['level']==2)
										{
											?>
												&nbsp;<?=$gruppa_n['level']?>
											<?
										}
										else
										{
											?>
													<input type="text" class="book">
											<?php
										}
									?>
									
								</td>
								<?php
									for ($i=0; $i <21 ; $i++) 
									{ 
								?>
									<td></td>	
								<?php		
									}
								?>
							</tr>
							<tr>
								<td></td>
								<td >Lesson №</td>
								
								<?php
									for ($i=0; $i <21 ; $i++) 
									{ 
										if($number%2==0)
										{
											//$first_day=date("d-m-Y",$first_day);
											
											for ($i=0; $i <47 ; $i++) 
											{
												//echo "$first_day";
												//$tomorrow = date("$first_day",mktime(0, 0, 0,date("m"), date("d")+$i,  date("Y")));
												
												$timeChet = strtotime($tomorrow)+(86400*$i);
												//echo $tomorrow;
												$dayChet  = date( 'd',$timeChet );//Number of day
												$monthChet   = date( 'm',$timeChet );
												$numberChet = date('N',$timeChet);////Number of day in week
												$yearChet = date('Y',$timeChet);
												//checkdate( $first_day);
												

												if($numberChet%2==0)
												{
													$keyChet = array_search(date('d-m-Y',$timeChet), array_column($lessonNumbers,'dateAdd'));
													if($keyChet>-1)
													{
														?>

														<td class="center"><?=$lessonNumbers[$keyChet]['lesson']?></td>
														<?
													}
													else
													{
														?>
													<td ></td>
														<?php
													}
												
												}
											}

										}
										else
										{
											for ($i=0; $i <47 ; $i++) 
											{
												//$keyNechet='';
												$timeNechet = strtotime($tomorrow)+(86400*$i);
												//echo $tomorrow;
												$dayNechet  = date( 'd',$timeNechet );//Number of day
												$monthNechet   = date( 'm',$timeNechet );
												$numberNechet = date('N',$timeNechet);////Number of day in week
												$yearNechet = date('Y',$timeNechet);
												
												if($numberNechet==1 || $numberNechet==3 || $numberNechet==5)
												{
													$keyNechet = array_search(date('d-m-Y',$timeNechet), array_column($lessonNumbers, 'dateAdd'));
													// echo(date('d-m-Y',$timeNechet));
													//echo($keyNechet);
													//$keyNechet='';
													// echo($lessonNumbers[$keyNechet]['dateAdd']);
													if($keyNechet>-1)
													{
														?>

														<td class="center"><?=$lessonNumbers[$keyNechet]['lesson']?></td>
														<?php
													}
													else
													{
														?>
													<td ></td>
														<?php
													}
												
												}
												// else
												// {

												// }
											}
										}
									
								?>
									
								<?php		
									}
								?>
							</tr>
							<tr>
								<td>№</td>
								<td>DATE</td>
								<?php
								$dni_obuch=array();
										
										//echo ($year   );
										//$first_day = new DateTime('$day-$month-$year');
										//$date = new DateTime('$year-$month-$day');
										//$date = setDate(2015,09,22);
										//echo $date->format('d-m-Y') . "\n";
										//$first_day = date('$day-$month-$year');
										//$tomorrow = date("$first_day",mktime(0, 0, 0,date("m"), date("d")+1,  date("Y")));
										 //$first_day=strtotime($first_day);
										////echo ($first_day);
										//$time=strtotime(date("23-09-2015"));
										//echo ($time);
										if($number%2==0)
										{
											//$first_day=date("d-m-Y",$first_day);
											
											for ($i=0; $i <47 ; $i++) 
											{
												//echo "$first_day";
												//$tomorrow = date("$first_day",mktime(0, 0, 0,date("m"), date("d")+$i,  date("Y")));
												
												$time = strtotime($tomorrow)+(86400*$i);
												//echo $tomorrow;
												$day  = date( 'd',$time );//Number of day
												$month   = date( 'm',$time );
												$number = date('N',$time);////Number of day in week
												//checkdate( $first_day);
												

												if($number%2==0)
												{
													$dni_obuch[]=$day.'.'.$month;
												?>
													<td class="center"><?=$day?></td>
												<?php
												}
											}

										}
										else
										{
											for ($i=0; $i <47 ; $i++) 
											{
												$time = strtotime($tomorrow)+(86400*$i);
												//echo $tomorrow;
												$day  = date( 'd',$time );//Number of day
												$month   = date( 'm',$time );
												$number = date('N',$time);////Number of day in week
												if($number==1 || $number==3 || $number==5)
												{
													$dni_obuch[]=$day.'.'.$month;
												?>
													<td class="center"><?=$day?></td>
												<?php
												}
												else
												{

												}
											}
										}
									//print_r($dni_obuch);
										//print_r($student_sp);
										//echo "<br/>";
										//print_r($student_opl);
								?>
							</tr>
						</thead>
						<?php
								//print_r($dni_obuch);
								//echo("<br/>");
								///print_r("<pre>");
								///print_r($student_opl);
								//print_r("</pre>");

								$a=$student_opl;
								for($i=0;$i<count($a);$i++)
								{
									$time_del = strtotime($student_opl[$i]['last_date_lesson']);
									$time_del2 = strtotime($tomorrow);
									//echo (date('d',$time_del));
									if($time_del<$time_del2)
									{
										unset($student_opl[$i]);
										unset($student_sp[$i]);

									}
								}
								$new_array = array();
								$i = 0;
								foreach ($student_opl as $val)  
								{
								  $new_array[$i] = $val;
								  ++$i;
								}
								$student_opl=$new_array;

								//print_r($dni_obuch);
								//$t_first = mb_substr($gruppa_n['time'],0,2, 'UTF-8');//первая буква
								//$t_second = mb_substr($gruppa_n['time'],2,2, 'UTF-8');//первая буква
								$next_day_41=strtotime($tomorrow)+(86400*41);
								$year_next_41 = date('Y',$next_day_41);
								//echo($year_next_41);
								//print_r($student_opl);
								$proverka=0;
								for ($j=0; $j <count($student_opl) ; $j++) 
								{ 
									//echo($student_opl[$j]['last_date_lesson']);
										for ($i=1; $i <count($dni_obuch) ; $i++) 
									{ 
										$obuch_dni_first = mb_substr($dni_obuch[$i-1],0,2, 'UTF-8');//первая буква
										$obuch_dni_second = mb_substr($dni_obuch[$i-1],3,2, 'UTF-8');//первая буква
										//echo "</br>";
										//echo ($obuch_dni_first);
										//echo ($obuch_dni_second);
										//echo ($year);
										$obuch_dni_first2 = mb_substr($dni_obuch[$i],0,2, 'UTF-8');//первая буква
										$obuch_dni_second2 = mb_substr($dni_obuch[$i],3,2, 'UTF-8');//первая буква
										
										if($obuch_dni_first==01 && $obuch_dni_second==01)
										{
											if($proverka==0)
											{
												$year=$year+1;
												$proverka++;
											}
											else
											{
												//$year=$year;
											}
											
										}
										if($obuch_dni_first2==01 && $obuch_dni_second2==01)
										{
											//$year=$year+1;
										}
										
										$new_day2=$obuch_dni_first.'-'.$obuch_dni_second.'-'.$year;
										$new_day=strtotime($new_day2);
										//echo($new_day2);
										//echo "</br>";
										$new_day3=$obuch_dni_first2.'-'.$obuch_dni_second2.'-'.$year;
										$new_day4=strtotime($new_day3);
										$st_opl=strtotime($student_opl[$j]['last_date_lesson']);
										//echo(date("d-m-Y",$st_opl));
										//echo ($st_opl);
											//echo (date("d-m-Y",$new_day));
											//echo (date("d-m-Y",$new_day4));
											//echo "</br>";
										if($st_opl>$new_day && $st_opl<$new_day4)
										{

											//echo ($st_opl);
											//echo (date("d-m-Y",$new_day));
											//echo (date("d-m-Y",$new_day4));
											//echo "</br>";

											$student_opl[$j]['last_date_lesson']=date("d-m-Y",$new_day4);
										}
										//echo "</br>";
										//echo (date('d',$new_day));
										//echo (date('d',$new_day4));
										
									}
								}
								
								
								
						?>
						<tbody > 
							<?php 
							$k=0; 
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
							//print_r($dni_obuch);
							foreach ($student_sp as $item):
							$k++;
							$clDan='';
	if($item['infoOpl']<$kolS)
	{
		$clDan='redNot';
	}
							?>
							<tr >
								<td>
									<?=$k;?>		
								</td>
								<td  class="<?=$clDan?>">
									<?php 
									$name = $item['fio'];
								    //$name = iconv("UTF-8", "UTF-8", $name);

								    $first = mb_substr($name,0,1, 'UTF-8');//первая буква
								    $last = mb_substr($name,1);//все кроме первой буквы
								    $first = mb_strtoupper($first, 'UTF-8');
								    $last = mb_strtolower($last, 'UTF-8');
								    $item['fio'] = $first.$last;
								    ?>
								    <?=$item['fio']?> 
								</td>
								
								<?php
								$kol_dni=0;
								$time = strtotime($student_opl[$k-1]['last_date_lesson']);
								$day  = date( 'd',$time );//Number of day
								$month   = date( 'm',$time );
								$number = date('N',$time);
								//echo ($day.'.'.$month);
								$day_end_lesson=$day.'.'.$month;
								//echo ($day_end_lesson);
								$nedopusk=25;
								//echo ($day_end_lesson);
								for ($i=0; $i <count($dni_obuch) ; $i++) 
								{ 
									if($day_end_lesson==$dni_obuch[$i])
									{
										$nedopusk=$i+1;
										//echo "string";
										//echo ($nedopusk);
									}
									else
									{

									}
								}
								//echo ($nedopusk);
								for ($i=0; $i <21 ; $i++) 
								{ 
									if($nedopusk==$i)
									{
										$nedopusk==25;
								?>
										<td>нд</td>

								<?php		

									}
									//$kol_dni++;
									else
									{


								?>
										<td></td>
								<?php
									}
								}

								?>
							</tr>
						<?php endforeach;
							//print_r($dni_obuch);
							//echo "</br>";
							//echo "</br>";
							//print_r($day_end_lesson);
						?>
					</tbody>



				</table>
</section>
	</body>
	</html>