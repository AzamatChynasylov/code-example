<div class="col-md-8">
	<div class="alert"></div>
	<form action="<?=base_url()?>index.php/raspisanie/update_teacher" method="post">
		<p><input type="text" value="<?=$teacher['name']?>" name='name'></p>
		<p><input type="text" value="<?=$teacher['telefon']?>" name='telefon'></p>
		<?php
			if($teacher['dop_info'])
			{
				$nameDay=array('Понeдельник','Вторник','Среда','Четверг','Пятница','Суббота');
				$d=substr($teacher['dop_info'],2,12);
				$d=date('N',strtotime($d));
				$djs=date('d-m-Y',strtotime(substr($teacher['dop_info'],2,12)));
		?>
		<input type="hidden" value="<?=$djs?>" id='djs'>
		<input type="hidden" value="<?=substr($teacher['dop_info'],12);?>" id='djs2'>
		
		  <p class="bg-danger">Дежурство по <?=$nameDay[$d-1]?> <?=substr($teacher['dop_info'],12);?></p>
		
		
				<button type="button" class="btn btn-primary" id="delldejurniy">Убрать из дежурство</button>
				<button type="button" class="btn btn-primary" id="updatedejurniy">Изменить дежурство</button>
				
		<?

			}
			else
			{
				?>

					<button type="button" class="btn btn-primary" id="dejurniy">Назначить дежурным</button>
				<?php
			}
		?>
		
		<input type="hidden" value="<?=$teacher['id']?>" name='id'>
		<br/>
		<br/>
		<input type="submit" name="save" class="btn btn-primary" value="Сохранить">
		<a href="<?=base_url('index.php/raspisanie/teacher_detail/');?>/<?=$teacher['id']?>" class=" btn btn-danger">Назад</a>

	</form>
	<div class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                    	<div class="container">
                    		
                    	
                        <div class="error"></div>
                        <form class="form-horizontal" id="crud-form">
                        
                        <input type="hidden" value="<?=$teacher['id']?>" name='id' id="idteacher">
                        <input type="hidden" value="<?=$teacher['name']?>" name='teachername' id="teachername">
						<input type="hidden" value="<?=$teacher['telefon']?>" name='teachertelefon' id="teachertelefon"> 
                        <div class="form-group">
                              <p class="form-inline"><label >Дата</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input  type="text" class="form-control" id="first_date_lesson" name="first_date_lesson" data-date-format="yyyy-mm-dd"></p> 
                        </div>
                         <div class="form-group">
				            <p class="form-inline"><label for="exampleInputName3">Время</label>
				            &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="form-control"   name="time" id="time" ></p>
				          </div>
                        </form>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
</div>