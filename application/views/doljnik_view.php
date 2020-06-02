<div class="col-md-8">
	<?php
		//print_r($dolj);
	?>
		<table class="table table-bordered table-condenced">
			<thead>
				<th>#</th>
				<th>Имя студента</th>
				<th>Дата первого занятия</th>
				<th>Долг</th>
				
			</thead>
			<tbody>
				<?php
			//	print_r($dolj);
				$k=0;
				if(!empty($dolj))
				{
					for ($i=0; $i <count($dolj) ; $i++) 
					{ 
						
							$k++;
							//$dolj=$this->student_model->get_name_st($data['dolj'][$i][$j]['id_student']);
						?>
					<tr>
						<td><?=$k;?></td>
						<td><a href="<?=base_url('student/get_student/'.$dolj[$i]['id_student'])?>"><?=$dolj[$i]['fio']?></a> </td>
						<td><?=date("d-m-Y", strtotime($dolj[$i]['first_date_lesson']))?></td>
						<td><?=$dolj[$i]['dolg']?></td>
						
					</tr>
				<?php 	
						//print_r($dolj);
						//$dolj[$i]=$this->student_model->get_name_st($data['dolj'][$i]['id_student']);
						//$data['dolj'][$i]['name']=$dolj[$i]['fio'];
					}
				 
				 	
				 
					}
				?>
				
			</tbody>
		</table>
	
</div>