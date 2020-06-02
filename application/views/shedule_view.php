<div class="col-md-9">
<a href="<?=base_url('shedule/teachers')?>" class="btn btn-primary">Учителя</a>
	<div class="alert"></div>
	<div id="calendar">
		
	</div>
	<div class="modal fade sheduleModal">
	
            <div class="modal-dialog">
						<div class="spinnerShow">
										<img src="assets/img/ajax-loader.gif" alt="ajax-loader.gif">
									</div>
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Закрыть</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <div class="error"></div>
                        <form class="form-horizontal" id="crud-form">
                        <input type="hidden" id="start">
                        <input type="hidden" id="end">
                         <div class="form-group">
                                <div class="container">			

								<div class="" id="vremya">
									
									<h3>Время</h3>
									
									<div class="btn-group" data-toggle="buttons">
										
										<label class="btn btn-success">07:00
											<input type="radio" name="options" id="option2" autocomplete="off"  value="07:00:00">
											<span class="glyphicon glyphicon-ok"></span>
										</label>

										<label class="btn btn-primary">
										08:20
											<input type="radio" name="options" id="option2" autocomplete="off" value="08:20:00">
											<span class="glyphicon glyphicon-ok"></span>
										</label>

										<label class="btn btn-info">
										09:40
											<input type="radio" name="options" id="option2" autocomplete="off" value="09:40:00">
											<span class="glyphicon glyphicon-ok"></span>
										</label>

										<label class="btn btn-default">
										11:00
											<input type="radio" name="options" id="option2" autocomplete="off" value="11:00:00">
											<span class="glyphicon glyphicon-ok"></span>
										</label>

										<label class="btn btn-warning">
											12:20
											<input type="radio" name="options" id="option2" autocomplete="off" value="12:20:00">
											<span class="glyphicon glyphicon-ok"></span>
										</label>

										<label class="btn btn-danger">
										13:40
											<input type="radio" name="options" id="option2" autocomplete="off" value="13:40:00">
											<span class="glyphicon glyphicon-ok"></span>
										</label>
										<br>
										<br>
										<label class="btn btn-danger">
										15:00
											<input type="radio" name="options" id="option2" autocomplete="off" value="15:00:00">
											<span class="glyphicon glyphicon-ok"></span>
										</label>
										<label class="btn btn-warning">
											16:20
											<input type="radio" name="options" id="option2" autocomplete="off" value="16:20:00">
											<span class="glyphicon glyphicon-ok"></span>
										</label>
										<label class="btn btn-default">
										17:40
											<input type="radio" name="options" id="option2" autocomplete="off" value="17:40:00">
											<span class="glyphicon glyphicon-ok"></span>
										</label>
										<label class="btn btn-info">
										19:00
											<input type="radio" name="options" id="option2" autocomplete="off" value="19:00:00">
											<span class="glyphicon glyphicon-ok"></span>
										</label>

									
									</div>


								</div>

							</div>
                            </div>
                            <div id="formval">
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="teacher_list">Учитель</label>
                                <div class="col-md-4">
                                    <select class="form-control" id="teacher_list" name="teacher_list">
                                    
									</select>
                                </div>
                            </div>                            
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="description">Группы</label>
                                <div class="col-md-4">
                                    <select class="form-control" name="description" id="description">
									 
									</select>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="color">Цвет</label>
                                <div class="col-md-4">
                                    <input id="color" name="color" type="text" class="form-control input-md" readonly="readonly" />
                                 
                                    <span class="help-block">Click to pick a color</span>
                                </div>
                            </div>
                          </div>
                            
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                    </div>
                </div>
            </div>
        </div>
</div>