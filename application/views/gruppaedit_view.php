<div class="col-md-8">
         <form action="<?=base_url('edit/save_gruppaedit/'.$gruppa['id'])?>" method="post">
         <div class="row">
           <div class="col-md-8">
             <div class="input-group">
                <span class="input-group-addon">Название группы&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-th-list"></span></span>
                <input  type="text" class="form-control"   name="groupname" value="<?=$gruppa['namegroup']?>" required>
                <input type="hidden" name="oldGroupName" value="<?=$gruppa['namegroup']?>"> 
            </div>
           </div>
          </div>
          
          <?php
            $string=(string)$gruppa['time'];
           // echo $string;
            $string2=substr($string, 0,2);
            $string3=substr($string, 2);
            $gruppa['time']=$string2.':'.$string3;
          ?>
          <br>
          <div class="row">
           <div class="col-md-8">
             <div class="input-group">
                <span class="input-group-addon">Короткое Название группы&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-th-list"></span></span>
                <input  type="text" class="form-control"   name="groupname21" value="<?=$gruppa['shortname']?>" required>
                <input type="hidden" name="oldGroupNameShort" value="<?=$gruppa['shortname']?>"> 
            </div>
           </div>
          </div>
          <br>
           <div class="row">
           <div class="col-md-8">
             <div class="input-group">
                <span class="input-group-addon">Время&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span></span>
                <input  type="text" class="form-control clockpicker"  name="time" value="<?=$gruppa['time']?>" required>
            </div>
           </div>
          </div>

         
          <div class="form-group">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <select name="metka2"  class="form-control">
              <option value="2" selected>Обычный</option>
              <option value="1">Индивидуальный</option>
            </select>
          </div>
          <h5>Выберите уровень группы</h5>
          <input type="hidden" value="<?=$gruppa['level']?>" name="oldLevel">
           <div class="form-group">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <select name="level"  class="form-control">
              <?php 
                if($gruppa['level']==''){
                  ?>
                      <option value="1" selected>1 уровень</option>
                      <option value="2">2 уровень</option>
                      <option value="3">3 уровень и более</option>
                  <?php
                }
              ?>
              
              <?php 
                if($gruppa['level']==1){
                  ?>
                      <option value="<?=$gruppa['level']?>" selected>1 уровень</option>
                      <option value="2">2 уровень</option>
                      <option value="3">3 уровень и более</option>
                  <?php
                }
              
                if($gruppa['level']==2){
                  ?>
                      <option value="<?=$gruppa['level']?>" selected>2 уровень</option>
                       <option value="1" >1 уровень</option>
                       <option value="3">3 уровень и более</option>
              
                  <?php
                }
              
                if($gruppa['level']==3){
                  ?>
                      <option value="<?=$gruppa['level']?>" selected>3 уровень и более</option>
                      <option value="1" >1 уровень</option>
                      <option value="2">2 уровень</option>
                      
                  <?php
                }
              ?>
             
            </select>
          </div>
            <?php 
              if($gruppa['lastDate']=='')
              {
                ?>
                     <div class="row">
           <div class="col-md-8">
             <div class="input-group">
                <span class="input-group-addon">Активировать с урока &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-education"></span></span>
                <input  type="number" class="form-control"  name="lessonCount">
            </div>
           </div>
          </div>
                <?php
              }
             // print_r($user);
              $data['user_status']=$this->session->userdata('user_status');
              if($data['user_status']==2 && $gruppa['lastDate']!=''){
            ?>
             <div class="row">
           <div class="col-md-8">
             <div class="input-group">
                <span class="input-group-addon">Продлить на урок &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-education"></span></span>
                <input  type="number" class="form-control"  name="lessonCountAd" value="">
                <input type="hidden" name="currentD" value="<?=$gruppa['lastDate']?>">
            </div>
           </div>
          </div>
          <?php } ?>
         <br>
           <input type="submit" class="btn btn-primary" value="Сохранить" name="save">
           
          </form>
</div>