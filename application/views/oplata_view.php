<div class="col-md-8">
	<?php
	//print_r($chek_num);
	//$nomer_cheka='';
	//echo ($book_dolg['id']);
	?>

	<button id='lessonPayment' class="btn btn-primary">Оплата за учёбу</button>
	<button id='bookPayment' class="btn btn-primary">Оплата за книгу</button>
	<?php if ($book_dolg != '') : ?>
		<button id='dolgPayment' class="btn btn-primary">Погасить долг за книгу</button>
	<?php endif; ?>

	<div class="lessonPayment stad2">
		<form action="<?= base_url('oplata/save/' . $student_id) ?>" method="post" id="myform">
			<div id="wrapper">


				<div id="content">

					<!-- <div class="checkbox">
            <label><input type="checkbox" id="radio_russian" name="radio_russian"><b>Иностранец</b></label>

          </div> -->
					<!-- 
          <div id="hidden_russian">
            <div  class="form-group">
              <p class="form-inline"><label >Оплата за регистрацию</label>&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="number" class="form-control"   name="registracion" id="registracion"></p>
                <p class="form-inline"><label >Оплата за Pick-up</label>&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="number" class="form-control"   name="pickup" id="pickup"></p>
                  <p class="form-inline"><label >Оплата за учёбу</label>&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="number" class="form-control"   name="russianpay" id="russianpay"></p>
                  </div>
          </div> -->

					<div class="row">
						<br><br>
						<!-- <div class="col-md-12">
                   <?/*if(isset($lastDolg)){*/ ?>
                       <button class="btn btn-danger">Долг за учёбу&nbsp;<?/*=$lastDolg*/ ?></button>
                   <?/*}*/ ?>
               </div>-->

						<div class="col-md-6">

							<div class="input-group">

								<span class="input-group-addon">Оплата за учёбу&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-education"></span></span>
								<input type="number" class="form-control" placeholder="Введите сумму" name="summa" id="summast" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="input-group">
								<span class="input-group-addon">Долг за учёбу&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-asterisk"></span></span>
								<input type="number" class="form-control" name="dolg" id="opltdolg">
							</div>
						</div>
					</div>

					<!-- <p class="bookl"></p>
					<p class="cdl"></p> -->
					<p class="sta"></p>
					<p class="stb2"></p>
					<p class="stc2"></p>

					<div class="row">
						<div class="col-md-6">
							<div class="input-group">
								<span class="input-group-addon">Баланс&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-credit-card"></span></span>
								<input type="number" class="form-control" name="balans" id="balans">
							</div>
						</div>
						<div class="col-md-6">
							<div class="input-group">
								<span class="input-group-addon">Комментарии к оплате&nbsp;&nbsp;<span class="glyphicon glyphicon-comment"></span></span>
								<input type="text" class="form-control" name="kommentPay" id="kommentPay">
							</div>
						</div>
					</div>


					<div class="stlessonbookcdinfo">
						<br />
						<br />
						<br />
						<p class="bg-danger">Просканируйте для приема денег за книгу или за сд.....</p>
					</div>
					<h1>Период обучения</h1>
					<div class="row">
						<div class="col-md-6">
							<div class="input-group">
								<span class="input-group-addon">Дата первого занятия&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-calendar"></span></span>
								<input type="text" class="form-control" id="first_date_lesson" name="first_date_lesson" data-date-format="mm/dd/yyyy" required>
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-6">
							<div class="input-group">
								<span class="input-group-addon">Колличество занятий&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-stats"></span></span>
								<input type="number" class="form-control" name="count_lesson" id="count_lesson">
							</div>
						</div>
					</div>

					<br>
					<div class="row">
						<div class="col-md-6">
							<div class="input-group">
								<span class="input-group-addon">Дата последного занятия&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-calendar"></span></span>
								<input type="text" class="form-control" id="last_date_lesson" name="last_date_lesson">
							</div>
						</div>
					</div>


				</div>
			</div>
			</p>
			<input type="hidden" name="phone_metka" value=""></p>
			<input type="hidden" name="email_metka" value=""></p>

			<input type="hidden" class="form-control" name="date_payment" value="<?= date('d-m-Y') ?>"></p>
			<input type="hidden" name="metka" value="4">
			<input type="hidden" name="den" value="<?= date('d-m-Y') ?>">
			<input type="hidden" name="ip" value="<?= $_SERVER["REMOTE_ADDR"] ?>">

			<input type="submit" class="btn btn-primary" value="Добавить" name="add" id="add">
			<!-- <button  class="btn btn-primary" name="add" id="add">Добавить</button> -->

			<a href="<?= base_url('student/get_student/' . $student_id) ?>" class="btn btn-warning">Отмена</a>
		</form>
		<?php


		?>

	</div>
	<!--End Lesson Payment-->
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<div class="bookcdinfo">
		<br />
		<br />
		<br />
		<p class="bg-danger">Просканируйте книгу или сд для приема денег.....</p>
		
	<!-- <button id="payBookManually">Books Payment</button> -->
	</div>
	<div class="bookPayment">
		<form action="<?= base_url('oplata/save/' . $student_id) ?>" method="post" id="bookPayForm">
		
		

			<p class="booka"></p>

			<p class="cda"></p>








			<input type="hidden" id="first_date_lesson" name="first_date_lesson" value="<?= $lastPayment['first_date_lesson'] ?>">

			<input type="hidden" name="count_lesson" id="count_lesson" value="<?= $lastPayment['count_lesson'] ?>">

			<input type="hidden" name="last_date_lesson" value="<?= $lastPayment['last_date_lesson'] ?>">
			</p>

			<div class="row">
				<div class="col-md-6">
					<div class="input-group">
						<span class="input-group-addon">Баланс&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-credit-card"></span></span>
						<input type="number" class="form-control" name="balans" id="balans">
					</div>
				</div>
				<div class="col-md-6">
					<div class="input-group">
						<span class="input-group-addon">Комментарии к оплате&nbsp;&nbsp;<span class="glyphicon glyphicon-comment"></span></span>
						<input type="text" class="form-control" name="kommentPay" id="kommentPay">
					</div>
				</div>
			</div>

			<br>

			<input type="submit" class="btn btn-primary" value="Добавить" name="addBook" id="addBook">

			<a href="<?= base_url('student/get_student/' . $student_id) ?>" class="btn btn-warning">Отмена</a>

		</form>


	</div>
	<!--book payment-->
	<!-- </div>end main -->

	<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<div class="dolgPayment">
		<form action="<?= base_url('oplata/save/' . $student_id) ?>" method="post" id="dolgPayment">
			<br>
			<br>
			<br>
			<?php
			if ($book_dolg['ks_price']!='') {	
				
			?>

				<button class="btn btn-primary btn-lg" id="dolB">Долг за книгу <span id="dolBS"><?= $book_dolg['ks_price'] ?></span></button>
				<input type="hidden" name="bookdolgsum" value="<?=$book_dolg['ks_price']?>">
			<?php
			}
			?>
			
			<br>
			<br>
			<br>


			<div class="row" id="dolBinfo">
				<div class="col-md-6">
					<div class="input-group">
						<span class="input-group-addon">Оплата долга за книгу&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-book"></span></span>
						<input type="number" class="form-control" placeholder="Введите сумму" name="dolg-pay" id="dolg-pay">
						<input type="hidden" name="bookDolgPay" id="bookDolgPay">
						<input type="hidden" name="nomer_cheka" value="<?=$book_dolg['nomer_cheka']?>">
					</div>
				</div>

			</div>




			<br>


			<div class="row" id="dolCinfo">
				<div class="col-md-6">
					<div class="input-group">
						<span class="input-group-addon">Оплата долга за CD&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-cd"></span></span>
						<input type="number" class="form-control" placeholder="Введите сумму" name="cd-dolg" id="cd-dolg">
						<input type="hidden" name="cdDolgPay" id="cdDolgPay">
					</div>
				</div>

			</div>
			<br>
			<div class="row">
				<div class="col-md-6">
					<div class="input-group">
						<span class="input-group-addon">Баланс&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-credit-card"></span></span>
						<input type="number" class="form-control" name="balans" id="balans">
					</div>
				</div>
				<div class="col-md-6">
					<div class="input-group">
						<span class="input-group-addon">Комментарии к оплате&nbsp;&nbsp;<span class="glyphicon glyphicon-comment"></span></span>
						<input type="text" class="form-control" name="kommentPay" id="kommentPay">
					</div>
				</div>
			</div>

			<div id="dolgInfo">

				<input type="hidden" id="first_date_lesson" name="first_date_lesson" value="<?= $lastPayment['first_date_lesson'] ?>">
				<input type="hidden" id="sid" name="sid" value="">

				<input type="hidden" name="count_lesson" id="count_lesson" value="<?= $lastPayment['count_lesson'] ?>">

				<input type="hidden" name="last_date_lesson" value="<?= $lastPayment['last_date_lesson'] ?>">
				</p>
				<input type="hidden" class="form-control" name="date_payment" value="<?= date('d-m-Y') ?>"></p>

				<input type="submit" class="btn btn-primary" value="Добавить" name="addDolg" id="addDolg">

				<a href="<?= base_url('student/get_student/'.$student_id) ?>" class="btn btn-warning">Отмена</a>
			</div>


		</form>


	</div>
	<!--dolg payment-->

</div>
<!--end main-->