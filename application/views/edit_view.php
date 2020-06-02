<div class="container">
        <div class="row">
         <div class="col-md-8">
         <?php 
         // print_r($student_info);
         //print($gruppa_id);
         ?>
<form action="<?=base_url('edit/save_student/'.$student_info['stid'])?>" method="post">
         
          
           <div class="row">
           <div class="col-md-8">
             <div class="input-group">
                <span class="input-group-addon">ФИО&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-user"></span></span>
                <input type="text" class="form-control" name="fio" id="search" value="<?=$student_info['fio']?>" autofocus required>
            </div>
           </div>
        </div>
        <br>
        
         <div class="row">
           <div class="col-md-8">
             <div class="input-group">
                <span class="input-group-addon">Телефон&nbsp;&nbsp;<span class="glyphicon glyphicon-phone"></span></span>

                <input type="text" class="form-control" id="search2"  name="tel" value="<?=$student_info['phone']?>" required>
            </div>
           </div>
        </div>
        <br>
         <div class="row">
           <div class="col-md-8">
             <div class="input-group">
                <span class="input-group-addon">Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-envelope"></span></span>

                <input type="email" name="email" id="inputEmail" class="form-control" value="<?=$student_info['email']?>">
            </div>
           </div>
        </div>

     <br>
           
          <div class="form-group">
          <?php
            if($student_info['tranid']!='')
            {
              ?>
                <p class="form-control">Старая группа</p>
                <p class="form-control" style="color:red;"><?=$student_info['tranid']?></p>
                <input type="hidden" value="<?=$student_info['tranid']?>" name="oldGroupName">
              
              <?php
            }
          ?>
          
            <p class="form-inline"><label for="exampleInputName3">Группа</label>
<section>           
<select class="form-control" name="gruppa" id='gruppa' >
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
									<option value="<?= $item2['id'] . '|' . $item2['lastDate'] ?>" <?=($item2['id']==$student_info['id'] ? 'selected' : '')?>><?= $item2['namegroup'] ?></option>
							<?php
								}
							}
							?>




							<option value="" class="bg-primary opt">Индивидуальные</option>

							<?php
							foreach ($gr[1] as $item) {

								?>
								<option value="<?= $item['id'] . '|' . $item['lastDate'] ?>"<?=($item['id']==$student_info['id'] ? 'selected' : '')?> ><?= $item['namegroup'] ?></option>


							<?php
							}
							?>
						</select></p>
</section> 
          </div>
          
         <div class="form-group">
            <p class="form-inline"><label for="exampleInputName3">Доп. информация</label>&nbsp;&nbsp;&nbsp;
            
          <textarea class="form-control" name="dop_info" rows="3"><?=$student_info['stm']?></textarea></p>
          </div>
           <input type="submit" class="btn btn-primary" value="Сохранить изменения" name="refresh">
           <a href="<?=base_url('student/get_student/'.$student_info['stid'])?>" class="btn btn-danger">Назад</a>
          </form>   
 </div>