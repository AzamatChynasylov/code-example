<div class="row">

	<div class="col-md-8">
		<form action="<?= site_url('search') ?>" method="post">
			<h2>Форма для поиска Студента</h2>
			<br>
			<div class="row">
				<div class="col-md-6">
					<div class="input-group">
						<span class="input-group-addon">ФИО&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-user"></span></span>
						<input type="text" class="form-control" placeholder="Чынасылов Азамат" name="fio">
						<input type="hidden" name="markVal" value="<?= $mark ?>" id="markVal">
					</div>
				</div>
			</div>
			<br>
			<br>
			<div class="row">
				<div class="col-md-6">
					<div class="input-group">
						<span class="input-group-addon">Телефон&nbsp;&nbsp;<span class="glyphicon glyphicon-earphone"></span></span>
						<input type="text" class="form-control" placeholder="0558123193" name="tel">
					</div>
				</div>
			</div>
			<br>
			<br>
			<input type="submit" class="btn btn-primary" value="Найти" name="search">
		</form>

		<?php
		if (isset($students)) {
			if (count($students) > 0) {
				?>
				<br>
				<br>
				<table class="table table-condenced table-bordered " id="markSearch">
					<thead>
						<th>ФИО</th>

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
								<td> <a href="<?= site_url($segments2) ?>"><?= $item['namegroup'] ?></a></td>
							</tr>

						<?php endforeach;
								?>
					</tbody>

				</table>
		<?php
			}
		}
		?>
	</div>