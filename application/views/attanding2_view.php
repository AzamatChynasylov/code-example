<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
 
    <link href="<?=base_url()?>css/style.css" rel="stylesheet">
	<title></title>
</head>
<body class="attanBg">
	
		
				
				
				<h4>Группа <?=$gruppa['namegroup']?> </h4>
<section class="attanding_list">
					<table class="attanding">
						<thead>
								<tr>
									<td>#</td>
									<td>Имя</td>
									<td>Телефон</td>
									<td>Доп.Инфо</td>
								</tr>
						</thead>
								
						<tbody > 
						<?php
							for($i=0;$i<count($student_sp);$i++)
							{
								?>
									<tr>
										<td><?=$i+1?></td>
										<td><?=$student_sp[$i]['fio']?></td>
										<td><?=$student_sp[$i]['phone']?></td>
										<td><?=$student_sp[$i]['metka']?></td>
									</tr>
								<?php
							}
						?>
					</tbody>



				</table>
</section>
	</body>
	</html>