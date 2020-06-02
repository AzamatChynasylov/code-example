
------WebKitFormBoundaryScxyoZe <div class="col-md-8">

<?php
  
  // $nomer_cheka=$chek_num['nomer_cheka']+1;
?>
      
<form action="<?=base_url()?>index.php/reg/add_user" method="post" >
<table class="table table-striped table-bordered table-hover">
  <thead>
    <th>
      #
    </th>
    <th>
      Имя
    </th>
    <th>
      Email
    </th>
    <th>
      Телефон
    </th>
    <th>
      Пароль
    </th>
    <th>
      Статус
    </th>
    
  </thead>
  <tbody>
  <?php $k=0; foreach ($polzovatel as $item):
    $k++;
  ?>
          
          <tr>
          <td><?=$k?></td>
          <td><?=$item['name']?></td>
          <td><?=$item['email']?></td>
          <td><?=$item['tel']?></td>
          <td><?=$item['pswd']?></td>
          <td><?=$item['status']?></td>
          
          
           
           <td><a href="<?=base_url()?>index.php/reg/polzovatel_ed/<?=$item['id']?>" class="btn btn-success">Править</a></td>
           <td><a href="<?=base_url()?>index.php/reg/dell_user/<?=$item['id']?>" class="btn btn-danger">Удалить</a></td>
         
          
          </tr>
 <?php endforeach;?>
    
</tbody>
</table>         
          
</form>
         
 </div>