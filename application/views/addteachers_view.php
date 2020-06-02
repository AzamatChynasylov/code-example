<div class="col-md-8">
	<form action="<?=base_url()?>index.php/raspisanie/saveteacher" method="post">
		<p class="teacher_inf"><input type="text" name="name" placeholder="Teacher name here"></p>
		<p class="teacher_inf"><input type="text" name="phone" placeholder="Teacher phone here"></p>
		
		<br/>
		<br/>
		<input type="submit" name='save' class="btn btn-primary" value="Сохранить">
		<a href="<?=base_url()?>index.php/shedule/teachers" class="btn btn-default">Назад</a>
	</form>
</div>