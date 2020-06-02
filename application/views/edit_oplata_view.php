 <div class="col-md-9">
 	<?php
		//echo('aaa');
		//print_r($oplata_ed);
		?>
 	<form action="<?= base_url('edit/save_edit_oplata/' . $oplata_ed['id']) ?>" method="post">

 		<table class="table table-striped table-bordered table-hover table-condenced oplview">
 			<thead>
 				<th>
 					#
 				</th>
 				<th>
 					C
 				</th>
 				<th>
 					Колличество Уроков
 				</th>
 				<th>
 					ПО
 				</th>


 			</thead>
 			<tbody>

 				<tr>
 					<td></td>
 					<td><input type="text" id="first_date_lesson" name="first_date_lesson" value="<?= date('d-m-Y', strtotime($oplata_ed['first_date_lesson'])) ?>"></td>
 					<td><input type="text" id="count_lesson" name="count_lesson" value="<?= $oplata_ed['count_lesson'] ?>"></td>
					 <td><input type="text" id="last_date_lesson" name="last_date_lesson" value="<?= date('d-m-Y', strtotime($oplata_ed['last_date_lesson'])) ?>"></td>
				</tr>
 				<tr>
 					<td></td>
 					<td>Оплата за учебу</td>
 					<td>Долг за учебу</td>
 					<td>Баланс</td>

 				</tr>
 				<tr>
 					<td></td>
 					<td><input type="text" id="summa" name="summa" value="<?= $oplata_ed['summa'] ?>"></td>
 					<td><input type="text" id="dolg" name="dolg" value="<?= $oplata_ed['dolg'] ?>"></td>
 					<td><input type="text" id="balans" name="balans" value="<?= $oplata_ed['balans'] ?>"></td>

 				</tr>
 				<tr>
 					<td></td>
 					<td>Оплата за книгу</td>
 					<td>Долг за книгу</td>
 					<td>Комментарий к оплате</td>
 				</tr>
 				<tr>
 					<td></td>
 					<td><input type="text" id="book_price" name="book_price" value="<?= $oplata_ed['book_price'] ?>"></td>
 					<td><input type="text" id="ks_price" name="ks_price" value="<?= $oplata_ed['ks_price'] ?>"></td>
 					<td><input type="text" id="comment" name="comment" value="<?= $oplata_ed['comment'] ?>"></td>


 				</tr>
 			</tbody>
 		</table>
 		<input type="submit" class="btn btn-success" value="Сохранить">

 		<a href="<?= base_url('student/get_student/' . $oplata_ed['id_student']) ?>" class="btn btn-info">Отмена</a>

 	</form>
 </div>
 <!--end main container -->