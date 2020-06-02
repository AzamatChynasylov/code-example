<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="International Language House System">
    <meta name="author" content="Azamat Chynasylov">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?=base_url('assets/img/favicon/android-icon-192x192.png')?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=base_url('assets/img/favicon/favicon-32x32.png')?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?=base_url('assets/img/favicon/favicon-96x96.png')?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url('assets/img/favicon/favicon-16x16.png')?>">

    <title>International Language House</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url('assets/css/bootstrap.css')?>" rel="stylesheet">
     <link href="<?=base_url('assets/css/font-awesome.css')?>" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?=base_url('assets/css/signin.css')?>" rel="stylesheet">

   

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="bgLogin">
        <div class="loginForm">
            
            <div class="logo">
                <img src="<?=base_url('assets/img/logo.png')?>" alt="LOGOTIP International Language House">
                <h2>International Language House</h2>
            </div>
            <?php

                if(form_error('email'))
                {
                    $k='has-error';
                }
                else
                {
                    $k='';
                }
                if(form_error('pwd'))
                {
                    $k1='has-error';
                }
                else
                {
                    $k1='';
                }
                if($error)
                {
                    //$k='has-error';
                    $k1='has-error';
                }
            ?>            
                        
              <form class="form-signin" action="<?=base_url()?>" method="post">
                <h4>Пожалуйста авторизуйтесь</h4>
                <div class="input-group <?=$k;?>">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus value="<?php echo set_value('email'); ?>">

                </div>
                <?php
                    if(form_error('email'))
                    {
                       ?>
                           <div class="bg-danger">
                                
                                <?php echo form_error('email'); ?>
                                    
                            </div>
                       <?php 
                    }
                ?>
                
                <br>
                
               

                <div class="input-group <?=$k1;?>">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input type="password" name="pwd" id="inputPassword" class="form-control" placeholder="Password" required>
                </div>
                <?php
                    if(form_error('pwd'))
                    {
                       ?>
                            <div class="bg-danger">
                                
                                <?php echo form_error('pwd'); ?>
                                    
                            </div>
                       <?php 
                    }
                ?>
                <br>
                <div class="">
                   <h4 class="text-red text-center"><?=$error;?></h4> 
                </div> 
                <input type="hidden" name="den" value="<?=date('d-m-Y')?>">
                <input type="hidden" name="ip" value="<?=$_SERVER["REMOTE_ADDR"]?>">
                <input type="hidden" name="metka" value="1">
                <br>
                <input  class="btn btn-lg btn-primary btn-block" type="submit" name="enter" value="Войти">
              </form>

        </div> <!-- /container -->
    </div> 



    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?=base_url('assets/js/jquery.min.js')?>"></script>
    <script src="<?=base_url('assets/js/bootstrap.js')?>"></script>
    <script src="<?=base_url('assets/js/common.js')?>"></script>
  </body>
</html>