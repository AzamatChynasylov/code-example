
//Vue.use(VueResource);
//Vue.use(VueAxios);

if (document.querySelector("#my_view")) {
	//  create vue

	Vue.use(VeeValidate);

	Vue.component("modal", {
		props: ["id"],
		template: `<div name="modal" class="tempvue" >
	      <div class="modal-mask">
	        <div class="modal-wrapper">
	          <div class="modal-dialog">
	            <div class="modal-content">
	              <div class="modal-header">
	                <button type="button" class="close" @click="$emit('close')">
	                   <span aria-hidden="true">&times;</span>
	                </button>
	                <h2>Добавить Клиента</h2>
	              </div>
	              <div class="modal-body">
	                	<form class="form-horizontal" id="crud-form" @submit.prevent="validateBeforeSubmit()"  novalidate >
		                
		                <div class="row">
				           <div class="col-md-10">
				           <div class="input-group" :class="{'has-error':  errors.has('nameClient')}">
				             
				                <span class="input-group-addon">Имя&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-user"></span></span>
				                <input 
								type="text" 
				                 placeholder="Имя"  
				                 name="nameClient" 
				                 id="nameClient" 
				                 v-model="name"
				                 v-validate="'required'" 
				                 class="form-control"">
				                  </div>
				                 <span v-show="errors.has('nameClient')" class="text-danger">{{ errors.first('nameClient') }}</span>
				           </div>
				        </div>
				        <br>
				         <div class="row">
				           <div class="col-md-10">
				             <div class="input-group" :class="{'has-error':  errors.has('phoneClient')}">
				                <span class="input-group-addon">Телефон&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-phone-alt"></span></span>
				                <input type="number" class="form-control" placeholder="Номер"  name="phoneClient" id="phoneClient"  v-model.trim="phone" v-validate="'required'" >
				            
				            </div>
				            <span v-show="errors.has('phoneClient')" class="text-danger">{{ errors.first('phoneClient') }}</span>
				           </div>
				        </div>
				        <br>
				         <div class="row">
				           <div class="col-md-4">
				           
				             <div class="input-group" :class="{'has-error':  errors.has('levelClient')}">
				             <p>Уровень студента</p>
				                <select v-validate="'required|not_in:Choose'" v-model.trim="level" name="levelClient" id="levelClient" required class="form-control">
				                	
					                	<option value="1">Первый</option>
					                	<option value="12">Середина Первого</option>

					                	<option value="2">Второй</option>
					                	<option value="22">Середина Второго</option>

					                	<option value="3">Третий</option>
					                	<option value="32">Середина Третьего</option>

					                	<option value="4">Четвертый</option>
					                	<option value="42">Середина Четвертого</option>

					                	<option value="5">Пятый</option>
					                	<option value="52">Середина Пятого</option>

					                	<option value="6">Шестой</option>
					                	<option value="62">Середина Шестого</option>

					                	<option value="7">Седьмой</option>
					                	<option value="72">Середина Седьмого</option>
					                	<option value="8">OUT</option>

				                </select>
				            </div>
				            <span v-show="errors.has('levelClient')" class="text-danger">{{ errors.first('levelClient') }}</span>
				           
				           </div>
	                         <div class="row">
	                             <div class="col-md-4">
	                                 
	                                 <div class="input-group" :class="{'has-error':  errors.has('reklama')}">
	                                 <p>Где узнали про нас</p>
	                                     <select v-validate="'required|not_in:Choose'" v-model.trim="reklam" name="reklama" id="reklama" required class="form-control">

	                                         <option value="1">Интернет</option>
	                                         <option value="2">Улица Баннер</option>

	                                         <option value="3">Через Друзей</option>
	                                         <option value="4">Телевидение</option>

	                                         <option value="5">НБТ</option>
	                                         <option value="6">ПЯТНИЦА</option>

	                                         <option value="7">ТНТ</option>
	                                         <option value="8">НТС</option>
                                <option value="9">Автобус</option>

	                                     </select>
	                                 </div>
	                                 <span v-show="errors.has('reklama')" class="text-danger">{{ errors.first('reklama') }}</span>
				           
	                             </div>
	                         </div>

	                     </div>
				        <br>
				          <div class="row">
				           <div class="col-md-4">
				             <div class="input-group">
				             	<p>Доп. инфо</p>
				               <textarea v-model.trim="dop_info" name="comentClient" id="comentClient" class="form-control"></textarea>
				            </div>
				           </div>
				        </div>
				        <button  type="submit" class="btn btn-info" ><span class="fa fa-plus-square"></span>Добавить</button>
				        <button type="button"  @click="$emit('close')" class="btn btn-danger" ><span class="fa fa-times"></span>Отмена</button>
		                </form>
	                
	              </div>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>`,

		data: function() {
			return {
				name: "",
				phone: "",
				level: "",
				reklam: "",
				dop_info: ""
			};
		},
		methods: {
			validateBeforeSubmit: function() {
				this.$validator.validateAll().then(result => {
					if (result) {
						// eslint-disable-next-line
						//document.querySelector('#addForm').submit();
						this.addStudent();
						return;
					}

					swal("Исправьте ошибки!", "", "error");
				});
			},

			addStudent: function() {
				this.$http
					.post(
						"/futurest/saveClient",
						{
							nameClient: this.name,
							phoneClient: this.phone,
							levelClient: this.level,
							comentClient: this.dop_info,
							reklamClient: this.reklam
						},
						{ emulateJSON: true }
					)
					.then(
						response => {
							//console.log(response);
							swal({
								title: "Клиент успешно добавлен!",
								text: "",
								icon: "success"
							});
							swal({
								title: "Клиент успешно добавлен!",
								text: "",
								icon: "success"
							}).then(value => {
								this.$emit("close");
								this.$emit("callb");
							});
						},
						response => {
							// error callback
						}
					);
			}
		}
	});

	Vue.component("edit", {
		props: ["idst"],
		template: `

	<div name="modal"  class="tempvue">
	      <div class="modal-mask">
	        <div class="modal-wrapper">
	          <div class="modal-dialog">
	            <div class="modal-content">
	              <div class="modal-header">
	                <button type="button" class="close" @click="$emit('close')">
	                  <span aria-hidden="true">&times;</span>
	                </button>
	                <h2>Редактировать Студента</h2>
	              </div>
	              <div class="modal-body">
	                	<form class="form-horizontal" id="crud-form" v-on:submit.prevent>
		                
		                <div class="row">
				           <div class="col-md-10">
				             <div class="input-group">
				                <span class="input-group-addon">Имя&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-user"></span></span>
				                <input v-model.trim="name"  type="text" class="form-control" placeholder="Имя"  name="nameClient" id="nameClient" required >
				            </div>
				           </div>
				        </div>
				        <br>
				         <div class="row">
				           <div class="col-md-10">
				             <div class="input-group">
				                <span class="input-group-addon">Телефон&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-phone-alt"></span></span>
				                <input v-model.trim="phone" type="number" class="form-control" placeholder="Номер"  name="phoneClient" id="phoneClient" required >
				            </div>
				           </div>
				        </div>
				        <br>
				         <div class="row">
				           <div class="col-md-4">
				             <div class="input-group">
				             <p>Уровень студента</p>
				                <select  v-model.trim="level" name="levelClient" id="levelClient" required class="form-control">
				                	
					                	<option value="1">Первый</option>
					                	<option value="12">Середина Первого</option>

					                	<option value="2">Второй</option>
					                	<option value="22">Середина Второго</option>

					                	<option value="3">Третий</option>
					                	<option value="32">Середина Третьего</option>

					                	<option value="4">Четвертый</option>
					                	<option value="42">Середина Четвертого</option>

					                	<option value="5">Пятый</option>
					                	<option value="52">Середина Пятого</option>

					                	<option value="6">Шестой</option>
					                	<option value="62">Середина Шестого</option>

					                	<option value="7">Седьмой</option>
					                	<option value="72">Середина Седьмого</option>
					                	<option value="8">OUT</option>

				                </select>
				            </div>
				           </div>
	                         <div class="row">
	                             <div class="col-md-4">
	                                 <div class="input-group">
	                                 <p>Где узнали про нас</p>
	                                     <select v-model.trim="reklam" name="reklama" id="reklama" required class="form-control">

	                                         <option value="1">Интернет</option>
	                                         <option value="2">Улица Баннер</option>

	                                         <option value="3">Через Друзей</option>
	                                         <option value="4">Телевидение</option>

	                                         <option value="5">НБТ</option>
	                                         <option value="6">ПЯТНИЦА</option>

	                                         <option value="7">ТНТ</option>
	                                          <option value="8">НТС</option>
                                <option value="9">Автобус</option>

	                                     </select>
	                                 </div>
	                             </div>
	                         </div>

	                     </div>
				        <br>
				          <div class="row">
				           <div class="col-md-4">
				             <div class="input-group">
				             	<p>Доп. инфо</p>
				               <textarea v-model.trim="dop_info" name="comentClient" id="comentClient" class="form-control"></textarea>
				            </div>
				           </div>
				        </div>
				        <button @click="addSt" type="submit" class="btn btn-primary" ><span class="fa fa-plus-square"></span>Сохранить</button>
				        <button @click="dellSt" type="button" class="btn btn-info" ><span class="fa fa-trash-o"></span>Удалить</button>
				        <button type="button"  @click="$emit('close')" class="btn btn-danger" ><span class="fa fa-times"></span>Отмена</button>
		                </form>
	                
	              </div>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>


	`,
		data: function() {
			return {
				data: "",
				name: "",
				phone: "",
				level: "",
				reklam: "",
				dop_info: "",
				id: "",
				metka: ""
			};
		},
		created: function() {
			this.getSt();
		},
		methods: {
			getSt: function() {
				this.$http.get("/index.php/futurest/getClient/" + this.idst, {}).then(
					response => {
						//success
						//console.log(response.data);
						// this.data = response.data;
						this.id = response.data.id;
						this.name = response.data.name;
						this.phone = response.data.phone;
						this.level = response.data.level;
						this.reklam = response.data.reklam;
						this.dop_info = response.data.comment;
						this.metka = response.data.metka;
					},
					response => {
						//error
						console.log(response);
					}
				);
			},
			addSt: function() {
				this.$http
					.post(
						"/index.php/futurest/saveClient",
						{
							idClient: this.id,
							nameClient: this.name,
							phoneClient: this.phone,
							levelClient: this.level,
							comentClient: this.dop_info,
							reklamClient: this.reklam,
							metkaClient: this.metka
						},
						{ emulateJSON: true }
					)
					.then(
						response => {
							//console.log(response);

							swal({
								title: "Данные успешно изменем!",
								text: "",
								icon: "success"
							}).then(value => {
								this.$emit("close");
								this.$emit("callb");
							});
						},
						response => {
							// error callback
						}
					);
			},
			dellSt: function() {
				swal({
					title: "Вы уверены?",
					text: "",
					icon: "warning",
					buttons: true,
					dangerMode: true
				}).then(willDelete => {
					if (willDelete) {
						this.$http
							.post(
								"/futurest/dellSt",
								{
									idClient: this.id,
									nameClient: this.name,
									phoneClient: this.phone,
									levelClient: this.level,
									comentClient: this.dop_info,
									reklamClient: this.reklam
								},
								{ emulateJSON: true }
							)
							.then(
								response => {
									//console.log(response);
									swal({
										title: "Данные успешно изменем!",
										text: "",
										icon: "success"
									}).then(value => {
										this.$emit("close");
										this.$emit("callb");
									});
								},
								response => {
									// error callback
								}
							);
					} else {
						this.$emit("close");
					}
				});
			}
		}
	});

	var app = new Vue({
		// template:'#post-list-template',
		el: "#my_view",
		data() {
			return {
				data: "",
				showModal: false,
				showEdit: false,
				getSt: false,
				id: "",
				search: "",
				sort: "",
				options: [
					{ label: "По имени", value: "none" },
					{ label: "По уровню", value: "level" }
				],
				m: ""
			};
		},
		created: function() {
			//swal("Клиент успешно добавлен!", "You clicked the button!", "success");

			this.getZapisalis();
		},
		computed: {
			filteredList() {
				// return this.data.filter(item => {
				//   return item.name.toLowerCase().includes(this.search.toLowerCase())
				// })

				// this.data.filter((item) => {
				//     return item.name.toLowerCase().includes(this.search.toLowerCase());
				//   });
				if (this.data) {
					// return this.data.filter((item) => item.name.toLowerCase().includes(this.search.toLowerCase()));
					var data = this.data.filter(item => {
						return item.name.toLowerCase().includes(this.search.toLowerCase());
					});

					if (this.sort == "level") {
						return (data = this.data.filter(item => {
							return item.level
								.toLowerCase()
								.includes(this.search.toLowerCase());
						}));
					} else {
						return data;
					}
				}
			}
		},
		methods: {
			getZapisalis: function(q = "") {
				this.m = q;
				this.$http.get("/futurest/getClients/" + q, {}).then(
					response => {
						//success
						//console.log(response.data);
						this.data = response.data;
					},
					response => {
						//error
						// console.log(response);
					}
				);
			},
			enter: function(id) {
				this.$http
					.post(
						"/futurest/dellClientAjax",
						{ id: id },
						{ emulateJSON: true }
					)
					.then(
						response => {
							//console.log(response);
							swal({
								title: "Записался!",
								text: "",
								icon: "success"
							}).then(value => {
								this.getZapisalis();
							});
						},
						response => {
							// error callback
						}
					);
			},
			editCl: function(id) {
				console.log(this.m);
				this.id = id;
				this.showEdit = true;
			},
			getLevel: function(l) {
				//return 'Первый уровень начало';
				switch (l) {
					case "1":
						return "Первый уровень начало";
						break;
					case "12":
						return "Первый уровень середина";
						break;
					case "2":
						return "Второй уровень начало";
						break;
					case "22":
						return "Второй уровень середина";
						break;
					case "3":
						return "Третий уровень начало";
						break;
					case "32":
						return "Третий уровень середина";
						break;
					case "4":
						return "Четвертый уровень начало";
						break;
					case "42":
						return "Четвертый уровень середина";
						break;
					case "5":
						return "Пятый уровень начало";
						break;
					case "52":
						return "Пятый уровень середина";
						break;
					case "6":
						return "Шестой уровень начало";
						break;
					case "62":
						return "Шестой уровень середина";
						break;
					case "7":
						return "Седьмой уровень начало";
						break;
					case "72":
						return "Седьмой уровень середина";
						break;
					case "8":
						return "OUT";
						break;
					default:
						break;
				}
			},
			getreklam: function(l) {
				//return 'Первый уровень начало';
				switch (l) {
					case "1":
						return "Интернет";
						break;
					case "2":
						return "Улица Баннер";
						break;
					case "3":
						return "Через Друзей";
						break;
					case "4":
						return "Телевидение";
						break;
					case "5":
						return "НБТ";
						break;
					case "6":
						return "ПЯТНИЦА";
						break;
					case "7":
						return "ТНТ";
						break;
					case "8":
						return "НТС";
						break;
					case "9":
						return "Автобус";
						break;
					default:
						return "";
						break;
				}
			}
		}
	});
}
if (document.querySelector("#addst")) {
	Vue.use(VeeValidate);
	

	var app2 = new Vue({
		// template:'#post-list-template',
		el: "#addst",
		data() {
			return {
				data: "",
				oper: 0,
				name: "",
				russian: false,
				book1: 0,
				book2: 0,
				book3: 0,
				book4: 0,
				book5: 0,
				book6: 0,
				book7: 0,
				book8: 0,
				book9: 0,
				bookFlage: false,
				info: null,
				disabled: true,
				books: []
			};
		},
		created: function() {
			axios
				.get('api/example/books')
				.then(response => (
					this.books = response.data,
					this.bookFlage = true
					))
				.catch(error =>{
					this.bookFlage = false,
					console.log(error)
				});
		}, ///end Function created,

		methods: {
			sub: function() {
				this.disabled = false;
				this.$validator.validateAll().then(result => {
					if (result) {
						// eslint-disable-next-line
						document.querySelector("#addForm").submit();

						return;
					}

					this.disabled = true;
					swal("Исправьте ошибки!", "", "error");
				});
			},

			getreklam: function(l) {
				//return 'Первый уровень начало';
				switch (l) {
					case "1":
						return "Интернет";
						break;
					case "2":
						return "Улица Баннер";
						break;
					case "3":
						return "Через Друзей";
						break;
					case "4":
						return "Телевидение";
						break;
					case "5":
						return "НБТ";
						break;
					case "6":
						return "ПЯТНИЦА";
						break;
					case "7":
						return "ТНТ";
						break;
					case "8":
						return "НТС";
						break;
					case "9":
						return "Автобус";
						break;
					default:
						return "";
						break;
				}
			}
		}, ///end Function
		mounted() {}
	});
}
if (document.querySelector("#chart")) {
	Vue.use(VueCharts);

	var app3 = new Vue({
		// template:'#post-list-template',
		el: "#chart",
		data() {
			return {
				data: "",
				mylabel: "Реклама",
				mylabels: [
					"Интернет",
					"Улица Баннер",
					"Через Друзей",
					"Телевидение",
					"НБТ",
					"ПЯТНИЦА",
					"ТНТ",
					"НТС",
					"Автобус"
				],
				mydata: [0, 0, 0, 0, 0, 0, 0, 0, 0]
			};
		},
		created: function() {
			this.getreklamInfo();
			//this.sendSMS();
		}, ///end Function created,

		methods: {
			getreklamInfo: function() {
				this.$http.get("/index.php/reklama/getReklama", {}).then(
					response => {
						//success
						//console.log(this.mydata[1]);
						this.data = response.data;
						// this.mydata =[1, 2,3,0,0,0,0,0,0];
						//  console.log(this.mydata[1]);

						for (var key in this.data) {
							//console.log(this.data[key]['cnt']);
							this.mydata[parseInt(this.data[key]["name"]) - 1] = parseInt(
								this.data[key]["cnt"]
							);
							//this.mydata.push (parseInt(this.data[key]['cnt']));
						}

						this.mylabels.push("");
					},
					response => {
						//error
						// console.log(response);
					}
				);
			},

			sendSMS: function() {
				this.$http
					.get(
						"http://gt.smsgold.ru/sendsms.php?user=azamat&pwd=123456&sadr=Calanschool&dadr=996558123193&text=azamat",
						{}
					)
					.then(
						response => {
							// //success
							//console.log(this.mydata);
							//this.data = response.data;
							//this.mydata =[1, 2,3,0,0,0,0,0,0];
							console.log(response.data);
						},
						response => {
							// //error
							console.log(response);
						}
					);
			}
		} ///end Function
	});
}
if (document.querySelector("#probnik-vue")) {
	Vue.use(VeeValidate);

	var app4 = new Vue({
		// template:'#post-list-template',
		el: "#probnik-vue",
		data() {
			return {
				data: "",
				oper: 0
			};
		},
		created: function() {}, ///end Function created,

		methods: {
			sub: function() {
				this.$validator.validateAll().then(result => {
					if (result) {
						// eslint-disable-next-line
						document.querySelector("#probnikForm").submit();

						return;
					}

					swal("Исправьте ошибки!", "", "error");
				});
			}
		} ///end Function
	});
}

