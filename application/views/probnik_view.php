<div class="row">
	<div class="col-md-8" id="probnik-vue">
        <form action="<?=base_url('probnik/save')?>" method="post" @submit.prevent="sub()" novalidate  id="probnikForm">

		<div id="scanProbnik">
			<div class="row">
			  <div class="col-md-3 col-md-offset-3 thumbnail alert alert-danger">
				<p>Просканируйте  для приема денег за пробный урок.....</p>
				<i class="fa fa-barcode"></i>
			  </div>
			</div>
		</div>
		<div id="probnikAfterScan">
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
			<div class="row">
                <div class="phone_img">
                    <button  class="btn btn-primary btn-mega" @click.submit.prevent= " oper = 1 "></button>
                    <button  class="btn btn-primary btn-o" @click.submit.prevent= " oper = 2 "></button>
                    <button  class="btn btn-primary btn-beeline" @click.submit.prevent= " oper = 3 "></button>

                </div>
				</div>
            <br>
        <div class="row">
         <div class="viewtel">
                <div class="row">
                    <div  >
                        <template v-if=" oper === 1 ">
                            <div class="col-md-4" :class="{'has-error':  errors.has('nomer')}">
                                <select name="nomer" id="nomermega"    class="form-control" v-validate="'required|not_in:Choose'">
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
                                </select>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group" :class="{'has-error':  errors.has('phonenumber')}">
                                    <input type="number"  name="phonenumber" class="form-control" v-validate="'required'">
                                </div>
                                <span v-show="errors.has('phonenumber')" class="text-danger">{{ errors.first('phonenumber') }}</span>
                            </div>
                        </template>
                        <template v-if=" oper === 2 ">
                            <div class="col-md-4"  :class="{'has-error':  errors.has('nomer')}">


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
                                </select>



                            </div>
                            <div class="col-md-4">
                                <div class="input-group" :class="{'has-error':  errors.has('phonenumber')}">
                                    <input type="number"  name="phonenumber" class="form-control" v-validate="'required'">
                                </div>
                                <span v-show="errors.has('phonenumber')" class="text-danger">{{ errors.first('phonenumber') }}</span>
                            </div>
                        </template>
                        <template v-if=" oper === 3 ">
                            <div class="col-md-4"  :class="{'has-error':  errors.has('nomer')}">
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
                                </select>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group" :class="{'has-error':  errors.has('phonenumber')}">
                                    <input type="number"  name="phonenumber" class="form-control" v-validate="'required'">
                                </div>
                                <span v-show="errors.has('phonenumber')" class="text-danger">{{ errors.first('phonenumber') }}</span>
                            </div>
                        </template>
                    </div>


                </div>

            </div>
        </div>
			<br>
			<div class="row">
				<div class="col-md-3">
					<p class="probnikTeacherscount">Список учителей <i class="fa fa-users"></i></p>
				</div>
				<div class="col-md-6" :class="{'has-error':  errors.has('teacher')}">
					<p>
					<select name="teacher" v-validate="'required|not_in:Choose'">
						<?php $kolTeachers=0; for($i=0;$i<count($teacher_spisok);$i++){
							$kolTeachers++;
						?>
							<option value="<?=$teacher_spisok[$i]['name']?>"><?=$teacher_spisok[$i]['name'];?></option>
						<?php
						}?>
					</select>
				<span class="badge"><?=$kolTeachers;?></span></p>
				</div>
				
			</div>
			<button class="btn btn-primary" name="saveProbnik" id="saveProbnik">Сохранить <span><i class="fa fa-ticket" aria-hidden="true"></i></span></button>
            <br/> <br/>
        </div>
	</form>
	<a href="<?=base_url('probnik/get_users')?>" class="btn btn-primary">Список пробников</a>


    </div>