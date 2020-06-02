<div class="container">
        <div class="row">
          <div class="col-md-8">
         <form action="<?=base_url('chek/find_chek')?>" method="post">
         
          <div class="form-group">
            <p class="form-inline"><label for="exampleInputName2">Номер (№) чека&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input type="text" class="form-control"   name="chek" ></p>
            
          </div>
         
         
           <input type="submit" class="btn btn-primary" value="Найти" name="search">
           
					</form>
					<br>
					<br>
					<br>
          <section>
            <?php
              if(isset($nomer_chek))
              {
                //print_r($student);
                //echo "</br>";
							//	print_r($nomer_chek);
								

                ?>
                <table class="table table-bordered table-condensed">
                  <thead>
                    <th></th>
                    <th>Имя студента</th>
                    <th>Телефон</th>
                    <th>Дата платежа</th>
                    <th>номер чека</th>
                    <th>Сумма платежа</th>
                  </thead>
                  <tbody>
										<?php for($i=0; $i<count($nomer_chek); $i++ ):?>
                    <tr>
                      <td></td>
                      <td><a href="<?=base_url('student/get_student/'.$nomer_chek[$i]['id'])?>"> <?=$nomer_chek[$i]['fio']?></a></td>
                      <td><?=$nomer_chek[$i]['phone']?></td>
                      <td><?=date('d-m-Y H:i:s', strtotime($nomer_chek[$i]['date_payment']))?></td>
                      <td><?=$nomer_chek[$i]['nomer_cheka']?></td>
                      <td><?=$nomer_chek[$i]['summa']?></td>
										</tr>
										<?php endfor;?>
                  </tbody>
                </table>

                <?php
              }
            ?>

          </section>
 </div>