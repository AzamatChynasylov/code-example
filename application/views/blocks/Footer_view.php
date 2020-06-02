<section>
	<div class="row">
  <?php
$data['user_status']=$this->session->userdata('user_status');
if($data['user_status']==2){
?>
<a href="<?=site_url('otchet')?>" class="btn btn-primary">Отчёт</a>
<a href="<?=site_url('reg')?>" class="btn btn-primary">Новый пользователь</a>
<a href="<?=site_url('reg/user')?>" class="btn btn-primary">Пользователи</a>
<a href="<?=site_url('reklama')?>" class="btn btn-primary">Реклама</a>
<?php 
}
  ?>
		
	</div>
</section>
<footer>
  
</footer>
<br>
<br>
</div><!-- /container/body<button onclick="window.print()">Печать</button>-->

 
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?=base_url('assets/js/jquery.min.js')?>"></script>
    <script src="<?=base_url('assets/js/jquery.highlight.js')?>"></script>
    
    <script src="<?=base_url('assets/js/bootstrap.js')?>"></script>
    <script src="<?=base_url('assets/js/bootstrap-datepicker.js')?>"></script>
    <script src="<?=base_url('assets/js/jQuery.print.js')?>"></script>
    <script src="<?=base_url('assets/js/main.js')?>"></script>
    <script src="<?=base_url('assets/js/modernizr.js')?>"></script>
    
    <script src="<?=base_url('assets/js/jquery.pwstabs.js')?>"></script>
    <script src="<?=base_url('assets/js/jquery.validate.min.js')?>"></script>
    <script src="<?=base_url('assets/js/bootstrap-clockpicker.min.js')?>"></script>
    
    
    <link rel='stylesheet' href="<?=base_url('assets/js/lib/fc/fullcalendar.css')?>"/>
    <script src="<?=base_url('assets/js/lib/fc/lib/moment.min.js')?>"></script>
    <script src="<?=base_url('assets/js/lib/fc/fullcalendar.min.js')?>"></script>
    <script src="<?=base_url('assets/js/lib/fc/locale/ru.js')?>"></script>
    
    <script src="<?=base_url('assets/js/bootstrapValidator.min.js')?>"></script>
    <script src="<?=base_url('assets/js/bootstrap-colorpicker.min.js')?>"></script>

    <script src="<?=base_url('assets/js/jquery.scannerdetection.js')?>"></script>
    
    <script src="assets/js/bootstrap-select.min.js"></script>

    <script src="<?=base_url('assets/js/raspisanie.js')?>"></script>
    <link rel="stylesheet" href="<?=base_url('assets/css/calendarfc.css')?>">
    
    <script src="<?=base_url('assets/js/vue/vue.min.js')?>"></script>
    <script src="<?=base_url('assets/js/vue/axios.min.js')?>"></script>
    <script src="<?=base_url('assets/js/vue/vue-resource.min.js')?>"></script>
    <script src="<?=base_url('assets/js/vue/vee-validate.minimal.js')?>"></script>
    <script src="<?=base_url('assets/js/vue/vue-swal.js')?>"></script>
<script src="<?=base_url('assets/js/vue/Chart.js')?>"></script>
<script src="<?=base_url('assets/js/vue/vue-charts.min.js')?>"></script>

    


    <script src="<?=base_url('assets/js/common.js')?>"></script>
		<script src="<?=base_url('assets/js/vue/common-vue.js')?>"></script>

  </body>
</html>