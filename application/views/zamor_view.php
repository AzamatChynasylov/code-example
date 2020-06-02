<div class="col-md-8">
 <?php
 	 //echo('aaa');
 	//print_r($student_info);
 	//print_r($student_opl);
 ?>
 <div class="row">
<form action="<?=base_url('zamorozit/zamorstsave/'.$student_info['stid'])?>" method="post">
		 	<h3><?=$student_info['fio']?></h3>
			<div class="form-group">
                        <p class="form-inline"><label >Дата первого занятия</label>&nbsp;&nbsp;&nbsp;&nbsp;
                         <input  type="text" class="form-control" id="first_date_lesson" name="first_date_lesson" data-date-format="mm/dd/yyyy" value="<?=$student_info['first_date_lesson']?>"></p> 
            </div>
            <div class="form-group">
                        <p class="form-inline"><label >Колличество занятий</label>&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" class="form-control"   name="count_lesson" id="count_lesson"></p> 
            </div>

            <div class="form-group">
                        <p class="form-inline"><label >Дата последного занятия</label>&nbsp;
                         <input  type="text" class="form-control" id="last_date_lesson" name="last_date_lesson" value="<?=$student_info['last_date_lesson']?>"></p> 
                       
  
            </div>
            <?php
                if(!empty($student_info['id_gruppa'])){
                        ?>
                                <input type="hidden" name="nameGR" value="<?=$student_info['namegroup']?>">
                        <?php
                }
            ?>
            <input type="hidden" name="oplid" value="<?=$student_info['oplid']?>">
            <input type="submit" class="btn btn-success" value="Заморозить" name="add">

</form>

 </div>
   

 </div><!--end main container -->