Vue.component("AddBookCount", {
	props: ["id"],
	template: `<div name="modal" class="tempvue" >
	      <div class="modal-mask">
	        <div class="modal-wrapper">
	          <div class="modal-dialog">
	            <div class="modal-content">
	              <div class="modal-header">
	                <button type="button" class="close" @click="$emit('close')">
	                   <span aria-hidden="true">&times;</span>
	                </button>
	                <h2>Добавить Клиента</h2>
	              </div>
	              <div class="modal-body">
	                	<form class="form-horizontal" id="crud-form" @submit.prevent="validateBeforeSubmit()"  novalidate >
		                
		                <div class="row">
				           <div class="col-md-10">
				           <div class="input-group" :class="{'has-error':  errors.has('nameClient')}">
				             
				                <span class="input-group-addon">Имя&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-user"></span></span>
				                <input 
								type="text" 
				                 placeholder="Имя"  
				                 name="nameClient" 
				                 id="nameClient" 
				                 v-model="name"
				                 v-validate="'required'" 
				                 class="form-control"">
				                  </div>
				                 <span v-show="errors.has('nameClient')" class="text-danger">{{ errors.first('nameClient') }}</span>
				           </div>
				        </div>
				        <br>
				         <div class="row">
				           <div class="col-md-10">
				             <div class="input-group" :class="{'has-error':  errors.has('phoneClient')}">
				                <span class="input-group-addon">Телефон&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-phone-alt"></span></span>
				                <input type="number" class="form-control" placeholder="Номер"  name="phoneClient" id="phoneClient"  v-model.trim="phone" v-validate="'required'" >
				            
				            </div>
				            <span v-show="errors.has('phoneClient')" class="text-danger">{{ errors.first('phoneClient') }}</span>
				           </div>
				        </div>
				        <br>
				         <div class="row">
				           <div class="col-md-4">
				           
				             <div class="input-group" :class="{'has-error':  errors.has('levelClient')}">
				             <p>Уровень студента</p>
				                <select v-validate="'required|not_in:Choose'" v-model.trim="level" name="levelClient" id="levelClient" required class="form-control">
				                	
					                	<option value="1">Первый</option>
					                	<option value="12">Середина Первого</option>

					                	<option value="2">Второй</option>
					                	<option value="22">Середина Второго</option>

					                	<option value="3">Третий</option>
					                	<option value="32">Середина Третьего</option>

					                	<option value="4">Четвертый</option>
					                	<option value="42">Середина Четвертого</option>

					                	<option value="5">Пятый</option>
					                	<option value="52">Середина Пятого</option>

					                	<option value="6">Шестой</option>
					                	<option value="62">Середина Шестого</option>

					                	<option value="7">Седьмой</option>
					                	<option value="72">Середина Седьмого</option>
					                	<option value="8">OUT</option>

				                </select>
				            </div>
				            <span v-show="errors.has('levelClient')" class="text-danger">{{ errors.first('levelClient') }}</span>
				           
				           </div>
	                         <div class="row">
	                             <div class="col-md-4">
	                                 
	                                 <div class="input-group" :class="{'has-error':  errors.has('reklama')}">
	                                 <p>Где узнали про нас</p>
	                                     <select v-validate="'required|not_in:Choose'" v-model.trim="reklam" name="reklama" id="reklama" required class="form-control">

	                                         <option value="1">Интернет</option>
	                                         <option value="2">Улица Баннер</option>

	                                         <option value="3">Через Друзей</option>
	                                         <option value="4">Телевидение</option>

	                                         <option value="5">НБТ</option>
	                                         <option value="6">ПЯТНИЦА</option>

	                                         <option value="7">ТНТ</option>
	                                         <option value="8">НТС</option>
                                <option value="9">Автобус</option>

	                                     </select>
	                                 </div>
	                                 <span v-show="errors.has('reklama')" class="text-danger">{{ errors.first('reklama') }}</span>
				           
	                             </div>
	                         </div>

	                     </div>
				        <br>
				          <div class="row">
				           <div class="col-md-4">
				             <div class="input-group">
				             	<p>Доп. инфо</p>
				               <textarea v-model.trim="dop_info" name="comentClient" id="comentClient" class="form-control"></textarea>
				            </div>
				           </div>
				        </div>
				        <button  type="submit" class="btn btn-info" ><span class="fa fa-plus-square"></span>Добавить</button>
				        <button type="button"  @click="$emit('close')" class="btn btn-danger" ><span class="fa fa-times"></span>Отмена</button>
		                </form>
	                
	              </div>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>`,

	data: function() {
		return {
			name: "",
			phone: "",
			level: "",
			reklam: "",
			dop_info: ""
		};
	},
	methods: {
		validateBeforeSubmit: function() {
			this.$validator.validateAll().then(result => {
				if (result) {
					// eslint-disable-next-line
					//document.querySelector('#addForm').submit();
					this.addStudent();
					return;
				}

				swal("Исправьте ошибки!", "", "error");
			});
		},

		addStudent: function() {
			this.$http
				.post(
					"/index.php/futurest/saveClient",
					{
						nameClient: this.name,
						phoneClient: this.phone,
						levelClient: this.level,
						comentClient: this.dop_info,
						reklamClient: this.reklam
					},
					{ emulateJSON: true }
				)
				.then(
					response => {
						//console.log(response);
						swal({
							title: "Клиент успешно добавлен!",
							text: "",
							icon: "success"
						});
						swal({
							title: "Клиент успешно добавлен!",
							text: "",
							icon: "success"
						}).then(value => {
							this.$emit("close");
							this.$emit("callb");
						});
					},
					response => {
						// error callback
					}
				);
		}
	}
});

