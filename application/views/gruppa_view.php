<div class="container">
        <div class="row">
<div class="col-md-8">
<?php 
//print_r($gruppa);
?>
 <section>
	<?php
	//print_r($gruppat);

	//echo money_format('%.2n', $gruppat[0][0]['time'])

	//print_r($gruppat);
	?>
		<select class="form-control selectpicker" onChange="if(this.options[this.selectedIndex].value!=''){window.location=this.options[this.selectedIndex].value}else{this.options[selectedIndex=0];}">
		<option value="">Выберите группу из списка</option>
	<?php

		for ($i=0; $i <count($gruppat) ; $i++)
		{ 
			$string=(string)$gruppat[$i][0]['time'];
			echo $string;
			$string2=substr($string, 0,2);
			$string3=substr($string, 2);
			$string=$string2.':'.$string3;


		?>
		


		<option value="" class="bg-primary opt"><?=$string?></option>
			<?php foreach ($gruppat[$i] as $item):

				$bgc='';

				if($item['lastDate']=='')
				{
					$bgc='redNot';
				}

			?>
			    <option value="<?=base_url('gruppa/student_sp/'.$item['id'])?>" data-subtext="<?=$item['stCont']?>" 

			    	class="<?=$bgc?>"


			    	><?=$item['namegroup']?></option>
			<?php endforeach;?>
		
		<?php
		}
		if(isset($gruppaindi)){
			?>
			
				<option value="" class="bg-primary opt">Индивидуальные</option>
				<?php foreach ($gruppaindi as $item):?>
			    <option value="<?=base_url('gruppa/student_sp/'.$item['id'])?>"><?=$item['namegroup']?></option>

				<?php endforeach;?>
			<?php
		}
		?>
		<?php 
			if(count($gruppa)>0){
				//print_r($gruppa)
		?>
		<option value="" class="bg-primary opt">Изменить</option>
				<?php foreach ($gruppa as $item):?>
			    <option value="<?=base_url('gruppa/student_sp/'.$item['id'])?>"><?=$item['namegroup']?></option>
				<?php endforeach;?>
			<?php
		}
		?>
		</select>

</section>

<section class="adgr">

	<a href="<?=base_url('add/add_gruppa')?>" class="btn btn-primary">Добавить группу</a>
	
</section>

</div>
