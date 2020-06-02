
<div class="col-md-8">
<?php
//print_r("<pre>");
//print_r($day_detail[1]);
//print_r("<pre/>");

?>
	<h3>Уроки на <?=$day?></h3>
	<table class="table table-bordered table-condenced">
		<thead>
			
		</thead>
		<tbody>
			
				
				<?php
				$time=array('','7.30','8.45','10.05','11.25','12.40','13.40','15.00','16.20','17.40','19.00');
					for($i=1;$i<11;$i++)
					{
				?>
					<tr>
						<td><?=$time[$i]?></td><td>
							<?php
								for($j=0;$j<count($day_detail[$i]);$j++)
								{
							?>
								
								<p><?=$day_detail[$i][$j]['gruppa']?>&nbsp;&nbsp;&nbsp;<b><?=$day_detail[$i][$j]['teacher']?></b></p>
									
								
							<?php
								}
							?>
						</td>
					</tr>
				<?php
					}
				?>
			
				

			
		</tbody>
		
	</table>
	<a href="<?=base_url()?>index.php/raspisanie/teachers" class="btn btn-primary">Назад</a>

</div>