if (document.querySelector("#bookApp")) {
	Vue.use(VeeValidate);

	Vue.component("addbookcount", {
		props: ['id','where'],
		template: `<div name="modal" class="tempvue" >
	      <div class="modal-mask">
	        <div class="modal-wrapper">
	          <div class="modal-dialog">
	            <div class="modal-content">
	              <div class="modal-header">
	                <button type="button" class="close" @click="$emit('close')">
	                   <span aria-hidden="true">&times;</span>
	                </button>
	                <h2 v-if="where==='sklad'">Добавить Книгу в склад</h2>
	                <h2 v-if="where==='manager'">Прием книги</h2>
	              </div>
	              <div class="modal-body">
	                	<form class="form-horizontal" id="crud-form" @submit.prevent="validateBeforeSubmit(where)"  novalidate >
		             
				         <div class="row">
				           <div class="col-md-4">
				           
				             <div class="input-group" :class="{'has-error':  errors.has('bookCode')}">
				             <p>Выберите книгу</p>
				                <select v-validate="'required|not_in:Choose'" v-model.trim="bookCode" name="bookCode" id="bookCode" required class="form-control">
				                	
					                	<option v-for = "book in books" :value="book.id">{{book.name}}</option>
					                
					                	
												</select>
				            </div>
				            <span v-show="errors.has('bookCode')" class="text-danger">{{ errors.first('bookCode') }}</span>
				           
				           </div>
	                         <div class="row">
	                             <div class="col-md-4">
	                             	 <div class="input-group" :class="{'has-error':  errors.has('kolBook')}">
				             			<p>Колличество </p>
										<input 
										type="number" 
										 placeholder="Колличество"  
										 name="kolBook" 
										 id="kolBook" 
										 v-validate="'required|numeric'" 
										 v-model.trim="bookCount" 
										 class="form-control"">
										  </div>
										 <span v-show="errors.has('kolBook')" class="text-danger">{{ errors.first('kolBook') }}</span>
								   
	                             </div>
	                         </div>

	                     </div>
				        <br>
				          <div class="row">
				           <div class="col-md-4">
				             <div class="input-group">
				             	<p>Доп. инфо</p>
				               <textarea v-model.trim="coment" name="comentClient" id="coment" class="form-control"></textarea>
				            </div>
				           </div>
				        </div>
				        <button  type="submit" class="btn btn-info"><span class="fa fa-plus-square"></span>Добавить</button>
				        <button type="button"  @click="$emit('close')"  class="btn btn-danger" ><span class="fa fa-times"></span>Отмена</button>
		                </form>
	                
	              </div>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>`,

		data: function() {
			return {
				bookCode: "",
				bookCount: "",
				coment: "",
				books: [],
				booksm: []
			};
		},
		methods: {
			validateBeforeSubmit: function($where) {
				this.$validator.validateAll().then(result => {
					if (result) {
						// eslint-disable-next-line
						//document.querySelector('#addForm').submit();
						if($where === 'sklad')
						{
							this.addBookSklad();
							return;
						}
						else{
							this.addStudent();
							return;
						}
					
					}else{
						swal("Исправьте ошибки!", "", "error");
					}
					
				});
			},

			addStudent: function() {

				axios
				.post(
					"api/example/books",
					{
						bookCode: this.bookCode,
						bookCount: this.bookCount,
						comment: this.coment
					}
				)
			.then(response => {
				swal({
					title: " добавлен!",
					text: "",
					icon: "success"
				}).then(value => {
					this.$emit("refresh");
					this.$emit("close");
				});
				
			})
			.catch(function (error) {
				console.log(error);
			});

			},
			addBookSklad: function() {
				axios
					.post(
						"api/example/bookssklad123",
						{
							bookCode: this.bookCode,
							bookCount: this.bookCount,
						}
					)
				.then(response => {
					this.$emit("refresh");
					this.$emit("close");
				})
				.catch(function (error) {
					console.log(error);
				});
			},
			getBooksSklad: function()
			{
				axios
				.get('api/example/bookssklad')
				.then(response => (this.books = response.data));
			}
			
		},
		created() {
			this.getBooksSklad();
		}
	});

	var app5 = new Vue({
		// template:'#post-list-template',
		el: "#bookApp",
		data() {
			return {
				data: "",
				test: 5,
				oper: 0,
				showModal: false,
				book1: 0,
				book2: 0,
				book3: 0,
				book4: 0,
				book5: 0,
				book6: 0,
				book7: 0,
				book8: 0,
				book9: 0,
				where: '',
				books: [],
				booksm: []
			};
		},

		methods: {
			sub: function() {},
			showModalf: function($where){
				this.showModal = true;
				this.where = $where;
				//console.log(this.where);
			},
			refresh: function(){
			//	console.log(this.books);
		
				axios
				.get('api/example/bookssklad')
				.then(response => (
				//	console.log(response.data),
				
				this.books = response.data
					));

					axios
					.get('api/example/books')
					.then(response => (
					//	console.log(response.data),
					
					this.booksm = response.data
						));
		
			
				
			}
		}, ///end Function
		created() {
			
			this.refresh();

		}
	});
}

