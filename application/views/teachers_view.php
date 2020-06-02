<div class="col-md-8">
	<form action="<?=base_url('shedule/shedulePrint')?>" method="post">
		<input  type="text" class="form-control" id="first_date_lesson" name="date" data-date-format="mm/dd/yyyy"></p>
		<input type="submit" name="search" value="Расписание учителей" class="btn btn-primary" > <a href="<?=base_url('shedule/shedulePrintBig');?>" target="_blank" class="btn btn-danger">Расписание</a>
		<a href="<?=base_url('shedule/shedulePrintBigF');?>" target="_blank" class="btn btn-danger">Расписание на след. неделю</a>

	</form>
	
	<table class="table table-striped">
		<thead>
			<th>#</th>
			<th>Имя</th>
			<th></th>
		</thead>
		<tbody>
			<?php
			$k=0;
			 foreach($teachers as $item):
			 $k++;
			 ?>
				<tr>
				<td><?=$k?></td>
					<td>
						<a href="<?=base_url('raspisanie/teacher_detail/'.$item['id'])?>"><?=$item['name']?></a>
					</td>
					<td>
						
						<a href="<?=base_url('shedule/teacherDell/'.$item['id'])?>" class="btn btn-danger">Удалить </a>
						<a href="<?=base_url('shedule/teacherUpdate/'.$item['id'])?>" class="btn btn-warning">Исправить </a>
						<?php
							if($item['dop_info'])
								{
									$nameDay=array('Понeдельник','Вторник','Среда','Четверг','Пятница','Суббота');
									$d=substr($item['dop_info'],2,12);
									$d=date('N',strtotime($d));
									

						?>
						 <span class="bg-danger">Дежурство по <?=$nameDay[$d-1]?> <?=substr($item['dop_info'],12);?></span>
						<?php
							}
						?>
						<!-- <button class="btn btn-primary" id="dejurniy">Назначить дежурным</button> -->
					</td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>

	<a href="<?=base_url('shedule/addteachers')?>" class="btn btn-primary">Новый учитель</a>

<div class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <div class="error"></div>
                        <form class="form-horizontal" id="crud-form">
                        
                         <div class="form-group">
                                
                         </div>
                            
                            
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
</div>
