<div class="col-md-9">
    <?php
    ?>
    <div id="bookApp">

<?php   if($_SESSION['user_status']==2){
				
?>
				<h3>Остаток книг на складе <button class="btn btn-success"  @click="showModalf('sklad')">Добавить книгу </button></h3>
				<table class="table table-bordered table-hover table-condensed">
					<thead>
					<th class="danger">Книга уровень</th>
					<th v-for="book in books"  class="danger">{{ book.name }}</th>
					</thead>
					<tbody >
                <tr class="success">
                    <td>Колличество</td>
                    <td v-for="book in books" class="success">{{ book.quantity }}</td>
                   
                </tr>
                </tbody>
				</table>
				<br><br>
       
<?php }?>
<button class="btn btn-primary " @click="showModalf('manager')">
            Прием книг <span class="fa fa-plus" aria-hidden="true"></span>
        </button>
        <br><br>

        <div class="infoAboutBooks">
					<h2>Колличество книг у менеджеров</h2>
            <table class="table table-bordered table-hover table-condensed">
                <thead>
                    <th class="danger">Книга уровень</th>

										<th v-for="book in booksm" class="danger">{{ book.name }}</th>

                </thead>
                <tbody>
                <tr class="success">
                    <td>Колличество</td>
                    <td v-for="book in booksm" class="success">{{ book.bookCount }}</td>
                </tr>
                </tbody>
            </table>
        </div>

        <addbookcount v-if="showModal" @close='showModal=false' @refresh="refresh(data)" v-bind:where = 'where'>


        </addbookcount>
    </div>


    <br><br>

    <form action="<?= base_url('book')?>" method="post">
        <div class="form-group">
            <p class="form-inline"><label for="exampleInputName2">Дата</label>
                <input name="datesumma" type="text" class="form-control" id='first_date_lesson' value="<?= date('d-m-Y') ?>">
                по
                <input name="datesumma2" type="text" class="form-control" id='last_date_lesson' value="">
            </p>
        </div>
        <input type="submit" class="btn btn-primary" value="Посмотреть" name="search">
    </form>
    <table class="table table-bordered table-hover table-condensed">	
     
        <thead>
            <th>#</th>
            <th>Имя</th>
            <th>Дата</th>
            <th>Деньги  за книгу</th>
            <th>Долг</th>
        </thead>

        <tbody>
            <?php
            $k = 0;
            $summa2 = 0;
            $summa3 = 0;
            foreach ($book as $item):
                $k++;
            $summa2 += (int)$item['sum'];
            $summa3 +=(int)$item['dolg'];
            ?>
            <tr>
                <td><?= $k ?></td>
                <td><a href="<?= base_url('student/get_student/'.$item['id_student'])?>" target="_blank"><?=$item['fio']?></a></td>
                <td><?= $item['date_payment'] ?></td>
                <td><?= $item['sum'] ?></td>
                <td><?= $item['dolg'] ?></td>
            </tr>
        <?php endforeach; ?>


        <tr>
            <td class="danger">Колличество книг</td>
            <td class="danger"><?= count($book) ?></td>
            <td></td>
            <td class="success"><?= $summa2 ?></td>
            <td class="danger"><?= $summa3 ?></td>
        </tr>

    </tbody>
</table>


</div>