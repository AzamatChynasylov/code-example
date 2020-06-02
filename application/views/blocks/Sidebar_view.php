<div class="col-md-3">

             <div class="">
               <a href="<?=site_url('oldstudent')?>" class="btn btn-info btn-lg btn-block">Отучились</a>
             </div>
             <div class="">
               <a href="<?=site_url('zamorozit/get_zamor_st')?>" class="btn btn-info btn-lg btn-block">Замороженные</a>
             </div>
             <div class="">
               <a href="<?=site_url('chek')?>" class="btn btn-info btn-lg btn-block">Поиск по чеку</a>
						 </div>
						 <?php
							$data['user_status']=$this->session->userdata('user_status');
							if($data['user_status']==2){
							?>
             <div class="">
               <a href="<?=site_url('ob_summa')?>" class="btn btn-info btn-lg btn-block">Общая сумма</a>
						 </div>
							<?php }?>
             
              <div class="">
               <a href="<?=site_url('book')?>" class="btn btn-info btn-lg btn-block">Книги</a>
             </div>
             
            
             <!-- <div class="">
               <a href="<?//=base_url()?>index.php/info" class="btn btn-danger btn-lg btn-block">3 Дня</a>
             </div> -->
              <div class="">
               <a href="<?=site_url('probnik')?>" class="btn btn-danger btn-lg btn-block">Пробный урок</a>
             </div>

             <div class="">
               <a href="<?=site_url('doljnik')?>" class="btn btn-danger btn-lg btn-block">Должники</a>
             </div>
             <div class="">
               <a href="<?=site_url('futurest')?>" class="btn btn-info btn-lg btn-block">Набор</a>
             </div> 
             <div class="">
               <a href="<?=site_url('shedule')?>" class="btn btn-info btn-lg btn-block">Расписание</a>
             </div>
  </div> 
</div><!-- end row -->

