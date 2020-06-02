 <div class="row">
 	<div class="col-md-9">
 		<?php
			$segments = array('edit', 'edit_student', $student_info['stid']);
			?>

 		<br>
 		<br>
 		<form action="<?= site_url($segments) ?>" method="post">
 			<table class="table table-striped table-bordered table-hover">
 				<thead>
 					<th>
 						#
 					</th>
 					<th>
 						ФИО
 					</th>
 					<th>
 						Группа
 					</th>
 					<th>
 						Телефон
 					</th>
 					<th>
 						Email
 					</th>
 					<th>Доп.информация</th>

 					<?php
						if ($student_info['dop_oplata'] != '') {
							?>
 						<th>Доп.оплата</th>
 					<?php
						}
						?>
 				</thead>
 				<tbody>
 					<tr>
 						<td></td>
 						<td>
 							<p id="fio"><?= $student_info['fio'] ?></p>
 						</td>
 						<td>
 							<p id="gruppa"><?= $student_info['namegroup'] ?></p>
 						</td>
 						<td><?= $student_info['phone'] ?></td>
 						<td><?= $student_info['email'] ?></td>

 						<td><?= $student_info['stm'] ?></td>
 						<?php
							if ($student_info['dop_oplata'] != '') {
								?>
 							<td><?= $student_info['dop_oplata'] ?></td>
 						<?php
							}
							?>
 					</tr>
 					<?php
						if ($student_info['tranid'] != '') {
							?>
 						<tr>
 							<td></td>
 							<td></td>
 							<td>
 								<p>Старая группа</p>
 							</td>
 							<td>
 								<p style="color:red;"><?= $student_info['tranid'] ?></p>
 							</td>
 							<td>

 								<a class="btn btn-primary " href="<?= base_url('student/givePropusk/' . $student_info['stid'] . '/' . ((int) $student_info['propusk'] + 1)); ?>">Выдать пропуск</a>
 							</td>
 							<td>Колличество выданных пропусков: <span style="color:red;"><?= $student_info['propusk'] ?></span> </td>
 						</tr>
 					<?php
						}
						?>

 				</tbody>
 			</table>
 			<input type="submit" class="btn btn-warning" value="Изменить данные студента" name="edit">
			<?php if($student_info['id']!=''):?>
 			<a href="<?= base_url('edit/del_student/' . $student_info['stid']) ?>" class="btn btn-danger">Удалить студента</a>
			<?php endif;?>
		</form>
 		<h1>Оплата студента</h1>
 		<div id="studentOpl">
 			<div id="loader-wrapper" v-if="loading">
 				<img src="<?= base_url('img/Heart.gif') ?>" alt="Heart">
 			</div>

 			<form action="<?= base_url('oplata/add/' . $student_info['stid']) ?>" method="post" id="opl_st">
 				<?php
					//print_r($oplata);
					$dolg = 0;
					for ($d = 0; $d < count($student_oplata); $d++) {
						if ($student_oplata[$d]['dolg'] != '') {
							$dolg += (int) $student_oplata[$d]['dolg'];
						}
					}
					?>
 				<br>
 				<p id="lastp"></p>

 				<?php
					if (!$student_info['metka2'] == '5') {

						// echo($dolg);

						?>


 					<input type="submit" class="btn btn-info" value="Добавить оплату" name="add_oplata">
 					<?php



						}
						if ($user_status == 2) {
							if ($student_info['metka2'] == '5') {


								?>
 						<a href="<?= base_url('zamorozit/razmorst/' . $student_info['stid']) ?>" class="btn btn-info">Разморозить</a>
 					<?php

							} elseif ($student_info['tranid'] == '') {
								?>
 						<a href="<?= base_url('zamorozit/zamorst/' . $student_info['stid']) ?>" class="btn btn-info">Заморозить</a>


 					<?php
							}
						}
						if ($dolg > 0) {


							?>
 					<input type="button" @click="payDolg" class="btn btn-danger" value="Оплатить долг за учёбу <?php echo ($dolg . ' сом') ?>" name="add_dolg">
 					<input type="hidden" value="<?php echo ($dolg) ?>" id="dolValue" ref="dolValue" name="dolgValue">
 					<input type="hidden" value="<?= $student_info['stid'] ?>" id="studentID" ref="studentID" name="studentID">
 				<?php  } ?>
 				<br> <br>

 				<table class="table table-striped table-bordered table-hover">
 					<thead>
 						<th>
 							#
 						</th>
 						<th>
 							C
 						</th>
 						<th>
 							ПО
 						</th>
 						<th>
 							Колличество Уроков
 						</th>
 						<th>
 							Сумма
 						</th>

 						<th>
 							Баланс
 						</th>
 						<th>
 							Долг
 						</th>
 						<th>
 							Номер чека
 						</th>
 					</thead>
 					<tbody>
 						<?php

							if (count($student_oplata) > 0) {
								for ($i = 0; $i < count($student_oplata); $i++) {
									?>
 								<tr id="new_chek<?= $i + 1 ?>">
 									<td><?= $i + 1; ?></td>
 									<td>
 										<p id="first_date_lesson"><?= date('d-m-Y', strtotime($student_oplata[$i]['first_date_lesson'])) ?></p>
 									</td>
 									<td>
 										<p id="last_date_lesson"><?= date('d-m-Y', strtotime($student_oplata[$i]['last_date_lesson'])) ?></p>
 									</td>
 									<td>
 										<p id="count_lesson"> <?= $student_oplata[$i]['count_lesson'] ?></p>
 									</td>
 									<td>
 										<div id="summa">

 											<?php $kolopl = 0;
														if ($student_oplata[$i]['summa'] != '') : $kolopl++; ?>
 												<p>За учебу: <?php echo ($student_oplata[$i]['summa']); ?> сом</p>
 											<?php endif; ?>
 											<?php if ($student_oplata[$i]['book_price'] != '') : $kolopl++; ?>
 												<p>За книгу: <?php echo ($student_oplata[$i]['book_price']); ?> сом</p>
 											<?php endif; ?>
 											<?php if ($student_oplata[$i]['cd_price'] != '') : $kolopl++; ?>
 												<p>За cd: <?php echo ($student_oplata[$i]['cd_price']); ?> сом</p>
 											<?php endif; ?>
 											<?php if ($kolopl > 1) : ?>
 												<p id='opl3'>Об сумма: <?= $student_oplata[$i]['summa'] + $student_oplata[$i]['book_price'] + $student_oplata[$i]['cd_price'] ?> сом</p>
 										</div>
 									<?php endif; ?>
 									<div>


 									</div>
 									</td>
 									<td>
 										<p id="balans"><?= $student_oplata[$i]['balans'] ?></p>
 									</td>

 									<td>
 										<div id="opltdolg">

 											<?php $kold = 0;
														if ((int)$student_oplata[$i]['dolg'] > 0) : $kold++; ?>
 												<p>за учёбу <?= $student_oplata[$i]['dolg']; ?></p>
 											<?php endif; ?>
 											<?php if ((int)$student_oplata[$i]['ks_price'] > 0) :  $kold++; ?>
 												<p>за книгу <?= $student_oplata[$i]['ks_price']; ?></p>
 											<?php endif; ?>
 											<?php if ((int)$student_oplata[$i]['print_price'] > 0) :  $kold++; ?>
 												<p>за cd <?= $student_oplata[$i]['print_price']; ?></p>
 											<?php endif; ?>
 											<?php if ($kold > 1) : ?>
 												<p>Об Долг: <?php echo ($student_oplata[$i]['dolg'] + $student_oplata[$i]['ks_price'] + $student_oplata[$i]['print_price']); ?></p>
 											<?php endif; ?>
 										</div>
 									</td>
 									<td>
 										<p id="nomerch"><?= $student_oplata[$i]['nomer_cheka'] ?></p>
 									</td>
 									<td>
 										<p><?= $student_oplata[$i]['comment'] ?></p>
 									</td>
 									<?php
												if ($user_status == 2) {
													?>
 										<td><a href="<?= base_url('edit/oplata_ed/' . $student_oplata[$i]['id']) ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i></a></td>
 									<?php
												}
												?>
 									<td>
									 
										 <input type="button" class="btn btn-success" id="new_chek<?= $i + 1 ?>" value="Напечатать чек">
										 <?php if((int)$student_oplata[$i]['ks_price']>0):?>
											<button class="btn btn-danger" @click.prevent="payDolgBook(<?=$student_oplata[$i]['id']?>,<?=$student_oplata[$i]['ks_price']?>)">Оплатиь долг за книгу</button>
											<input type="hidden" value="<?=$student_oplata[$i]['nomer_cheka']?>" id="checkID" ref="checkID" name="checkID">
											<input type="hidden" value="<?=$student_oplata[$i]['id']?>" id="oplataID" ref="oplataID" name="oplataID">
										 <?php endif;?>
 									</td>
 								</tr>
 						<?php
								}
							}
							?>

 					</tbody>
 				</table>
 				<p id="lastp"></p>

 				<?php
					if (!$student_info['metka2'] == '5') {
						$dolg = 0;
						for ($d = 0; $d < count($student_oplata); $d++) {
							if ($student_oplata[$d]['dolg'] != '') {
								$dolg += (int) $student_oplata[$d]['dolg'];
							}
						}
						// echo($dolg);

						?>
 					<input type="submit" class="btn btn-info" value="Добавить оплату" name="add_oplata">

 					<?php

						}
						if ($user_status == 2) {
							if ($student_info['metka2'] == '5') {


								?>
 						<a href="<?= base_url('zamorozit/razmorst/' . $student_info['id']) ?>" class="btn btn-info">Разморозить</a>
 					<?php

							} elseif ($student_info['tranid'] == '') {
								?>

 						<a href="<?= base_url('zamorozit/zamorst/' . $student_info['id']) ?>" class="btn btn-info">Заморозить</a>

 					<?php
							}
						}
						if ($dolg > 0) {


							?>

 					<input type="button" @click="payDolg" class="btn btn-danger" value="Оплатить долг за учёбу <?php echo ($dolg . ' сом') ?>" name="add_dolg">
 				<?php } ?>
 		</div>
 		</form>
 		<div id="modal_form">
 			<!-- Само окно -->


 			<div id="printer">

 				<h4><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;International Language House</strong></h4>
 				<p><strong>Чек №&nbsp;<span id='nomer'></span></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Дата:&nbsp;<?= date("d-m-Y H:i:s") ?></p>
 				<table class="table-condensed">
 					<thead id="thead">
 						<th>ФИО</th>
 						<th>Дата первого занятия</th>
 						<th>Дата последного занятия</th>
 						<th>Количество занятий</th>
 					</thead>
 					<tbody id="thead">
 						<tr>
 							<td id="printertitle"></td>
 							<td id="printerfd"></td>
 							<td id="printerld"></td>
 							<td id="printerkol"></td>
 						</tr>

 					</tbody>
 				</table>
 				<table class="table-condensed">
 					<thead id="thead">

 						<th></th>
 					</thead>
 					<tbody id="thead">
 						<tr>
 							<td>Группа</td>
 							<td>
 								<p id="namegr"></p>
 							</td>
 						</tr>
 						<tr>
 							<td>Долг:</td>
 							<td>
 								<p id="dol3t"></p>
 							</td>
 						</tr>
 						<tr>
 							<td>Баланс:</td>
 							<td>
 								<p id="balanschek"></p>
 							</td>
 						</tr>
 						<tr>
 							<td>Оплатил(а):</td>
 							<td>
 								<p id="opl"></p>
 							</td>
 						</tr>
 						<tr>
 							<td>Общая сумма:</td>
 							<td>
 								<p id="opls"></p>
 							</td>
 						</tr>

 						<tr>

 							<td>
 								<p id="oplza"></p>
 							</td>

 						</tr>
 					</tbody>
 				</table>


 				<p class="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Мы всегда рады вам!</strong> </p>
 				<p class="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Web : english.on.kg</strong> </p>
 				<p class="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>(+966) 770 89 04 05</strong></p>


 			</div>
 			<!-- Тут любое содержимое -->
 		</div>
 		<div id="overlay"></div><!-- Подложка -->
 	</div>
 	<!--end main container -->