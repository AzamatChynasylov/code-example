<div class="container">
  
  <div class="row">
<div class="col-md-9">
          <form action="<?=base_url('add/add_group')?>" method="post">
         <br><br>
          <div class="row">
           <div class="col-md-6">
             <div class="input-group">
                <span class="input-group-addon">Название группы&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-th-list"></span></span>
                <input  type="text" class="form-control"   name="namegroup"  autofocus required>
            </div>
           </div>
          </div>
          <br>

          <div class="row">
           <div class="col-md-6">
             <div class="input-group">
                <span class="input-group-addon">Краткое Название группы&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-bookmark"></span></span>
                <input  type="text" class="form-control"   name="namegroup2"  autofocus required>
            </div>
           </div>
          </div>
          
         <br>
          
           <div class="row">
           <div class="col-md-6">
             <div class="input-group">
                <span class="input-group-addon">Время&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span></span>
                <input type="text" class="form-control clockpicker"   name="time" value="" required>
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
           <div class="form-group">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <select name="level"  class="form-control">
              <option value="1" selected>1 уровень</option>
              <option value="2">2 уровень</option>
              <option value="3">3 уровень и более</option>
            </select>
          </div>
           <h5>Активировать  группу с</h5>
           <div class="row">
              <div class="col-md-6">
                 <div class="input-group">
                    <span class="input-group-addon">Дата &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-calendar"></span></span>
                    <input type="text" class="form-control" id="first_date_lesson" name="first_date_lesson" data-date-format="mm/dd/yyyy">
                </div>
              </div>
            </div>
            <br>
           <input type="hidden" name="metka" value="3">
            <input type="hidden" name="den" value="<?=date('m/d/Y')?>">
            <input type="hidden" name="ip" value="<?=$_SERVER["REMOTE_ADDR"]?>">
           <input type="submit" class="btn btn-primary" value="Добавить группу" name="add">
          </form>
 </div>
