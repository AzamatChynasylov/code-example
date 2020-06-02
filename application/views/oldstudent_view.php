<div class="container">
	<div class="row">
		<div class="col-md-8">
			<form action="<?= base_url('oldstudent/search') ?>" method="post">

				<div class="form-group">
					<p class="form-inline"><label for="exampleInputName2">ФИО&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
						<input type="text" class="form-control" placeholder="Чынасылов Азамат" name="fio"></p>
					<input type="hidden" name="markVal" value="<?= $mark ?>" id="markVal">

				</div>
				<div class="form-group">
					<p class="form-inline"><label for="exampleInputName3">Телефон</label>
						&nbsp;<input type="text" class="form-control" placeholder="0558123193" name="tel"></p>
				</div>

				<input type="submit" class="btn btn-primary" value="Найти" name="search">

			</form>
			<br />
			<!-- <section class="poisk_po_datam">
				<form action="" method="post">

					<div class="form-group">
						<p class="form-inline"><label for="exampleInputName2">Дата</label>
							<input name="datesumma" type="text" class="form-control" id='first_date_lesson' value="<?= date('d-m-Y') ?>">
							по
							<input name="datesumma2" type="text" class="form-control" id='last_date_lesson' value="">
						</p>
					</div>
					<input type="submit" class="btn btn-primary" value="Поиск по датам" name="search2">

				</form>
			</section> -->
			<?php
			if (isset($students)) {
			if (count($students) > 0) {
				?>
				<br>
				<br>
				<table class="table table-condenced table-bordered " id="markSearch">
				<thead>
					<th>ФИО</th>
					<th>Старая Группа</th>
				</thead>
					<tbody>
						<?php
								 //print_r($students);
								foreach ($students as $item) :
									$segments = array('student', 'get_student', $item['stid']);
									$segments2 = array('gruppa', 'student_sp', $item['id']);
									?>
							<tr>
								<td> <a href="<?= site_url($segments) ?>"><?= $item['fio'] ?></a></td>
								<td> <?= $item['tranid'] ?></td>
							</tr>

						<?php endforeach;
								?>
					</tbody>

				</table>
		<?php
			}
		}
		?>
		



					<?php
					if (isset($students2)) {
						if (count($students2) > 0) {
							// print_r($students);
							foreach ($students2 as $item) :
								?>


<table class="table table-condenced table-bordered " id="markSearch">
				<thead>
					<th>ФИО</th>
					<th>Старая Группа</th>
				</thead>
				<tbody>
								<tr>
									<td> <a href="<?= base_url('student/get_student/' . $item['id']) ?>"><?= $item['fio'] ?></a></td>

									<? if (isset($item['tranid'])) {
													?>
										<td><?= $item['tranid'] ?></td>
									<?
												} else {
													?>
										<td></td>
									<?
												} ?>
								</tr>




							<?php endforeach;
								}
							}
						
					?>

				
				</tbody>

			</table>
		</div>