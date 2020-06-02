<div class="container">
<?php
  
  // $nomer_cheka=$chek_num['nomer_cheka']+1;
?>
        <div class="row">
         <div class="col-md-8">
        
<form action="<?=base_url()?>index.php/reg/add_user" method="post" >
         
          <div class="form-group">
            <p class="form-inline"><label for="exampleInputName2">Имя</label>&nbsp;&nbsp;
            <input type="text" class="form-control"   name="name" id="fio" value="" autofocus></p>
          
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
            <p class="form-inline"><label for="exampleInputName3">Email</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="email" name="email" id="email"  class="form-control" placeholder="Email address" ></p>
          </div>
          <div class="form-group">
            <p class="form-inline"><label for="exampleInputName3">Пароль</label>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" name="pswd"   class="form-control"  ></p>
          </div>
          <div class="form-group">
            <p class="form-inline"><label for="exampleInputName3">Статус</label>&nbsp;&nbsp;&nbsp;&nbsp;
            <select name="status" >
              <option value="1" selected>Сотрудник</option>
              <option value="2" >Администратор</option>
            </select>
            </p>
          </div>
           <input type="submit" class="btn btn-primary" value="Добавить" name="add">
          </form>
            

      
         
           
            
           
        

 </div>