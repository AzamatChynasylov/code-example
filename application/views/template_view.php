<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
     <meta name="description" content="International Language House System">
    <meta name="author" content="Azamat Chynasylov">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?=base_url()?>img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=base_url()?>img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?=base_url()?>img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>img/favicon/favicon-16x16.png">

    <title>International Language House</title>


    <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=base_url()?>css/signin.css" rel="stylesheet">
    <link href="<?=base_url()?>css/style.css" rel="stylesheet">
    <link href="<?=base_url()?>css/font-awesome.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

<div class="container">

      <div class="row">
          <div class="col-md-6">
            <h3>Добро пожаловать в Callan School <small><?=$user?></small></h3>
            <div class="">
             
              <a href="<?=base_url()?>index.php/login/log_out"class="btn  btn-warnig">Выйти</a>
            </div>
          </div>
          <div class="col-md-6">
            Сегодня <?=date("Y-m-d H:i:s"); ?>
          </div>
      </div><!-- row/header -->
      <div class="container">
        <div class="row">
        <form action="" method="<?=base_url()?>index.php/add/add_student">
          <div class="col-md-8">
                 <p>Форма для поиска Студента </p>
                  <div class="form-group">
                    <p class="form-inline"><label for="exampleInputName2">ФИО</label>
                    <input type="text" class="form-control"  placeholder="Чынасылов Азамат" name="fio" id="search"></p>
                    <div id="autocomplte"></div>
                  </div>
                  <div class="form-group">
                    <p class="form-inline"><label for="exampleInputName3">Телефон</label>
                    <input type="text" class="form-control" id="search2" placeholder="0558123193" name="tel"></p>
                  </div>
                  <div id="autocomplte2">
                    
                  </div>
                   <input type="submit" class="btn btn-primary" value="Добавить студента" name="add">
                   <button type="button" class="btn btn-warning">Изменить данные студента</button>
                    <button type="button" class="btn btn-danger">Удалить студента</button>
                 </div>
        </form>
         
         <div class="col-md-4">
             <div class="">
               <a href="" class="btn btn-info btn-lg btn-block">Отучились</a>
             </div>
             <div class="">
               <a href="" class="btn btn-info btn-lg btn-block">Группы</a>
             </div>
             <div class="">
               <a href="" class="btn btn-info btn-lg btn-block">Общая сумма</a>
             </div>
             <div class="">
               <a href="" class="btn btn-info btn-lg btn-block">Номер чека</a>
             </div>
             <div class="">
               <a href="" class="btn btn-info btn-lg btn-block">Заморозки</a>
             </div>
             <div class="">
               <a href="" class="btn btn-success btn-lg btn-block">Новые клиенты</a>
             </div>
             <div class="">
               <a href="" class="btn btn-danger btn-lg btn-block">3 Дня</a>
             </div>
        </div> 
</div>
</div><!-- /container/main-->

<footer>
  <button onclick="window.print()">Печать</button>
</footer>
</div><!-- /container/body-->

 
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?=base_url()?>js/jquery.min.js"></script>
    <script src="<?=base_url()?>js/bootstrap.js"></script>
    <script src="<?=base_url()?>js/common.js"></script>
  </body>
</html>