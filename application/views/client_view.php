<div class="row">
	<div class="col-md-8">
		
      <section class="tab-section" id="my_view">
      	 <button class="btn btn-primary " @click="showModal = true">
        Добавить <span class="fa fa-plus" aria-hidden="true"></span>
      </button>

     
      <br>
      <br>
      <br>
      	<modal v-if="showModal" @close='showModal=false'  v-on:callb="getZapisalis">
    		
    		
    	</modal>
    	<edit v-if="showEdit" @close='showEdit=false' :idst="id"  v-on:callb="getZapisalis(m)">
    		
    	</edit>

      	<ul class="nav nav-tabs">
			  <li class="active"><a data-toggle="tab" href="#home" v-on:click="getZapisalis()">Клиенты</a></li>
			  <li><a data-toggle="tab" href="#menu1" v-on:click="getZapisalis(2)">Записались</a></li>
			  <li><a data-toggle="tab" href="#menu2" v-on:click="getZapisalis(3)">Отказались</a></li>
			</ul><!--nav nav-tabs-->

			<div class="tab-content">
			  <div id="home" class="tab-pane fade in active">
			  	<br>
			  	<div class="row">
			  		<div class="col-md-5">
			  			<div class="input-group">
				                <span class="input-group-addon">Поиск по имени&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-user"></span></span>
				                <input v-model="search"  type="text" class="form-control" placeholder="Имя"  name="nameClient" id="nameClient" required >
				            </div>
			  			
			  		</div>
			  		<div class="col-md-5">
			  			<select v-model="sort" placeholder="Sort by" class="form-control">
					        <option
					          v-for="item in options"
					          :label="item.label"
					          :value="item.value">{{item.label}}
					        </option>
					      </select>
			  			
			  		</div>
			  	</div>
			  	<br>
			  	
			    	<table class="table table-striped table-bordered table-hover">
			    		<thead>
			    			<th>#</th>
		      				<th>Имя</th>
		      				<th>Телефон</th>
		      				<th>Уровень</th>
		      				<th>Реклама</th>
		      				<th>Доп. Инфо</th>
		      				<th>Дата</th>
		      				<th></th>
			    		</thead>
			    		<tbody>
			    			<tr v-for="(item,index) in filteredList" >
			    				<td>{{ index+1 }}</td>
			    				<td>{{ item.name }}</td>
			    				<td>{{ item.phone}}</td>
			    				<td>{{ getLevel(item.level)}}</td>
			    				<td>{{ getreklam(item.reklam)}}</td>
			    				<td>{{ item.comment}}</td>
			    				<td>{{ item.dateCome}}</td>
			    	 			<td>
			    					<button type="button" class="btn btn-primary"  v-on:click="enter(item.id)"><span class="fa fa-check"></span>
									</button>
									<button type="button" class="btn btn-info"  v-on:click="editCl(item.id)"><span class="fa fa-pencil"></span>
									</button>
								</td>
			    			</tr>
			    		</tbody>
			    	</table>
			  </div>
			  <div id="menu1" class="tab-pane fade">
			    
			    	<table class="table table-striped table-bordered table-hover">
			    		<thead>
			    			<th>#</th>
		      				<th>Имя</th>
		      				<th>Телефон</th>
		      				<th>Уровень</th>
		      				<th>Реклама</th>
		      				<th>Доп. Инфо</th>
		      				<th>Дата</th>
		      				<th></th>
			    		</thead>
			    		<tbody>
			    			<tr v-for="(item,index) in data" >
			    				<td>{{ index+1 }}</td>
			    				<td>{{ item.name }}</td>
			    				<td>{{ item.phone}}</td>
			    				<td>{{ getLevel(item.level)}}</td>
			    				<td>{{ getreklam(item.reklam)}}</td>
			    				<td>{{ item.comment}}</td>
			    				<td>{{ item.dateCome}}</td>
			    				<td><button type="button" class="btn btn-info"  v-on:click="editCl(item.id)"><span class="fa fa-pencil"></span>
									</button></td>
			    			</tr>
			    		</tbody>
			    	</table>
			  
			  </div>
			  <div id="menu2" class="tab-pane fade">
			  	
			    <table class="table table-striped table-bordered table-hover">
			    		<thead>
			    			<th>#</th>
		      				<th>Имя</th>
		      				<th>Телефон</th>
		      				<th>Уровень</th>
		      				<th>Реклама</th>
		      				<th>Доп. Инфо</th>
		      				<th>Дата</th>
		      				<th></th>
			    		</thead>
			    		<tbody>
			    			<tr v-for="(item,index) in data" >
			    				<td>{{ index+1 }}</td>
			    				<td>{{ item.name }}</td>
			    				<td>{{ item.phone}}</td>
			    				<td>{{ getLevel(item.level)}}</td>
			    				<td>{{ getreklam(item.reklam)}}</td>
			    				<td>{{ item.comment}}</td>
			    				<td>{{ item.dateCome}}</td>
			    				<td><button type="button" class="btn btn-info"  v-on:click="editCl(item.id)"><span class="fa fa-pencil"></span>
									</button></td>
			    			</tr>
			    		</tbody>
			    	</table>
			  </div>
			
			</div><!--tab-content-->
      </section>
      <!-- /.tab-section -->

</div>

