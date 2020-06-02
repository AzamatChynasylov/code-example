<?php
	$time_lesson=array('07:00','08:20','09:40','11:00','12:20','13:40','15:00','16:20','17:40','19:00');
	// echo '<pre>';
	// print_r($teacherLessonTime);
	// echo '</pre>';
	$m = array(
								 11 => 'Января',
								 12 => 'Февраля',
								 13 => 'Марта',
								 14 => 'Апреля',
								 15 => 'Мая',
								 16 => 'Июня',
								 17 => 'Июля',
								 18 => 'Августa',
								 19 => 'Сентября',
								 20 => 'Октября',
								 21 => 'Ноября',
								 22 => 'Декабря'
							);
				//$name_current_month=$m[$month+10];
				$times = strtotime($first_day);
				$days  = date( 'd',$times);//Number of day
				$months   = date( 'm',$times);
				$years=date('Y',$times);
				$numbers = date('N',$times);
				$months=$m[$months+10];


				$times2 = strtotime($first_day."+5 days");
				$days2  = date( 'd',$times2);//Number of day
				$months2   = date( 'm',$times2);
				//$years2=date('Y',$times2);
				//$numbers2 = date('N',$times2);
				$months2=$m[$months2+10];
//print_r('<pre>');
//print_r($teachersLesson['Елена'][0]);
//print_r('</pre>');
////echo(count($teachersLesson));
//print_r ($teachers2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <link href="<?=base_url('assets/css/style.css')?>" rel="stylesheet">
	<title>Shedule Teachers Lessons</title>
</head>
<body>
<div class="raspisanie_div">
<?php
$teachersLessonDay= $first_day;
$kolForeach=0;
foreach($teachersLesson as $key => $value) {
    //print_r ($teachersLesson[$key][0]);
    ?>
    <p class="teachersN"><?=$key?>  c   <?=$days.' '.$months?> по <?=$days2.' '.$months2?>
        <?php
        $teachersName = array_column($teachers2, 'name');
        $teachersName2 = array_search($key, $teachersName);
       // echo ($teachers2[$teachersName2]['dop_info']);

            if($teachers2[$teachersName2]['dop_info']!='')
            {
                $nameDay=array('Понeдельник','Вторник','Среда','Четверг','Пятница','Суббота');
                $d=substr($teachers2[$teachersName2]['dop_info'],2,12);
                $d=date('N',strtotime($d));
                $djs=date('d-m-Y',strtotime(substr($teachers2[$teachersName2]['dop_info'],2,12)));
                echo("<span>Дежурство в ". $nameDay[$d-1].' '.substr($teachers2[$teachersName2]['dop_info'],12)."</span>");
            }
        ?>

    <table class="table table-bordered table-condenced">
        <thead>
        <th>
            Время
        </th>
        <th>
            Понeдельник - Monday
            <br/>
            <?=date('d-m-Y',strtotime($first_day))?>
        </th>
        <th>
            Вторник -
            Tuesday<br/><?=date('d-m-Y',strtotime($first_day)+(86400))?>
        </th>
        <th>
            Среда -
            Wednesday<br/><?=date('d-m-Y',strtotime($first_day)+(86400*2))?>
        </th>
        <th>
            Четверг -
            Thursday <br/><?=date('d-m-Y',strtotime($first_day)+(86400*3))?>
        </th>
        <th>
            Пятница -
            Friday <br/><?=date('d-m-Y',strtotime($first_day)+(86400*4))?>
        </th>
        <th>
            Суббота -
            Saturday <br/><?=date('d-m-Y',strtotime($first_day)+(86400*5))?>
        </th>

        </thead>
        <tbody>
        <?
        for($i=0;$i<10;$i++)
        {
            ?>
            <tr>
                <td><?=$time_lesson[$i]?></td>
            <?
            for($j=0;$j<6;$j++){


        ?>

            <td>
<?php
                //                $arr = array_filter($teachersLesson[$key], function($ar) {
                //                    return ($ar['name'] == 'cat 1');
                //                    //return ($ar['name'] == 'cat 1' AND $ar['id'] == '3');// you can add multiple conditions
                //                });

$teachersLessonDay = date('Y-m-d',strtotime($first_day."+".$j." days"));
//echo ($teachersLessonDay);

$colors = array_column($teachersLesson[$key], 'start');
$k = array_search($teachersLessonDay.' '.$time_lesson[$i].':00', $colors);

//echo ($k);
if(!is_bool($k)){
    $infoG=mb_strtolower(mb_substr($teachersLesson[$key][$k]['description'], 0, 3));
    //echo($infoG);
    if($infoG=='инд' || $infoG=='out' || $infoG=='tal' || $infoG=='gra')
    {
       //echo(mb_substr($teachersLesson[$key][$k]['shortdesc'], 0, 9));
       echo($teachersLesson[$key][$k]['shortdesc']);
    }
    else{
        echo('+');
    }
}
else{

}

}
?>
            </td>
        </tr>
        <?}?>
        </tbody>
    </table>
<?
//    for($i=0; $i < count($teachersLesson[$key]); $i++){
//
//
//    }

}
?>
</div>



	
</body>
</html>