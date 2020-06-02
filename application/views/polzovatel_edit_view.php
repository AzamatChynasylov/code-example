 <div class="col-md-8">

<?php
  
  // $nomer_cheka=$chek_num['nomer_cheka']+1;
?>
      
<form action="<?=base_url()?>index.php/reg/save_user/<?=$polzovatel['id']?>" method="post" >
          <div class="form-group">
            <p class="form-inline"><label for="exampleInputName2">Имя</label>
            <input type="text" class="form-control"   name="name"  value="<?=$polzovatel['name']?>" autofocus></p>
          
          </div>

          <div class="form-group">
            <p class="form-inline"><label for="exampleInputName3">Email</label>
            <input type="email" name="email" class="form-control" value="<?=$polzovatel['email']?>">
          </div>

          <div class="form-group">
            <p class="form-inline"><label for="exampleInputName3">Телефон</label>
            <input type="text" class="form-control"  name="tel" value="<?=$polzovatel['tel']?>"></p>
          </div>
           <div class="form-group">
            <p class="form-inline"><label for="exampleInputName3">Пароль</label>
            <input type="text" class="form-control"  name="pswd" value="<?=$polzovatel['pswd']?>"></p>
          </div>
          
           
          <div class="form-group">
            <p class="form-inline"><label for="exampleInputName3">Группа</label>
<section>           
             <select class="form-control" name="status">
                 
              <?php
                if($polzovatel['status']==1)
                {
                 // $status='Сотрудник';
                  ?>
                    <option selected value="<?=$polzovatel['status']?>">Сотрудник</option>
                    <option  value="2">Администратор</option>
                  <?php
                }
                else
                {
                  //$status='Администратор';
                  ?>
                    <option selected value="<?=$polzovatel['status']?>">Администратор</option>
                    <option  value="1">Сотрудник</option>
                  <?php
                }
              ?>
              </select>
            </p>
</section> 
          </div>
          
         
           <input type="submit" class="btn btn-primary" value="Сохранить изменения" name="refresh">
          
</form>
         
 </div>