<div class="col-md-8">
          <h1><?=$info?></h1>
       
          <?php 
          //print_r($new_student);
          	if (isset($new_student)){
          		?>
				<a href="<?=base_url()?>index.php/student/get_student/<?=$new_student[0]['id']?>">Перейти к студенту</a>
          		<?php
          	}
          	if (isset($insertId))
          	{
          		?>
				<div class="row">
					<div class="col-md-3 col-md-offset-3">
						<button class="btn btn-primary btn-lg" id="printProbnikChek">Распечатать чек <i class="fa fa-print"></i></button>
					</div>
				</div>
				  <div id="modal_form">
				 <div id="printerProbnik">

                              <h4><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;International Language House</strong></h4>

                                <p><strong>Чек №&nbsp;<?=$insertId?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Дата:&nbsp;<?=$user2['date_registration']?></p>
                                <table class="table-condensed">
                                  <thead id="thead">
                                    <tr><td>ФИО</td><td><?=$user2['name']?></td></tr>
                                  </thead>
                                  <tbody id="thead">
									 <tr>
                                      <td>Учитель</td>
                                      <td><p id="gruppacheck"><?=$user2['teacher']?></p></td>
                                    </tr>
                                    
                                    <!-- <tr>
                                      <td>Оплатил(а):</td>
                                      <td> <p id="opl">100 сом за пробный урок</p></td>
                                    </tr> -->
                                  </tbody>
                                </table>
                                <p class="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Мы всегда рады вам!</strong> </p>
                                <p class="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Web : english.on.kg</strong> </p>
                                <p class="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>(+966) 770 89 04 05</strong></p>


                              </div>
                          </div>
          		<?php
          	}
          ?>

 </div>