 <div class="col-md-8">
 <?php
 	//echo('aaa');
 	//print_r($student_info);
 ?>
 <form action="#" method="post">

<table class="table table-striped table-bordered table-hover">
 	<thead>
 		<th>
 			#
 		</th>
 		<th>
 			ФИО
 		</th>
 		<th>
 			Группа
 		</th>
 		<th>
 			Телефон
 		</th>
 		<th>
 			Email
 		</th>
 		<th>
 			Дата рождения
 		</th>
 		<th>Доп.информация</th>
 	</thead>
 	<tbody>
 		<tr>
 		<td></td>
 		<td ><?=$student_info['fio']?></td>
 		<td><?=$student_info['id_gruppa']?></td>
 		<td><?=$student_info['phone']?></td>
 		
		<!--<?//=date("d/m/Y", strtotime($student_info['dateofbirth']))?> -->
 		
 		<td><?=$student_info['metka']?></td>
 		</tr>
 	</tbody>
 </table>
   

 </div><!--end main container -->