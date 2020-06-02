<?php
	date_default_timezone_set('Asia/Bishkek');
?>
<div class="row">
    <div class="col-md-9">
        <br><br>
        <div id="Probpusk">

            <h4><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INTERNATIONAL LANGUAGE HOUSE</strong></h4>
            <p>Дата:&nbsp;<?=date("d-m-Y H:i:s")?></p>
            <p>Я <?=mb_convert_case($student_info['fio'], MB_CASE_TITLE, "UTF-8");?>, студент </p>
            <p>группы <?=$student_info['tranid']?> обязуюсь произвести</p>
            <p> оплату за обучение в размере <input type="text" legth=""> сом до следующего занятия </p>
            <p>В случае неуплаты в назначенный срок к занятиям не допускаюсь.</p>
            <p>Подпись___________</p>

        </div>
        <p><button class="btn btn-success"  id="printProbpusk">Напечатать</button> <a  class="btn btn-primary" href="<?=base_url('student/get_student/'.$student_info['stid']);?>">Назад</a>
        </p>
    </div><!--end main container -->

