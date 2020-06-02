 <div class="col-md-8">
 
 <?php
 		//print_r($student);

 	?>
 	<table class="table table-striped table-bordered table-hover">
 	<thead>
 		<th>
 			#
 		</th>
 		<th>
 			Имя студента 
 		</th>
 		<th>
 			С
 		</th>
    <th>
      По
    </th>
 		<th>
 			Колличество Уроков
 		</th>
		 <th>
 			Старая группа
 		</th>
 		
 	</thead>
 	<tbody>
<?php 
$kol=0;
		  foreach ($student as $item):
			$kol++;
          ?>
          <tr>
          <td><?=$kol?></td>
          <td><a href="<?=base_url('student/get_student/'.$item['stid'])?>"><?=$item['fio']?></a> </td>
          <td><?=date('d-m-Y', strtotime($item['first_date_lesson']))?></td>
          <td><?=date('d-m-Y', strtotime($item['last_date_lesson']))?></td>
          <td><?=$item['count_lesson']?></td>
		  <td><?=$item['tranid']?></td>
          
           
            
          </tr>
      <?php
      endforeach; 
?>
 		
</tbody>
</table>

 </div><!--end main container -->