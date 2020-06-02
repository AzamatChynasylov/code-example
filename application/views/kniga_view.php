<div class="col-md-9">
         <form action="<?=base_url()?>index.php/add/add_kniga" method="post">
         <h2>Форма для оплаты </h2>
          <div class="form-group">
            <p class="form-inline"><label for="exampleInputName2">Оплата за книгу</label>&nbsp;&nbsp;
            <input type="text" class="form-control"   name="book_price" ></p>
            <div id="autocomplte"></div>
          </div>
          
         
           <input type="hidden" name="date_payment" value="<?=date('d-m-Y')?>">
           <input  type="hidden" class="form-control" name="date_payment" value="<?=date('d-m-Y')?>"></p> 
            <input type="hidden" name="metka" value="5">
            <input type="hidden" name="den" value="<?=date('d-m-Y')?>">
            <input type="hidden" name="ip" value="<?=$_SERVER["REMOTE_ADDR"]?>">
           <input type="submit" class="btn btn-primary" value="Добавить оплату" name="add">
           
          </form>

 </div>