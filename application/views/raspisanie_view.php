<?php
	print_r("<pre>");
	//print_r($teacher_spisok);
	print_r("</pre>");
?>
<div class="col-md-12">
	<div class="">
		<form action="<?=base_url()?>index.php/raspisanie" method="post">
			<input type="text" id="first_date_lesson" name="day">
			<input type="submit" class="btn btn-primary" name="show" value="Показать">
		</form>
		

	</div>
	<div class="">
			<p><?=$first_day?>года <?=$second_day?>года</p>
			
			<?php 
				//echo ($original_first_day);
			?>
	</div>
	<div class="attanding_list">
	<form action="<?=base_url()?>index.php/raspisanie/save" method="post" id="raspisanie_send">
		
	<input type="hidden" value="<?=$original_first_day?>" name="original_day">
		<table class="">
			<thead>
				<th>
					Время
				</th>
				<th>
					Понидельник <?=$day_kol[0]?><br/>
					Monday
				</th>
				<th>
					Вторник <?=$day_kol[1]?><br/>
					Tuesday
				</th>
				<th>
					Среда <?=$day_kol[2]?><br/>
					Wednesday
				</th>
				<th>
					Четверг <?=$day_kol[3]?><br/>
					Thursday
				</th>
				<th>
					Пятница <?=$day_kol[4]?><br/>
					Friday
				</th>
				<th>
					Суббота <?=$day_kol[5]?><br/>
					Saturday
				</th>
				
			</thead>
			<tbody> 
				<tr class="">
					<td class="vremya">7:30 - 8:45 </td>

					<?php
						//print_r($gruppat[0]);
					
						for ($i=0; $i <6 ; $i++) 
						{ 
					?>
							<td class="mtd1">
								<div id="p1<?=$i?>" class="p1<?=$i?> div_main">
								<?php
									if($i==0 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='p1')
											{
									?>
												<p name="p1<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="1<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>" name="p1<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==1 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='v1')
											{
									?>
												<p name="p1<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="1<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p1<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==2 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='s1')
											{
									?>
												<p name="p1<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="1<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p1<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==3 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='ch1')
											{
									?>
												<p name="p1<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="1<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p1<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==4 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='pt1')
											{
									?>
												<p name="p1<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="1<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p1<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==5 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='st1')
											{
									?>
												<p name="p1<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="1<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p1<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								</div>
								<div id="div1<?=$i?>" class="hidden lesson_day" >
									
									<select  name="gruppa" id="g1<?=$i?>" class="selectg">
										<option value=""></option>	
										<?php

											
												$string=$gruppat[0][0]['time'];
												//echo $string;
												$string2=substr($string, 0,2);
												$string3=substr($string, 2);
												
												$string=$string2.':'.$string3;
											?>

											<option value="" class="bg-primary opt"><?=$string?></option>
												<?php foreach ($gruppat[0] as $item):?>
												    <option value="<?=$item['namegroup']?>"><?=$item['namegroup']?></option>
												<?php endforeach;?>
											<?php
											
											if(isset($gruppaindi))
											{
												?>
													<option value="" class="bg-primary opt">Индивидуальные</option>
													<?php foreach ($gruppaindi as $item):?>
												    <option value="<?=$item['namegroup']?>"><?=$item['namegroup']?></option>
													<?php endforeach;?>
												<?php
											}
											?>
											
									</select>

									<select name="teacher" id="t1<?=$i?>">

										<option value=""></option>
										<?php 
											foreach ($teacher_spisok as $key): 
										?>
												<option value="<?=$key['name']?>"><?=$key['name']?></option>
										<?php
											endforeach;
										?>
										
									</select>
									<img src="" id="1<?=$i?>" alt="Добавить" class="btn btn-primary">
									<b id="1<?=$i?>" class="btn btn-danger">Скрыть</b>
								</div>
								<div id="i1<?=$i?>" class="show">
									<i id="1<?=$i?>" class="btn btn-info bt_i">+</i>
								</div>
								
							
								
							</td>
					<?php
						}
					?>
				</tr>
				<tr>
					<td class="vremya">8:45 - 10:05 </td>
					<?php
						//print_r($gruppat[0]);
					
						for ($i=0; $i <6 ; $i++) 
						{ 
					?>
							<td class="mtd1">
								<div id="p2<?=$i?>" class="div_main" >
								<?php
									if($i==0 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='p2')
											{
									?>
												<p name="p2<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="2<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>" name="p2<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==1 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='v2')
											{
									?>
												<p name="p2<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="2<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p2<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==2 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='s2')
											{
									?>
												<p name="p2<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="2<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p2<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==3 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='ch2')
											{
									?>
												<p name="p2<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="2<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p2<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==4 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='pt2')
											{
									?>
												<p name="p2<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="2<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p2<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==5 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='st2')
											{
									?>
												<p name="p2<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="2<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p2<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								</div>
								<div id="div2<?=$i?>" class="hidden">
									
									<select  name="gruppa" id="g2<?=$i?>" class="selectg">
										<option value=""></option>	
										<?php

											
												$string=$gruppat[1][0]['time'];
												//echo $string;
												$string2=substr($string, 0,2);
												$string3=substr($string, 2);
												
												$string=$string2.':'.$string3;
											?>

											<option value="" class="bg-primary opt"><?=$string?></option>
												<?php foreach ($gruppat[1] as $item):?>
												    <option value="<?=$item['namegroup']?>"><?=$item['namegroup']?></option>
												<?php endforeach;?>
											<?php
											
											if(isset($gruppaindi))
											{
												?>
													<option value="" class="bg-primary opt">Индивидуальные</option>
													<?php foreach ($gruppaindi as $item):?>
												    <option value="<?=$item['namegroup']?>"><?=$item['namegroup']?></option>
													<?php endforeach;?>
												<?php
											}
											?>
											
									</select>

									<select name="teacher" id="t2<?=$i?>">

										<option value=""></option>
										<?php 
											foreach ($teacher_spisok as $key): 
										?>
												<option value="<?=$key['name']?>"><?=$key['name']?></option>
										<?php
											endforeach;
										?>
										
									</select>
									</br>
									<img src="" id="2<?=$i?>" alt="Добавить" class="btn btn-primary"><b id="2<?=$i?>" class="btn btn-danger">Скрыть</b>
								</div>
								<div id="i2<?=$i?>" class="show">
									<i id="2<?=$i?>" class="btn btn-info bt_i">+</i>
								</div>
								
							
								
							</td>
					<?php	
						}
					?>
				</tr>
				<tr>
					<td class="vremya">10:05 - 11:25  </td>
					<?php
						//print_r($gruppat[0]);
					
						for ($i=0; $i <6 ; $i++) 
						{ 
					?>
							<td class="mtd1">
								<div id="p3<?=$i?>" class="div_main">
								<?php
									if($i==0 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='p3')
											{
									?>
												<p name="p3<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="3<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>" name="p3<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==1 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='v3')
											{
									?>
												<p name="p3<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="3<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p3<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==2 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='s3')
											{
									?>
												<p name="p3<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="3<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p3<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==3 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='ch3')
											{
									?>
												<p name="p3<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="3<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p3<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==4 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='pt3')
											{
									?>
												<p name="p3<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="3<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p3<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==5 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='st3')
											{
									?>
												<p name="p3<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="3<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p3<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								</div>
								<div id="div3<?=$i?>" class="hidden">
									
									<select  name="gruppa" id="g3<?=$i?>" class="selectg">
										<option value=""></option>	
										<?php

											
												$string=$gruppat[2][0]['time'];
												//echo $string;
												$string2=substr($string, 0,2);
												$string3=substr($string, 2);
												
												$string=$string2.':'.$string3;
											?>

											<option value="" class="bg-primary opt"><?=$string?></option>
												<?php foreach ($gruppat[2] as $item):?>
												    <option value="<?=$item['namegroup']?>"><?=$item['namegroup']?></option>
												<?php endforeach;?>
											<?php
											
											if(isset($gruppaindi))
											{
												?>
													<option value="" class="bg-primary opt">Индивидуальные</option>
													<?php foreach ($gruppaindi as $item):?>
												    <option value="<?=$item['namegroup']?>"><?=$item['namegroup']?></option>
													<?php endforeach;?>
												<?php
											}
											?>
											
									</select>

									<select name="teacher" id="t3<?=$i?>">

										<option value=""></option>
										<?php 
											foreach ($teacher_spisok as $key): 
										?>
												<option value="<?=$key['name']?>"><?=$key['name']?></option>
										<?php
											endforeach;
										?>
										
									</select>
									</br>
									<img src="" id="3<?=$i?>" alt="Добавить" class="btn btn-primary"><b id="3<?=$i?>" class="btn btn-danger">Скрыть</b>
								</div>
								<div id="i3<?=$i?>" class="show">
									<i id="3<?=$i?>" class="btn btn-info bt_i">+</i>
								</div>
								
							
								
							</td>
					<?php	
						}
					?>
				</tr>
				<tr>
					<td class="vremya">11:25 - 12:45 </td>
					<?php
						//print_r($gruppat[0]);
					
						for ($i=0; $i <6 ; $i++) 
						{ 
					?>
							<td class="mtd1">
								<div id="p4<?=$i?>" class="div_main">
								<?php
									if($i==0 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='p4')
											{
									?>
												<p name="p4<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="4<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>" name="p4<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==1 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='v4')
											{
									?>
												<p name="p4<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="4<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p4<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==2 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='s4')
											{
									?>
												<p name="p4<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="4<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p4<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==3 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='ch4')
											{
									?>
												<p name="p4<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="4<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p4<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==4 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='pt4')
											{
									?>
												<p name="p4<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="4<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p4<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==5 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='st4')
											{
									?>
												<p name="p4<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="4<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p4<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								</div>
								<div id="div4<?=$i?>" class="hidden"> 
									
									<select  name="gruppa" id="g4<?=$i?>" class="selectg">
										<option value=""></option>	
										<?php

											
												$string=$gruppat[3][0]['time'];
												//echo $string;
												$string2=substr($string, 0,2);
												$string3=substr($string, 2);
												
												$string=$string2.':'.$string3;
											?>

											<option value="" class="bg-primary opt"><?=$string?></option>
												<?php foreach ($gruppat[3] as $item):?>
												    <option value="<?=$item['namegroup']?>"><?=$item['namegroup']?></option>
												<?php endforeach;?>
											<?php
											
											if(isset($gruppaindi))
											{
												?>
													<option value="" class="bg-primary opt">Индивидуальные</option>
													<?php foreach ($gruppaindi as $item):?>
												    <option value="<?=$item['namegroup']?>"><?=$item['namegroup']?></option>
													<?php endforeach;?>
												<?php
											}
											?>
											
									</select>

									<select name="teacher" id="t4<?=$i?>">

										<option value=""></option>
										<?php 
											foreach ($teacher_spisok as $key): 
										?>
												<option value="<?=$key['name']?>"><?=$key['name']?></option>
										<?php
											endforeach;
										?>
										
									</select>
									</br>
									<img src="" id="4<?=$i?>" alt="Добавить" class="btn btn-primary"><b id="4<?=$i?>" class="btn btn-danger">Скрыть</b>
								</div>
								<div id="i4<?=$i?>" class="show">
									<i id="4<?=$i?>" class="btn btn-info bt_i">+</i>
								</div>
								
							
								
							</td>
					<?php	
						}
					?>
				</tr>
				<tr>
					<td class="vremya">12:45 - 13:40 </td>
					<?php
						//print_r($gruppat[0]);
					
						for ($i=0; $i <6 ; $i++) 
						{ 
					?>
							<td class="mtd1">
								<div id="p5<?=$i?>" class="div_main">
								<?php
									if($i==0 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='p5')
											{
									?>
												<p name="p5<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="5<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>" name="p5<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==1 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='v5')
											{
									?>
												<p name="p5<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="5<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p5<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==2 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='s5')
											{
									?>
												<p name="p5<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="5<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p5<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==3 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='ch5')
											{
									?>
												<p name="p5<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="5<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p5<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==4 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='pt5')
											{
									?>
												<p name="p5<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="5<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p5<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==5 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='st5')
											{
									?>
												<p name="p5<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="5<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p5<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								</div>
								<div id="div5<?=$i?>" class="hidden">
									
									<select  name="gruppa" id="g5<?=$i?>" class="selectg">
										
											<?php
											
											if(isset($gruppaindi))
											{
												?>
													<option value=""></option>
													<option value="" class="bg-primary opt">Индивидуальные</option>
													<?php foreach ($gruppaindi as $item):?>
												    <option value="<?=$item['namegroup']?>"><?=$item['namegroup']?></option>
													<?php endforeach;?>
												<?php
											}
											?>
											
									</select>

									<select name="teacher" id="t5<?=$i?>">

										<option value=""></option>
										<?php 
											foreach ($teacher_spisok as $key): 
										?>
												<option value="<?=$key['name']?>"><?=$key['name']?></option>
										<?php
											endforeach;
										?>
										
									</select>
									</br>
									<img src="" id="5<?=$i?>" alt="Добавить" class="btn btn-primary"><b id="5<?=$i?>" class="btn btn-danger">Скрыть</b>
								</div>
								<div id="i5<?=$i?>" class="show">
									<i id="5<?=$i?>" class="btn btn-info bt_i">+</i>
								</div>
							
								
							</td>
					<?php	
						}
					?>
				</tr>
				<tr>
					<td class="vremya">13:40 - 15:00 </td>
					<?php
						//print_r($gruppat[0]);
					
						for ($i=0; $i <6 ; $i++) 
						{ 
					?>
							<td class="mtd1">
								<div id="p6<?=$i?>" class="div_main">
								<?php
									if($i==0 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='p6')
											{
									?>
												<p name="p6<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="6<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>" name="p6<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==1 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='v6')
											{
									?>
												<p name="p6<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="6<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p6<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==2 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='s6')
											{
									?>
												<p name="p6<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="6<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p6<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==3 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='ch6')
											{
									?>
												<p name="p6<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="6<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p6<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==4 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='pt6')
											{
									?>
												<p name="p6<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="6<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p6<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==5 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='st6')
											{
									?>
												<p name="p6<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="6<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p6<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								</div>
								<div id="div6<?=$i?>" class="hidden">
									
									<select  name="gruppa" id="g6<?=$i?>" class="selectg">
										<option value=""></option>
										<?php

											
												$string=$gruppat[4][0]['time'];
												//echo $string;
												$string2=substr($string, 0,2);
												$string3=substr($string, 2);
												
												$string=$string2.':'.$string3;
											?>

											<option value="" class="bg-primary opt"><?=$string?></option>
												<?php foreach ($gruppat[4] as $item):?>
												    <option value="<?=$item['namegroup']?>"><?=$item['namegroup']?></option>
												<?php endforeach;?>
											<?php
											
											if(isset($gruppaindi))
											{
												?>
													
													<option value="" class="bg-primary opt">Индивидуальные</option>
													<?php foreach ($gruppaindi as $item):?>
												    <option value="<?=$item['namegroup']?>"><?=$item['namegroup']?></option>
													<?php endforeach;?>
												<?php
											}
											?>
											
									</select>

									<select name="teacher" id="t6<?=$i?>">

										<option value=""></option>
										<?php 
											foreach ($teacher_spisok as $key): 
										?>
												<option value="<?=$key['name']?>"><?=$key['name']?></option>
										<?php
											endforeach;
										?>
										
									</select>
									</br>
									<img src="" id="6<?=$i?>" alt="Добавить" class="btn btn-primary"><b id="6<?=$i?>" class="btn btn-danger">Скрыть</b>
								</div>
								<div id="i6<?=$i?>" class="show">
									<i id="6<?=$i?>" class="btn btn-info bt_i">+</i>
								</div>
								
							
								
							</td>
					<?php	
						}
					?>
				</tr>
				<tr>
					<td class="vremya">15:00 - 16:20 </td>
					<?php
						//print_r($gruppat[0]);
					
						for ($i=0; $i <6 ; $i++) 
						{ 
					?>
							<td class="mtd1">
								<div id="p7<?=$i?>" class="div_main">
								<?php
									if($i==0 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='p7')
											{
									?>
												<p name="p7<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="7<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>" name="p7<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==1 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='v7')
											{
									?>
												<p name="p7<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="7<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p7<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==2 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='s7')
											{
									?>
												<p name="p7<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="7<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p7<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==3 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='ch7')
											{
									?>
												<p name="p7<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="7<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p7<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==4 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='pt7')
											{
									?>
												<p name="p7<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="7<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p7<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==5 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='st7')
											{
									?>
												<p name="p7<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="7<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p7<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								</div>
								<div id="div7<?=$i?>" class="hidden">
									
									<select  name="gruppa" id="g7<?=$i?>" class="selectg">
										<option value=""></option>
										<?php

											
												$string=$gruppat[5][0]['time'];
												//echo $string;
												$string2=substr($string, 0,2);
												$string3=substr($string, 2);
												
												$string=$string2.':'.$string3;
											?>

											<option value="" class="bg-primary opt"><?=$string?></option>
												<?php foreach ($gruppat[5] as $item):?>
												    <option value="<?=$item['namegroup']?>"><?=$item['namegroup']?></option>
												<?php endforeach;?>
											<?php
											
											if(isset($gruppaindi))
											{
												?>
													
													<option value="" class="bg-primary opt">Индивидуальные</option>
													<?php foreach ($gruppaindi as $item):?>
												    <option value="<?=$item['namegroup']?>"><?=$item['namegroup']?></option>
													<?php endforeach;?>
												<?php
											}
											?>
											
									</select>

									<select name="teacher" id="t7<?=$i?>">

										<option value=""></option>
										<?php 
											foreach ($teacher_spisok as $key): 
										?>
												<option value="<?=$key['name']?>"><?=$key['name']?></option>
										<?php
											endforeach;
										?>
										
									</select>
									</br>
									<img src="" id="7<?=$i?>" alt="Добавить" class="btn btn-primary"><b id="7<?=$i?>" class="btn btn-danger">Скрыть</b>
								</div>
								<div id="i7<?=$i?>" class="show">
									<i id="7<?=$i?>" class="btn btn-info bt_i">+</i>
								</div>
								
							
								
							</td>
					<?php	
						}
					?>
				</tr>
				<tr>
					<td class="vremya">16:20 - 17:40 </td>
					<?php
						//print_r($gruppat[0]);
					
						for ($i=0; $i <6 ; $i++) 
						{ 
					?>
							<td class="mtd1">
								<div id="p8<?=$i?>" class="div_main">
								<?php
									if($i==0 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='p8')
											{
									?>
												<p name="p8<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="8<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>" name="p8<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==1 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='v8')
											{
									?>
												<p name="p8<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="8<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p8<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==2 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='s8')
											{
									?>
												<p name="p8<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="8<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p8<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==3 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='ch8')
											{
									?>
												<p name="p8<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="8<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p8<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==4 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='pt8')
											{
									?>
												<p name="p8<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="8<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p8<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==5 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='st8')
											{
									?>
												<p name="p8<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="8<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p8<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								</div>
								<div id="div8<?=$i?>" class="hidden">
									
									<select  name="gruppa" id="g8<?=$i?>" class="selectg">
										<option value=""></option>
										<?php

											
												$string=$gruppat[6][0]['time'];
												//echo $string;
												$string2=substr($string, 0,2);
												$string3=substr($string, 2);
												
												$string=$string2.':'.$string3;
											?>

											<option value="" class="bg-primary opt"><?=$string?></option>
												<?php foreach ($gruppat[6] as $item):?>
												    <option value="<?=$item['namegroup']?>"><?=$item['namegroup']?></option>
												<?php endforeach;?>
											<?php
											
											if(isset($gruppaindi))
											{
												?>
													
													<option value="" class="bg-primary opt">Индивидуальные</option>
													<?php foreach ($gruppaindi as $item):?>
												    <option value="<?=$item['namegroup']?>"><?=$item['namegroup']?></option>
													<?php endforeach;?>
												<?php
											}
											?>
											
									</select>

									<select name="teacher" id="t8<?=$i?>">

										<option value=""></option>
										<?php 
											foreach ($teacher_spisok as $key): 
										?>
												<option value="<?=$key['name']?>"><?=$key['name']?></option>
										<?php
											endforeach;
										?>
										
									</select>
									</br>
									<img src="" id="8<?=$i?>" alt="Добавить" class="btn btn-primary"><b id="8<?=$i?>" class="btn btn-danger">Скрыть</b>
								</div>
								<div id="i8<?=$i?>" class="show">
									<i id="8<?=$i?>" class="btn btn-info bt_i">+</i>
								</div>
								
							
								
							</td>
					<?php	
						}
					?>
				</tr>
				<tr>
					<td class="vremya">17:40 - 19:00 </td>
					<?php
						//print_r($gruppat[0]);
					
						for ($i=0; $i <6 ; $i++) 
						{ 
					?>
							<td class="mtd1">
								<div id="p9<?=$i?>" class="div_main">
								<?php
									if($i==0 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='p9')
											{
									?>
												<p name="p9<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"s><?=$raspisanie_days[$p]['teacher']?></b><span id="9<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>" name="p9<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==1 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='v9')
											{
									?>
												<p name="p9<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"s><?=$raspisanie_days[$p]['teacher']?></b><span id="9<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p9<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==2 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='s9')
											{
									?>
												<p name="p9<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"s><?=$raspisanie_days[$p]['teacher']?></b><span id="9<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p9<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==3 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='ch9')
											{
									?>
												<p name="p9<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"s><?=$raspisanie_days[$p]['teacher']?></b><span id="9<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p9<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==4 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='pt9')
											{
									?>
												<p name="p9<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"s><?=$raspisanie_days[$p]['teacher']?></b><span id="9<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p9<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==5 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='st9')
											{
									?>
												<p name="p9<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"s><?=$raspisanie_days[$p]['teacher']?></b><span id="9<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p9<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								</div>
								<div id="div9<?=$i?>" class="hidden">
									
									<select  name="gruppa" id="g9<?=$i?>" class="selectg">
										<option value=""></option>
										<?php

											
												$string=$gruppat[7][0]['time'];
												//echo $string;
												$string2=substr($string, 0,2);
												$string3=substr($string, 2);
												
												$string=$string2.':'.$string3;
											?>

											<option value="" class="bg-primary opt"><?=$string?></option>
												<?php foreach ($gruppat[7] as $item):?>
												    <option value="<?=$item['namegroup']?>"><?=$item['namegroup']?></option>
												<?php endforeach;?>
											<?php
											
											if(isset($gruppaindi))
											{
												?>
													
													<option value="" class="bg-primary opt">Индивидуальные</option>
													<?php foreach ($gruppaindi as $item):?>
												    <option value="<?=$item['namegroup']?>"><?=$item['namegroup']?></option>
													<?php endforeach;?>
												<?php
											}
											?>
											
									</select>

									<select name="teacher" id="t9<?=$i?>">

										<option value=""></option>
										<?php 
											foreach ($teacher_spisok as $key): 
										?>
												<option value="<?=$key['name']?>"><?=$key['name']?></option>
										<?php
											endforeach;
										?>
										
									</select>
									</br>
									<img src="" id="9<?=$i?>" alt="Добавить" class="btn btn-primary"><b id="9<?=$i?>" class="btn btn-danger">Скрыть</b>
								</div>
								<div id="i9<?=$i?>" class="show">
									<i id="9<?=$i?>" class="btn btn-info bt_i">+</i>
								</div>
								
							
								
							</td>
					<?php	
						}
					?>
				</tr>
				<tr>
					<td class="vremya">19:00 - 20:20 </td>
					<?php
						//print_r($gruppat[0]);
					
						for ($i=0; $i <6 ; $i++) 
						{ 
					?>
							<td class="mtd1">
								<div id="p10<?=$i?>" class="div_main">
								<?php
									if($i==0 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='p10')
											{
									?>
												<p name="p10<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="10<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>" name="p10<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==1 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='v10')
											{
									?>
												<p name="p10<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="10<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p10<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==2 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='s10')
											{
									?>
												<p name="p10<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="10<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p10<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==3 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='ch10')
											{
									?>
												<p name="p10<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="10<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p10<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==4 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='pt10')
											{
									?>
												<p name="p10<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="10<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p10<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								<?php
									if($i==5 && count($raspisanie_days)>0)
									{
										for ($p=0; $p <count($raspisanie_days) ; $p++) 
										{ 
											if($raspisanie_days[$p]['id_den']=='st10')
											{
									?>
												<p name="p10<?=$i?><?=$p?>" class="<?=$raspisanie_days[$p]['nomer_gr']?>"><input type="text" class="dobavok" value="<?=$raspisanie_days[$p]['gruppa']?>"><b class="raspisanie_teacher"><?=$raspisanie_days[$p]['teacher']?></b><span id="10<?=$i?>" class="<?=$raspisanie_days[$p]['nomer_tr']?>"  name="p10<?=$i?><?=$p?>">X</span></p>
									<?php
											}
										}
									}
								?>
								</div>
								<div id="div10<?=$i?>" class="hidden">
									
									<select  name="gruppa" id="g10<?=$i?>" class="selectg">
										<option value=""></option>
										<?php

											
												$string=$gruppat[8][0]['time'];
												//echo $string;
												$string2=substr($string, 0,2);
												$string3=substr($string, 2);
												
												$string=$string2.':'.$string3;
											?>

											<option value="" class="bg-primary opt"><?=$string?></option>
												<?php foreach ($gruppat[8] as $item):?>
												    <option value="<?=$item['namegroup']?>"><?=$item['namegroup']?></option>
												<?php endforeach;?>
											<?php
											
											if(isset($gruppaindi))
											{
												?>
													
													<option value="" class="bg-primary opt">Индивидуальные</option>
													<?php foreach ($gruppaindi as $item):?>
												    <option value="<?=$item['namegroup']?>"><?=$item['namegroup']?></option>
													<?php endforeach;?>
												<?php
											}
											?>
											
									</select>

									<select name="teacher" id="t10<?=$i?>">

										<option value=""></option>
										<?php 
											foreach ($teacher_spisok as $key): 
										?>
												<option value="<?=$key['name']?>"><?=$key['name']?></option>
										<?php
											endforeach;
										?>
										
									</select>
									</br>
									<img src="" id="10<?=$i?>" alt="Добавить" class="btn btn-primary"><b id="10<?=$i?>" class="btn btn-danger">Скрыть</b>
								</div>
								<div id="i10<?=$i?>" class="show">
									<i id="10<?=$i?>" class="btn btn-info bt_i">+</i>
								</div>
								
							
								
							</td>
					<?php	
						}
					?>
				</tr>
			</tbody>
		</table>
		<br/>
		<br/>

		<input type="submit" id="ras_send" name='save' class="btn btn-primary" value="Сохранить">&nbsp;<a href="<?base_url()?>raspisanie/printer/<?=$original_first_day?>" class="btn btn-info" target="_blank">Print</a>
		<a href="<?base_url()?>raspisanie/teacher_printer/<?=$original_first_day?>" class="btn btn-info" target="_blank">Расписание для учителей</a>
		<a href="<?base_url()?>raspisanie/teachers" class="btn btn-info" >Учителя</a>
		<br/>
		<br/>
	</form>
	</div>
</div>