<!DOCTYPE html>
<html lang="en">
  <head>
		<meta charset="utf-8">
		<base href="<?php echo base_url(); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link href="assets/css/reset.css" rel="stylesheet">
    <meta name="description" content="International Language House System">
    <meta name="author" content="Azamat Chynasylov">
    <link rel="icon" type="image/png" sizes="192x192"  href="assets/img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">

    <title>International Language House</title>

   
   
    <!-- Bootstrap core CSS -->
    <link href="<?=base_url('assets/css/bootstrap.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/css/bootstrap-datepicker3.css')?>" rel="stylesheet">
    <!-- Custom styles for this template -->
    
    
    <link href="<?=base_url('assets/css/font-awesome.css')?>" rel="stylesheet">
   
    
    <link href="<?=base_url('assets/css/styletabs.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/css/pwstabs.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/css/bootstrap-clockpicker.min.css')?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap-colorpicker.min.css')?>">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-select.min.css">

    <link href="<?=base_url('assets/css/style.css')?>" rel="stylesheet">
 <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
<section class="header">
  <div class="container">
    <div class="row">
      <div class="col-md-2">
        <div class="logo">
          <img src="<?=base_url('assets/img/logo.png')?>" alt="Logo" class="img-responsive">
        </div>
      </div>
      <div class="col-md-5">
        <h4>Добро пожаловать в International Language House <small><?=$this->session->userdata('user')?></small></h4>
      </div>
      <div class="col-md-5">
        <p><span class="calendar"><i class="fa fa-calendar" aria-hidden="true"></i> <?=date("d-m-Y H:i:s");?></span><span class="iconOf"><a href="<?=site_url('login/log_out')?>"><i class="fa fa-power-off" aria-hidden="true"></i></a></span></p>
      </div>
    </div>
  </div>
</section>
<div class="container">
      <div class="row">
        <div class="header-nav">
          <div class="col-md-2">
            <a href="<?=site_url('page')?>" class="btn btn-primary">Поиск Студента<i class="fa fa-search" aria-hidden="true"></i></a>
          </div>
          <div class="col-md-2">
            <a href="<?=site_url('add')?>" class="btn btn-primary">Добавить Студента<i class="fa fa-user-plus" aria-hidden="true"></i></a>
          </div>
          <div class="col-md-2">
            <a href="<?=site_url('add/add_gruppa')?>" class="btn btn-primary">Добавить Группу<i class="fa fa-plus-square" aria-hidden="true"></i></a>
          </div>
          <div class="col-md-2">
            <a href="<?=site_url('gruppa')?>" class="btn btn-primary">Группы <i class="fa fa-align-justify" aria-hidden="true"></i></a>
          </div>
          
          
           
          
          <!--<a href="index.php/oplata/kniga" class="btn btn-primary">Оплата за книгу,cd...</a>-->
        </div>
      </div>
    
    <br>
    <div class="row">