if (document.querySelector("#studentOpl")) {
	var app7 = new Vue({
		// template:'#post-list-template',
		el: "#studentOpl",
		data() {
			return {
				data: "",
				dolgStudy: 0,
				loading: false,
				dolgBook: 0
			};
		},
		created: function() {
			this.loading = false;
		}, ///end Function created,

		methods: {
			payDolg: function() {
				//console.log(this.$refs.dolValue.value);
				swal({
					title: "Погасить долг за учебу?",
					text: "Размер долга за учёбу " + this.$refs.dolValue.value,
					icon: "warning",
					content: "input"
					// buttons: true,
					// dangerMode: true,
					// value: name
				}).then(value => {
					let re = /^\d+$/;
					//console.log(typeof parseInt(value, 10));
				 //	console.log(re.test(value));
					if (re.test(value)) {
						if (value) {
							///#############

							this.loading = true;
							this.$http
								.post(
									"/api/example/oplataDolgs",
									{
										dolgStudy: parseInt(value, 10),
										id: this.$refs.studentID.value
									},
									{ emulateJSON: true }
								)
								.then(
									response => {
										this.loading = false;
										console.log(response);

										if (response.status === 201) {
											swal(response.body, {
												icon: "success"
											}).then(value => {
												document.location.reload(true);
											});
											//document.location.reload(true);
										}
									},
									response => {
										this.loading = false;
										console.log(response);
										swal(`Ошибка! ${response.body}`, {
											icon: "error"
										});
									}
								);
						} else {
							swal("Вы не погосили долг студента");
						}
					} else {
						swal("Введите только цифры!!!!", {
							icon: "error"
						});
					}
				});
			},
			payDolgBook: function(idcheck,dolg){
				swal({
					title: "Погасить долг за книгу?",
					text: "Размер долга за книгу " + dolg,
					icon: "warning",
					content: "input"
					// buttons: true,
					// dangerMode: true,
					// value: name
				}).then(value => {
					let re = /^\d+$/;
					//console.log(typeof parseInt(value, 10));
				 	// console.log(re);
					//  console.log(re.test(value));
					//  return;
					if (re.test(value)) {
						if (value) {
							///#############
							// console.log(	this.$refs.checkID.value);
							// console.log(	this.$refs.oplataID.value);
							// return;
							this.loading = true;


							axios
							.post(
								"/api/example/oplataDolgsBook",
								{
									bookDolg: value,
									bookDolgCheck: this.$refs.checkID.value,
									idPayment: idcheck
								}
							)
						.then(response => {
							this.loading = false;
							console.log(response.data);
							swal({
								title: " добавлен!",
								text: "",
								icon: "success"
							}).then(value => {
								document.location.reload(true);
							});
							
						})
						.catch(function (error) {
							this.loading = false;
							console.log(error);
							swal(`Ошибка! ${error}`, {
								icon: "error"
							});
						});







							
							// this.$http
							// 	.post(
							// 		"/api/example/oplataDolgs",
							// 		{
							// 			dolgStudy: parseInt(value, 10),
							// 			id: this.$refs.studentID.value
							// 		},
							// 		{ emulateJSON: true }
							// 	)
							// 	.then(
							// 		response => {
							// 			this.loading = false;
							// 			console.log(response);

							// 			if (response.status === 201) {
							// 				swal(response.body, {
							// 					icon: "success"
							// 				}).then(value => {
							// 					document.location.reload(true);
							// 				});
							// 				//document.location.reload(true);
							// 			}
							// 		},
							// 		response => {
							// 			this.loading = false;
							// 			console.log(response);
							// 			swal(`Ошибка! ${response.body}`, {
							// 				icon: "error"
							// 			});
							// 		}
							// 	);
						} else {
							swal("Вы не погосили долг студента");
						}
					} else {
						swal("Введите только цифры!!!!", {
							icon: "error"
						});
					}
				});
			}
		} ///end Function
	});
}
