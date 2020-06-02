<div class="container">
<?php
  
   $nomer_cheka=$chek_num['nomer_cheka']+1;
?>
        <div class="row">
         <div class="col-md-8">
        
<form action="" method="" id="staddform2">
         
          <div class="form-group">
            <p class="form-inline"><label for="exampleInputName2">ФИО</label>
            <input type="text" class="form-control"   name="fio" id="fio" value="<?=$login?>" autofocus></p>
          
          </div>
          <div class="phone_img">
            <input type="button" class="btn btn-primary" id="megacom" value="Megacom">
            <input type="button" class="btn btn-primary" id="o" value="O!">
            <input type="button" class="btn btn-primary" id="beeline" value="Beeline">
          </div>
          <div class="viewtel">
          <div class="row">
            <div class="col-md-4">
              <div class="megacom">
            <select name="" id="nomermega" class="form-control">
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
          <div class="o">
            <select name="" id="nomero" class="form-control">
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
            </select>
           
          </div>
          <div class="beeline" >
            <select name="" id="nomerbeeline" class="form-control">
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
            </div>
            <div class="col-md-4">
              <input type="text" id="nomertel" class="form-control">
            </div>
          </div>
          
          </div>
           
          
            <input type="hidden" class="form-control" id="tel"  name="tel">

          <div class="form-group">
            <p class="form-inline"><label for="exampleInputName3">Email</label>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="email" name="email" id="email"  class="form-control" placeholder="Email address" >
          </div>
           
          <div class="form-group">
            <p class="form-inline"><label for="exampleInputName3">Группа</label>&nbsp;&nbsp;
      
            <select class="form-control" name="gruppa" id='gruppa'>
                 <option value="">Выберите группу из списка</option>
                <?php foreach ($gruppa as $item):?>
                  <option value="<?=$item['id']?>"><?=$item['namegroup']?></option>
                <?php endforeach;?>
            </select></p>
          </div>
         
          <div class="form-group">
            <p class="form-inline"><label for="exampleInputName3">Доп. информация</label>&nbsp;&nbsp;&nbsp;
            
          <textarea class="form-control" name="dop_info" rows="3"></textarea></p>
          </div>
          <!------------------------------------------------------------------------------------------------------------------>
          <h3>Оплата студента</h3>
          <div class="form-group" >
            <p class="form-inline"><label >Оплата</label>&nbsp;&nbsp;&nbsp;
            <input type="text" class="form-control"  placeholder="Введите сумму" name="summa" id="summast"></p>
        </div>

           
            
            <div class="form-group">
                        <p class="form-inline"><label >Баланс</label>&nbsp;&nbsp;&nbsp;
                        <input type="text" class="form-control"   name="balans" id="balans"></p> 
            </div>
            <div class="form-group">
                        <p class="form-inline"><label >Долг</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" class="form-control"   name="dolg" id="opltdolg"></p> 
            </div>
            <h3>Период обучения</h3>
            <div class="form-group">
                        <p class="form-inline"><label >Дата первого занятия</label>&nbsp;&nbsp;&nbsp;&nbsp;
                         <input  type="text" class="form-control" id="first_date_lesson" name="first_date_lesson" data-date-format="mm/dd/yyyy"></p> 
            </div>
            <div class="form-group">
                        <p class="form-inline"><label >Колличество занятий</label>&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" class="form-control"   name="count_lesson" id="count_lesson"></p> 
            </div>

            <div class="form-group">
                        <p class="form-inline"><label >Дата последного занятия</label>&nbsp;
                         <input  type="text" class="form-control" id="last_date_lesson" name="last_date_lesson" ></p> 
                       
            </div>

        
                        <input type="hidden" name="metka" value="4">
                        <input type="hidden" name="nomer_cheka" value="<?=$nomer_cheka?>">
                       


<!------------------------------------------------------------------------------------------------------------------>


            <input type="hidden" name="date_registration"  class="form-control"  value="<?=date('d-m-Y')?>">
            <input type="hidden" name="metka" value="2">
            <input type="hidden" name="den" value="<?=date('d-m-Y')?>">
            <input type="hidden" name="ip" value="<?=$_SERVER["REMOTE_ADDR"]?>">
            
           <input type="submit" class="btn btn-primary" value="Добавить студента" name="add" id="stadd">
          </form>
    <!-------printer------------------------------------------------------------------------------------>      
        <div id="modal_form"><!-- Само окно --> 
        
<div id="printer">
      
      <h4><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Callan School</strong></h4>
      
      <p><strong>Чек №&nbsp;<?=$nomer_cheka?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Дата:&nbsp;<?=date('d-m-Y')?></p>
      <table class="table-condensed">
        <thead id="thead">
          <th >ФИО</th>
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
          <th ></th>
          
        </thead>
        <tbody id="thead">
          <tr>
            <td>Группа</td>
            <td><p id="gruppacheck"></p></td>
          </tr>
          <tr>
            <td>Долг:</td>
            <td> <p id="dol3t"></p></td>
          </tr>
          <tr>
            <td>Оплатил(а):</td>
            <td> <p id="opl"></p></td>
          </tr>
          <tr>
            <td>Баланс</td>
            <td> <p id="balanschek"></p></td>
            
          </tr>
          <tr>
            
            <td> <p id="oplza"></p></td>
            
          </tr>
        </tbody>
      </table>
             
            
          <p class="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Мы всегда рады вам!</strong> </p>
          <p class="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Web : callanschool.in.kg</strong> </p>
          <p class="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>(+966) 770 89 04 05</strong></p>
          

      </div>
      <!-- Тут любое содержимое -->
</div>
<div id="overlay"></div><!-- Подложка -->
         
 </div>