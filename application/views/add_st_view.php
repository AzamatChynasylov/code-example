<div class="container">


	<div class="row">
		<div class="col-md-8 stad" id="addst">

			<form action="add/add_student" method="post" @submit.prevent="sub()" novalidate id="addForm">
				<br><br>
				<div class="row">
					<div class="col-md-8">
						<div class="input-group" :class="{'has-error':  errors.has('fio')}">
							<span class="input-group-addon">ФИО&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-user"></span></span>
							<input type="text" class="form-control" placeholder="Имя Студента" name="fio" v-validate="'required'">
						</div>
						<span v-show="errors.has('fio')" class="text-danger">{{ errors.first('fio') }}</span>
					</div>
				</div>

				<br>
				<div class="phone_img">
					<button class="btn btn-primary btn-mega" @click.submit.prevent=" oper = 1 "></button>
					<button class="btn btn-primary btn-o" @click.submit.prevent=" oper = 2 "></button>
					<button class="btn btn-primary btn-beeline" @click.submit.prevent=" oper = 3 "></button>

				</div>

				<div class="viewtel">
					<div class="row">
						<div>
							<template v-if=" oper === 1 ">
								<div class="col-md-4" :class="{'has-error':  errors.has('nomer')}">
									<select name="nomer" id="nomermega" class="form-control" v-validate="'required|not_in:Choose'">
										<option value=""></option>
										<option value="996550">0550</option>
										<option value="996551">0551</option>
										<option value="996552">0552</option>
										<option value="996553">0553</option>
										<option value="996554">0554</option>
										<option value="996555">0555</option>
										<option value="996556">0556</option>
										<option value="996557">0557</option>
										<option value="996558">0558</option>
										<option value="996559">0559</option>
										<option value="996755">0755</option>
										<option value="996999">0999</option>
									</select>
								</div>
								<div class="col-md-4">
									<div class="input-group" :class="{'has-error':  errors.has('phonenumber')}">
										<input type="number" name="phonenumber" class="form-control" v-validate="'required'">
									</div>
									<span v-show="errors.has('phonenumber')" class="text-danger">{{ errors.first('phonenumber') }}</span>
								</div>
							</template>
							<template v-if=" oper === 2 ">
								<div class="col-md-4" :class="{'has-error':  errors.has('nomer')}">


									<select name="nomer" id="nomero" class="form-control" v-validate="'required|not_in:Choose'">
										<option value=""></option>
										<option value="996700">0700</option>
										<option value="996701">0701</option>
										<option value="996702">0702</option>
										<option value="996703">0703</option>
										<option value="996704">0704</option>
										<option value="996705">0705</option>
										<option value="996706">0706</option>
										<option value="996707">0707</option>
										<option value="996708">0708</option>
										<option value="996709">0709</option>
										<option value="996500">0500</option>
										<option value="996501">0501</option>
										<option value="996502">0502</option>
										<option value="996505">0505</option>
										<option value="996507">0507</option>
										<option value="996509">0509</option>
									</select>



								</div>
								<div class="col-md-4">
									<div class="input-group" :class="{'has-error':  errors.has('phonenumber')}">
										<input type="number" name="phonenumber" class="form-control" v-validate="'required'">
									</div>
									<span v-show="errors.has('phonenumber')" class="text-danger">{{ errors.first('phonenumber') }}</span>
								</div>
							</template>
							<template v-if=" oper === 3 ">
								<div class="col-md-4" :class="{'has-error':  errors.has('nomer')}">
									<select name="nomer" id="nomerbeeline" class="form-control" v-validate="'required|not_in:Choose'">
										<option value=""></option>
										<option value="996770">0770</option>
										<option value="996771">0771</option>
										<option value="996772">0772</option>
										<option value="996773">0773</option>
										<option value="996774">0774</option>
										<option value="996775">0775</option>
										<option value="996776">0776</option>
										<option value="996777">0777</option>
										<option value="996778">0778</option>
										<option value="996779">0779</option>
										<option value="996222">0222</option>
										<option value="996220">0220</option>
									</select>
								</div>
								<div class="col-md-4">
									<div class="input-group" :class="{'has-error':  errors.has('phonenumber')}">
										<input type="number" name="phonenumber" class="form-control" v-validate="'required'">
									</div>
									<span v-show="errors.has('phonenumber')" class="text-danger">{{ errors.first('phonenumber') }}</span>
								</div>
							</template>
						</div>


					</div>

				</div>

				<div class="row">
					<div class="col-md-8">

						<div class="input-group" :class="{'has-error':  errors.has('email')}">

							<span class="input-group-addon">Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-user"></span></span>
							<input type="email" class="form-control" placeholder="Email address" name="email" v-validate="'email'">

						</div>
						<span v-show="errors.has('email')" class="text-danger">{{ errors.first('email') }}</span>
					</div>
				</div>
				<br>
				<div class="form-group" :class="{'has-error':  errors.has('gruppa')}">

					<p class="form-inline"><label for="exampleInputName3">Группа</label>&nbsp;&nbsp;</p>

					<section>
						<select class="form-control" name="gruppa" id='gruppa' v-validate="'required|not_in:Choose'">
							<option value="">Выберите группу из списка</option>
							<?php
							foreach ($gr[0] as $item) {
								$string = (string) $item[0]['time'];
								//echo $string;
								$string2 = substr($string, 0, 2);
								$string3 = substr($string, 2);
								$string = $string2 . ':' . $string3;
							?>
								<option value="" class="bg-primary opt" disabled><?= $string ?></option>
								<?php

								foreach ($item as $item2) {

								?>
									<option value="<?= $item2['id'] . '|' . $item2['lastDate'] ?>"><?= $item2['namegroup'] ?></option>
							<?php
								}
							}
							?>




							<option value="" class="bg-primary opt">Индивидуальные</option>

							<?php
							foreach ($gr[1] as $item) {

							?>
								<option value="<?= $item['id'] . '|' . $item['lastDate'] ?>"><?= $item['namegroup'] ?></option>


							<?php
							}
							?>
						</select>

					</section>
					<span v-show="errors.has('gruppa')" class="text-danger">{{ errors.first('gruppa') }}</span>
				</div>

				<div class="form-group">
					<p class="form-inline"><label for="exampleInputName3">Доп. информация</label>&nbsp;&nbsp;&nbsp;
						<textarea class="form-control" name="dop_info" rows="3"></textarea>
					</p>
				</div>

				<!-------------------------ОПЛАТА------------------------------------------------------------------------------------------>
				<h3>Оплата студента</h3>
				<!-- <div class="checkbox">
                    <label><input type="checkbox" id="radio_russian" name="radio_russian" @click="russian=!russian"><b>Иностранец</b></label>

                </div> -->
				<template v-if="russian">
					<div class="row">

						<div class="col-md-6">
							<div class="input-group" :class="{'has-error':  errors.has('registration')}">

								<span class="input-group-addon">Оплата за регистрацию&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-log-in"></span></span>
								<input type="number" class="form-control" name="registration" v-validate="'required|numeric'">

							</div>
							<span v-show="errors.has('registration')" class="text-danger">{{ errors.first('registration') }}</span>

						</div>
						<div class="col-md-6">

							<div class="input-group" :class="{'has-error':  errors.has('pickup')}">

								<span class="input-group-addon">Оплата за Pick-up&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-plane"></span></span>
								<input type="number" class="form-control" name="pickup" v-validate="'required|numeric'">

							</div>
							<span v-show="errors.has('pickup')" class="text-danger">{{ errors.first('pickup') }}</span>

						</div>
					</div>
					<br>
					<br>
				</template>


				<div class="row">
					<div class="col-md-6">
						<div class="input-group" :class="{'has-error':  errors.has('summa')}">
							<span class="input-group-addon">Оплата за учёбу&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-ruble"></span></span>
							<input type="number" class="form-control" placeholder="Введите сумму" name="summa" v-validate="'required|numeric'">
						</div>
						<span v-show="errors.has('summa')" class="text-danger">{{ errors.first('summa') }}</span>

					</div>

					<div class="col-md-6" :class="{'has-error':  errors.has('dolg')}">
						<div class="input-group">
							<span class="input-group-addon">Долг за учёбу&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-asterisk"></span></span>
							<input type="number" class="form-control" name="dolg" v-validate="'numeric'">
						</div>
					</div>
					<span v-show="errors.has('dolg')" class="text-danger">{{ errors.first('dolg') }}</span>

				</div>
				<br>
				<div class="bookCountInfo" v-if="bookFlage">
					<table class="table table-bordered table-hover table-condensed">
						<thead>
							<th class="danger">Книга уровень</th>

							<th class="danger" v-for="book in books">{{book.name}}</th>

						</thead>
						<tbody>
							<tr class="success">
								<td>Колличество</td>
								<td class="success" v-for="book in books">{{ book.bookCount }}</td>
							</tr>
						</tbody>
					</table>
				</div>
				<br>
				<div class="stlessonbookcdinfo">
					<br />

					<p class="bg-danger">Просканируйте для приема денег за книгу или за сд.....</p>
				</div>
				<p class="sta"></p>
				<p class="stb"></p>
				<p class="stc"></p>


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

				<h3>Период обучения</h3>
				<div class="row">
					<div class="col-md-6">
						<div class="input-group" :class="{'has-error':  errors.has('first_date_lesson')}">
							<span class="input-group-addon">Дата первого занятия&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-calendar"></span></span>
							<input type="text" class="form-control" id="first_date_lesson" name="first_date_lesson" data-date-format="mm/dd/yyyy" v-validate="'required'">
						</div>
						<span v-show="errors.has('first_date_lesson')" class="text-danger">{{ errors.first('first_date_lesson') }}</span>

					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-6">
						<div class="input-group" :class="{'has-error':  errors.has('count_lesson')}">
							<span class="input-group-addon">Колличество занятий&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-stats"></span></span>
							<input type="number" class="form-control" name="count_lesson" id="count_lesson" v-validate="'required'">
						</div>
						<span v-show="errors.has('count_lesson')" class="text-danger">{{ errors.first('count_lesson') }}</span>

					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-6">
						<div class="input-group" :class="{'has-error':  errors.has('last_date_lesson')}">
							<span class="input-group-addon">Дата последного занятия&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-calendar"></span></span>
							<input type="text" class="form-control" id="last_date_lesson" name="last_date_lesson" v-validate="'required'">
						</div>
						<span v-show="errors.has('last_date_lesson')" class="text-danger">{{ errors.first('last_date_lesson') }}</span>

					</div>
				</div>

				<h3>Где узнали про нас</h3>
				<div class="row">
					<div class="col-md-8">

						<select name="reklama" id="reklama" class="form-control" required>
							<option value="1">Интернет</option>
							<option value="2">Улица Баннер</option>
							<option value="3">Через Друзей</option>
							<option value="4">Телевидение</option>
							<option value="5">НБТ</option>
							<option value="6">ПЯТНИЦА</option>
							<option value="7">ТНТ</option>
							<option value="8">НТС</option>
							<option value="9">Автобус</option>
						</select>

					</div>
				</div>





				<input type="hidden" name="metka" value="4">


				<div>


				</div>


				<!------------------------------------------------------------------------------------------------------------------>


				<input type="hidden" name="metka" value="2">
				<input type="hidden" name="den" value="<?= date('d-m-Y') ?>">
				<input type="hidden" name="ip" value="<?= $_SERVER["REMOTE_ADDR"] ?>">

				<br>
				<input type="submit" class="btn btn-primary" value="Добавить студента" name="add" :disabled="!disabled" />

			</form>
			<!-------printer------------------------------------------------------------------------------------>

		</div>