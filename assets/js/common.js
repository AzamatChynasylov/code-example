$(document).ready(function () {
	var $loading = $('.spinnerShow').hide();
    $('.selectpicker').selectpicker();
    //alert('aza');
    /*--------------Fulll Calendar Raspisanie---------------------------------------------------*/
    var currentDate; // Holds the day clicked when adding a new event
    var currentEvent; // Holds the event object when editing an event

    $('#color').colorpicker(); // Colopicker
    $('#color2').colorpicker(); // Colopicker
	var base_url = 'http://'+window.location.hostname; // Here i define the base_url
	//alert(base_url );
    function getTeachers() {
			$loading.show();
        $.ajax({
            url: base_url + '/shedule/get_teachers',
            type: 'POST',
            dataType: 'json',
            data: {
								time: $('#start').val() + " " + $('input[name=options]:checked').val(),
								time2: $('input[name=options]:checked').val()
            },
            success: function (data, response, event, date) {
							//console.log(data.group);
                $('#teacher_list').empty();
                $.each(data.teacher, function () {
                    // alert(this.name);
                    $('#teacher_list').append($('<option>',
                        {
                            value: this.name,
                            text: this.name
                        }));
                });
								$('#description').empty();
									$.each(data.group, function () {
											// alert(this.name);
											$('#description').append($('<option>',
													{
															value: this.shortname,
															text: this.namegroup
													}));
									});
									$loading.hide();
            },
            error: function (error) {
							//console.log(error);
                alert("Oops! Something didn't work getTeachers");
            }
        });

    }

    function getGroups() {
       
        $.ajax({
            url: base_url + '/shedule/get_groups',
            type: 'POST',
            dataType: 'json',
            data: {
                time: $('#start').val() + " " + $('input[name=options]:checked').val(),
                time2: $('input[name=options]:checked').val()
            },
            success: function (data, response, event, date) {
                
                $('#description').empty();
                $.each(data, function () {
                    // alert(this.name);
                    $('#description').append($('<option>',
                        {
                            value: this.shortname,
                            text: this.namegroup
                        }));
                });

            },
            error: function () {
                alert("Oops! Something didn't work get_groups");
            }
        });
    }

    function removeTeachers() {
        $.ajax({
            url: base_url + '/shedule/getInfo',
            type: 'POST',
            dataType: 'json',
            data: {
                time: $('#start').val() + " " + $('input[name=options]:checked').val()
            },
            success: function (data, response, event, date) {
								//alert("success here");
								//console.log(response);
                var baza = data;
                //$('.alert').addClass('alert-success').text(baza[0]["title"]).hide_notify();
                for (var i = 0; i < Object.keys(baza).length; i++) {
                    $("#teacher_list option[value='" + baza[i]["title"] + "']").remove();
                    $("#description option[value='" + baza[i]["description"] + "']").remove();
                }

            },
            error: function () {
                alert("Oops! Something didn't work");
            }
        });

    }
	//	console.log(new Date());

    $('#calendar').fullCalendar({
			
        header: {
            left: 'prev,next',
            center: 'title',
            right: 'today month basicWeek agendaDay '
        },
        slotEventOverlap: false,
        minTime: '07:00:00',
        slotDuration: '00:20:00',
        //snapDuration: '00:05:00',
        maxTime: '20:20:00',
        eventLimit: true, // allow "more" link when too many events
        events: base_url + '/shedule/getEvents',
        selectable: true,
        selectHelper: true,
        editable: true, // Make the event resizable true
        nowIndicator: true,
				axisFormat: 'HH:mm',
        dayClick: function (date, jsEvent, view) {
            if (view.name == 'agendaDay') {
						
						
                $('#start').val(date.format('YYYY-MM-DD'));
                $('#end').val(date.format('YYYY-MM-DD'));
                $('#vremya').show();
              
							 if($('input[name=options]').is(':checked'))
							 {
							//	console.log('if');
										getTeachers();
							 }
							 else{
								// console.log('else');
								 $('input[name=options]:nth(0)').parent().addClass('active');
								 $('input[name=options]:nth(0)').prop("checked", true);
										 getTeachers();
									
							 }
                $("input[name='options']").change(function () {
								
                    getTeachers();
								});
                modal({
                    buttons: {
                        add: {
                            id: 'add-event', // Buttons id
                            css: 'btn-success', // Buttons class
                            label: 'Добавить' // Buttons label
                        }
                    },
                    title: 'Расписание' // Modal title
                });
            }
            if (view.name == 'month') {
                $('#calendar').fullCalendar('gotoDate', date);
                $('#calendar').fullCalendar('changeView', 'agendaDay');
            }
        },
        eventDrop: function (event, delta, revertFunc, start, end) {

            start = event.start.format('YYYY-MM-DD HH:mm:ss');
            if (event.end) {
                end = event.end.format('YYYY-MM-DD HH:mm:ss');
            } else {
                end = start;
            }

            $.post(base_url + '/shedule/dragUpdateEvent', {
                id: event.id,
                start: start,
                end: end
            }, function (result) {
                $('.alert').addClass('alert-success').text('Event updated successfuly');
								hide_notify();
							});


        },
        eventResize: function (event, dayDelta, minuteDelta, revertFunc) {
            start = event.start.format('YYYY-MM-DD HH:mm:ss');
            if (event.end) {
                end = event.end.format('YYYY-MM-DD HH:mm:ss');
            } else {
                end = start;
            }

            $.post(base_url + '/shedule/dragUpdateEvent', {
                id: event.id,
                start: start,
                end: end
            }, function (result) {
                $('.alert').addClass('alert-success').text('Event updated successfuly');
                hide_notify();

            });
        },
        eventClick: function (calEvent, jsEvent, view) {
						currentEvent = calEvent;
						//console.log(currentEvent);
            var dt = calEvent.start;
						dt = dt.toISOString().substring(0, 19).replace('T', ' ');
					//	console.log(dt);
						var dt2 = dt.substring(11, 19);
					//	console.log(dt2);
            $('#vremya').hide();
            $.ajax({
							url: base_url + '/shedule/get_teachers',
							type: 'POST',
							dataType: 'json',
							data: {
									time: dt,
									time2: dt2
							},
                success: function (data, response, event, date) {
								//	console.log(data);
										$('#teacher_list').empty();
										$('#description').empty();
                    $('#teacher_list').append($('<option>',
                        {
                            value: calEvent.title,
                            text: calEvent.title
                        }));
                    //alert(calEvent.title );
                    $.each(data.teacher, function () {
                        // alert(this.name);
                        //alert(this.name+'   '+$("#teacher_list option[value='"+this.name+"']").index);


                        if (this.name != calEvent.title) {
                            $('#teacher_list').append($('<option>',
                                {
                                    value: this.name,
                                    text: this.name
                                }));
                        }

                    });
										$('#description').append($('<option>',
										{
												value: calEvent.shortdesc,
												text: calEvent.description
										}));

								$.each(data.group, function () {
										// alert(this.name);
										if (this.namegroup != calEvent.description) {
												$('#description').append($('<option>',
														{
																value: this.shortname,
																text: this.namegroup
														}));
										}

								});


                },
                error: function () {
                    alert("Oops! Something didn't work");
                }
            });

            //alert(dt);


            // Open modal to edit or delete event
            modal({
                // Available buttons when editing
                buttons: {
                    delete: {
                        id: 'delete-event',
                        css: 'btn-danger',
                        label: 'Удалить'
                    },
                    kompen: {
                        id: 'kompen',
                        css: 'btn-primary',
                        label: 'Компенсация'
                    },
                    update: {
                        id: 'update-event',
                        css: 'btn-success',
                        label: 'Обновить'
                    }
                },
                title: 'Редактировать расписание "' + calEvent.title + '"',
                event: calEvent
            });
        },
        eventMouseover: function (data, event, view) {
            //console.log(moment(data.start).format('YYYY/MM/DD hh:mm'));
            //console.log(data.start-_r);

            var tooltip = '<div class="tooltiptopicevent" style="width:auto;height:auto;background:#feb811;position:absolute;z-index:10001;padding:10px 10px 10px 10px ;  line-height: 200%;">' + 'Teacher: ' + ': ' + data.title + '</br>' + 'Group: ' + ': ' + data.description + '</br>' + 'Time: ' + ': ' + moment(data.start).format('YYYY/MM/DD hh:mm') + '</div>';


            $("body").append(tooltip);
            $(this).mouseover(function (e) {
                $(this).css('z-index', 10000);
                $('.tooltiptopicevent').fadeIn('500');
                $('.tooltiptopicevent').fadeTo('10', 1.9);
            }).mousemove(function (e) {
                $('.tooltiptopicevent').css('top', e.pageY + 10);
                $('.tooltiptopicevent').css('left', e.pageX + 20);
            });

        },
        eventMouseout: function (data, event, view) {
            $(this).css('z-index', 8);

            $('.tooltiptopicevent').remove();

        },

    });

    $('.modal').on('click', '#add-event', function (e) {

        if (validator(['description'])) {
           
            var CurrentTime = $('#start').val() + " " + $('input[name=options]:checked').val();
            $.post(base_url + '/shedule/addEvent', {
                title: $('#teacher_list').val(),
                description: $('#description option:selected').text(),
                shortdescription: $('#description').val(),
                color: $('#color').val(),
                start: $('#start').val() + " " + $('input[name=options]:checked').val(),
                end: CurrentTime,
                time: $('input[name=options]:checked').val()
            }, function (result) {
                $('.alert').addClass('alert-success').text('Event added successfuly');
                $('.modal').modal('hide');
                $('#calendar').fullCalendar("refetchEvents");
                hide_notify();
            });
        }
    });

    // Handle click on Update Button
    $('.modal').on('click', '#update-event', function (e) {

        // console.log(currentEvent);
        //alert(currentEvent.start);
        // return false;
        if (validator(['description'])) {
            $.post(base_url + '/shedule/updateEvent', {
                id: currentEvent._id,
                title: $('#teacher_list').val(),
                description: $('#description option:selected').text(),
                shortdescription: $('#description').val(),
                color: $('#color').val()

            }, function (result) {
                $('.alert').addClass('alert-success').text('Event updated successfuly');
                $('.modal').modal('hide');
                $('#calendar').fullCalendar("refetchEvents");
                hide_notify();

            });
        }
    });

    $('.modal').on('click', '#otmena', function (e) {
        if (validator(['title', 'description'])) {
            $.post(base_url + '/shedule/updateEvent2', {
                id: currentEvent._id,
                title: $('#teacher_list').val(),
                description: $('#description').val(),
                color: $('#color').val()

            }, function (result) {
                $('.alert').addClass('alert-success').text('Event updated successfuly');
                $('.modal').modal('hide');
                $('#calendar').fullCalendar("refetchEvents");
                hide_notify();

            });
        }
    });
    $('.modal').on('click', '#kompen', function (e) {
        if (validator(['title', 'description'])) {
            $.post(base_url + '/shedule/updateEvent3', {
                id: currentEvent._id,
                title: $('#teacher_list').val(),
                description: $('#description').val(),
                color: $('#color').val()

            }, function (result) {
                $('.alert').addClass('alert-success').text('Event updated successfuly');
                $('.modal').modal('hide');
                $('#calendar').fullCalendar("refetchEvents");
                hide_notify();

            });
        }
    });

    // Handle Click on Delete Button
    $('.modal').on('click', '#delete-event', function (e) {
        $.get(base_url + '/shedule/deleteEvent?id=' + currentEvent._id, function (result) {
            $('.alert').addClass('alert-success').text('Event deleted successfully !');
            $('.modal').modal('hide');
            $('#calendar').fullCalendar("refetchEvents");
            hide_notify();
        });
    });


    function modal(data) {
        // Set modal title
        $('.modal-title').html(data.title);
        // Clear buttons except Cancel
        $('.modal-footer button:not(".btn-default")').remove();
        // Set input values
        $('#teacher_list').val(data.event ? data.event.title : '');
        $('#description').val(data.event ? data.event.description : '');
        $('#color').val(data.event ? data.event.color : '#3a87ad');
        // Create Butttons
        $.each(data.buttons, function (index, button) {
            $('.modal-footer').prepend('<button type="button" id="' + button.id + '" class="btn ' + button.css + '">' + button.label + '</button>')
        })
        //Show Modal
        $('.modal').modal('show');
    }

    $('.modal').on('click', '#add-dejur', function (e) {
        $.post(base_url + '/shedule/addDejur', {
            id: $('#idteacher').val(),
            name: $('#teachername').val(),
            telefon: $('#teachertelefon').val(),
            date: $('#first_date_lesson').val(),
            time: $('#time').val()
        }, function (result) {
            $('.alert').addClass('alert-success').text('Event added successfuly');
            $('.modal').modal('hide');
            location.reload();
        });
    });

    $('#dejurniy').click(function () {
        modal({
            buttons: {
                add: {
                    id: 'add-dejur', // Buttons id
                    name: 'add-dejur',
                    css: 'btn-success', // Buttons class
                    label: 'Назначить' // Buttons label
                }
            },
            title: 'Назначить Дежурного' // Modal title
        });
    });

    $('#delldejurniy').click(function () {
        $.post(base_url + '/shedule/dellDejur', {
            id: $('#idteacher').val(),
            name: $('#teachername').val(),
            telefon: $('#teachertelefon').val(),

        }, function (result) {
            $('.alert').addClass('alert-success').text('Event delled successfuly');

            location.reload();
            //$('#calendar').fullCalendar('rerenderEvents');
            //$('#calendar').fullCalendar("refetchEvents");
            //hide_notify();
        });
    });

    $('#updatedejurniy').click(function () {

        $('#first_date_lesson').val($('#djs').val());
        $('#time').val($('#djs2').val());
        modal({
            // Available buttons when adding
            buttons: {
                add: {
                    id: 'add-dejur', // Buttons id
                    name: 'add-dejur',
                    css: 'btn-success', // Buttons class
                    label: 'Назначить' // Buttons label
                }
            },
            title: 'Назначить Дежурного' // Modal title
        });
    });

    function modalder(data) {
        // Set modal title
        $('.modal-title').html(data.title);
        // Clear buttons except Cancel
        $('.modal-footer button:not(".btn-default")').remove();
        // Set input values
        $('#teacher_list').val(data.event ? data.event.title : '');
        $('#description').val(data.event ? data.event.description : '');
        $('#color').val(data.event ? data.event.color : '#3a87ad');
        // Create Butttons
        $.each(data.buttons, function (index, button) {
            $('.modal-footer').prepend('<button type="button" id="' + button.id + '" class="btn ' + button.css + '">' + button.label + '</button>')
        })
        //Show Modal
        $('.modal').modal('show');
    }


    function validator(elements) {
        var errors = 0;
        $.each(elements, function (index, element) {
            if ($.trim($('#' + element).val()) == '') errors++;
            ///alert($('#' + element).val());
        });
        if (errors) {
            $('.error').html('Please insert title and description');
            return false;
        }
        return true;
    }

    /*--------------END Fulll Calendar Raspisanie---------------------------------------------------*/


    $('#first_date_lesson').datepicker({
        format: "dd-mm-yyyy",
        weekStart: 1,
        language: "ru",
        daysOfWeekDisabled: "0",
        autoclose: true,
        calendarWeeks: true,
        todayHighlight: true
    });
    $('#last_date_lesson').datepicker({
        format: "dd-mm-yyyy",
        weekStart: 1,
        language: "ru",
        daysOfWeekDisabled: "0",
        autoclose: true,
        calendarWeeks: true,
        todayHighlight: true
    });
//$('#last_date_lesson').datepicker({
    ///   date($('#first_date_lesson').val());
//});
//  function dayCalc($fD, $cL)
//  {
//     var fd = $fd;
//     var cl = $cl;
//
//
//
//  }

    $("#count_lesson").keyup(function () {
        var d = 0;
        var day1 = 0;
        var dateObj = 0;
        var dayNum = 0;
        var kolzan = 0;

        d = $('#first_date_lesson').datepicker('getDate');
        day1 = $('#first_date_lesson').datepicker('getDate');

        dateObj = new Date($('#first_date_lesson').datepicker('getDate'));
        dayNum = dateObj.getDay();
        kolzan = $('#count_lesson').val();
        //alert(dayNum+"      "+ kolzan);
        if (dayNum % 2 !== 0 && kolzan == 12) {
            //alert(1);
            switch (dayNum) {
                case 1:
                    kolzan = 25;
                    break;
                case 3:
                    kolzan = 26;
                    break;
                case 5:
                    kolzan = 26;
                    break;
            }
            d.setDate(d.getDate() + kolzan);
            $('#last_date_lesson').datepicker('setDate', d);
        }
        if (dayNum % 2 === 0 && kolzan == 12) {
            //alert(2);
            switch (dayNum) {
                case 2:
                    kolzan = 25;
                    break;
                case 4:
                    kolzan = 26;
                    break;
                case 6:
                    kolzan = 26;
                    break;
            }
            d.setDate(d.getDate() + kolzan);
            $('#last_date_lesson').datepicker('setDate', d);
        }

        if (kolzan == 16) {
            switch (dayNum) {
                case 1:
                    kolzan = 25;
                    break;
                case 2:
                    kolzan = 27;
                    break;
                case 3:
                    kolzan = 27;
                    day1.setDate(day1.getDate() + 1);
                    $('#first_date_lesson').datepicker('setDate', day1);
                    break;
                case 4:
                    kolzan = 26;
                    break;
                case 5:
                    kolzan = 27;
                    break;
                case 6:
                    kolzan = 27;
                    day1.setDate(day1.getDate() + 2);
                    $('#first_date_lesson').datepicker('setDate', day1);
                    break;
            }
            d.setDate(d.getDate() + kolzan);
            $('#last_date_lesson').datepicker('setDate', d);
        }
        /////////////////////////////////////////////
        if (dayNum == 1 && kolzan < 12) {
            //alert(kolzan);
            switch (parseInt(kolzan)) {
                case 1://alert(kolzan);
                    kolzan = 0;
                    break;

                case 2:
                    kolzan = 2;
                    break;

                case 3:
                    kolzan = 4;
                    break;

                case 4:
                    kolzan = 7;
                    break;

                case 5:
                    kolzan = 9;
                    break;

                case 6:
                    kolzan = 11;
                    break;

                case 7:
                    kolzan = 14;
                    break;

                case 8:
                    kolzan = 16;
                    break;

                case 9:
                    kolzan = 18;
                    break;

                case 10:
                    kolzan = 21;
                    break;

                case 11:
                    kolzan = 23;
                    break;

            }
            d.setDate(d.getDate() + kolzan);
            $('#last_date_lesson').datepicker('setDate', d);
        }
/////////////////////////////////////////////////////////////////////////////
        if (dayNum == 3 && kolzan < 12) {
            //alert(kolzan);
            switch (parseInt(kolzan)) {
                case 1://alert(kolzan);
                    kolzan = 0;
                    break;

                case 2:
                    kolzan = 2;
                    break;

                case 3:
                    kolzan = 5;
                    break;

                case 4:
                    kolzan = 7;
                    break;

                case 5:
                    kolzan = 9;
                    break;

                case 6:
                    kolzan = 12;
                    break;

                case 7:
                    kolzan = 14;
                    break;

                case 8:
                    kolzan = 16;
                    break;

                case 9:
                    kolzan = 19;
                    break;

                case 10:
                    kolzan = 21;
                    break;

                case 11:
                    kolzan = 23;
                    break;

            }
            d.setDate(d.getDate() + kolzan);
            $('#last_date_lesson').datepicker('setDate', d);
        }
///////////////////////////////////////////////////////////////////////////////////////
        if (dayNum == 5 && kolzan < 12) {
            //alert(kolzan);
            switch (parseInt(kolzan)) {
                case 1://alert(kolzan);
                    kolzan = 0;
                    break;

                case 2:
                    kolzan = 3;
                    break;

                case 3:
                    kolzan = 5;
                    break;

                case 4:
                    kolzan = 7;
                    break;

                case 5:
                    kolzan = 10;
                    break;

                case 6:
                    kolzan = 12;
                    break;

                case 7:
                    kolzan = 14;
                    break;

                case 8:
                    kolzan = 17;
                    break;

                case 9:
                    kolzan = 19;
                    break;

                case 10:
                    kolzan = 21;
                    break;

                case 11:
                    kolzan = 24;
                    break;

            }
            d.setDate(d.getDate() + kolzan);
            $('#last_date_lesson').datepicker('setDate', d);
        }
///////////////////////////////////////////////////////////////////////////////////////
        if (dayNum == 2 && kolzan < 12) {
            //alert(kolzan);
            switch (parseInt(kolzan)) {
                case 1://alert(kolzan);
                    kolzan = 0;
                    break;

                case 2:
                    kolzan = 2;
                    break;

                case 3:
                    kolzan = 4;
                    break;

                case 4:
                    kolzan = 7;
                    break;

                case 5:
                    kolzan = 9;
                    break;

                case 6:
                    kolzan = 11;
                    break;

                case 7:
                    kolzan = 14;
                    break;

                case 8:
                    kolzan = 16;
                    break;

                case 9:
                    kolzan = 18;
                    break;

                case 10:
                    kolzan = 21;
                    break;

                case 11:
                    kolzan = 23;
                    break;

            }
            d.setDate(d.getDate() + kolzan);
            $('#last_date_lesson').datepicker('setDate', d);
        }
//////////////////////////////////////////////////////////////////////////////////////
        if (dayNum == 4 && kolzan < 12) {
            //alert(kolzan);
            switch (parseInt(kolzan)) {
                case 1://alert(kolzan);
                    kolzan = 0;
                    break;

                case 2:
                    kolzan = 2;
                    break;

                case 3:
                    kolzan = 5;
                    break;

                case 4:
                    kolzan = 7;
                    break;

                case 5:
                    kolzan = 9;
                    break;

                case 6:
                    kolzan = 12;
                    break;

                case 7:
                    kolzan = 14;
                    break;

                case 8:
                    kolzan = 16;
                    break;

                case 9:
                    kolzan = 19;
                    break;

                case 10:
                    kolzan = 21;
                    break;

                case 11:
                    kolzan = 23;
                    break;

            }
            d.setDate(d.getDate() + kolzan);
            $('#last_date_lesson').datepicker('setDate', d);
        }
//////////////////////////////////////////////////////////////////////////////////////
        if (dayNum == 6 && kolzan < 12) {
            //alert(kolzan);
            switch (parseInt(kolzan)) {
                case 1://alert(kolzan);
                    kolzan = 0;
                    break;

                case 2:
                    kolzan = 3;
                    break;

                case 3:
                    kolzan = 5;
                    break;

                case 4:
                    kolzan = 7;
                    break;

                case 5:
                    kolzan = 10;
                    break;

                case 6:
                    kolzan = 12;
                    break;

                case 7:
                    kolzan = 14;
                    break;

                case 8:
                    kolzan = 17;
                    break;

                case 9:
                    kolzan = 19;
                    break;

                case 10:
                    kolzan = 21;
                    break;

                case 11:
                    kolzan = 24;
                    break;

            }
            d.setDate(d.getDate() + kolzan);
            $('#last_date_lesson').datepicker('setDate', d);
        }
//////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////
    });


//d.setDate(d.getDate() + 2)
    var k = 0;
    $("#print2").click(function () {

    });//end

    $('#hidden_russian').hide();
    $('#radio_russian').click(function () {
        if ($(this).is(':checked')) {
            //alert('checked');
            $('#hidden_russian').show();
        } else {
            //alert('unchecked');
            $('#hidden_russian').hide();
        }
    });


    $(".bookPayment").on("keyup change", '.bookp', function (e) {

        $('.bookPayment #book-pay').val(360);

        if ($('.bookPayment #ks_price').val() == '') {
            $('.bookPayment #book-pay').val(360);
        }
        $('.bookPayment #book-pay').val($('.bookPayment #book-pay').val() - $('.bookPayment #ks_price').val());
        if ($('.bookPayment #book-pay').val() <= 0) {
            alert('Долг не может быть меньше или равно чем 0!!!!!');
            $('.bookPayment #book-pay').val(360);
            $('.bookPayment #ks_price').val('')
        }
    });

    $('.bookPayment').on("keyup change", '.cdp', function (e) {
        $('.bookPayment #cd-pay').val(200);
        if ($('.bookPayment #cd-dolg').val() == '') {
            $('.bookPayment #cd-pay').val(200);
        }
        $('.bookPayment #cd-pay').val($('.bookPayment #cd-pay').val() - $('.bookPayment #cd-dolg').val());
        if ($('.bookPayment #cd-pay').val() <= 0) {
            alert('Долг не может быть меньше или равно чем 0!!!!!');
            $('.bookPayment #cd-pay').val(200);
            $('.bookPayment #cd-dolg').val('')
        }
    });


    $('#addBook').on("click", function (event) {
        //console.log(event.currentTarget);
        // Check to see if ENTER was pressed and the submit button was active or not
        //alert("aza");
        if (event.currentTarget === document.getElementById("addBook")) {


            $('#bookPayForm').submit(function () {


                var kol = 0;
                $('.dolg-info2').hide();
                $('.opl2info').hide();

                var bookp = $('.bookPayment #book-pay').length > 0 ? parseInt($('.bookPayment #book-pay').val(), 10) : 0;
                var cdp = $('.bookPayment #cd-pay').length > 0 ? parseInt($('.bookPayment #cd-pay').val(), 10) : 0;
                if ($('.bookPayment #book-pay').length > 0 || $('.bookPayment #cd-pay').length > 0) {
                    //alert($('book-pay2').val());
                    //return false;
                    $('.opl2info').show();
                    $('#opl2').text(bookp + cdp);
                    $('#opl2').append('  сом');

                    if (bookp > 0) {
                        $('#opl2info').append('   Оплата за книгу: ' + bookp + 'сом ');
                    }

                    if (cdp > 0) {
                        $('#opl2info').append('   Оплата за cd: ' + cdp + 'сом ');
                    }

                }


                var bookd = $('.bookPayment #ks_price').length > 0 ? $('.bookPayment #ks_price').val() : 0;
                var cdd = $('.bookPayment #cd-dolg').length > 0 ? $('.bookPayment #cd-dolg').val() : 0;

                if ($('.bookPayment #ks_price').length > 0 || $('.bookPayment #cd-dolg').length > 0) {
                    // alert(bookd);
                    //  alert(cdd);
                    if (isNaN(bookd) || bookd == "") {
                        bookd = 0;
                    }
                    if (isNaN(cdd) || cdd == "") {
                        cdd = 0;
                    }
                    //return false;

                    //     alert('aza3');
                    // return false;
                    if ((parseInt(bookd, 10) + parseInt(cdd, 10)) == 0) {
                        $('.hidedolg').hide();
                    }
                    else {
                        $('.bookPayment  .dolg-info2').show();
                        $('.bookPayment  #dol3t3').text(parseInt(bookd, 10) + parseInt(cdd, 10));
                        $('.bookPayment  #dol3t3').append('  сом');
                    }


                    if (bookd > 0) {
                        $('.bookPayment  #dolg-info2').append('   Долг за книгу ' + bookd + 'сом ');
                    }

                    if (cdd > 0) {
                        $('.bookPayment  #dolg-info2').append('   Долг за книгу ' + cdd + 'сом ');
                    }

                }


                $('.bookPayment  #printertitle').text($('#stfio2').val());
                $('.bookPayment  #oplza').text('Спасибо за оплату.');



            });

        }
        else if (event.keyCode === 13 && event.target !== document.getElementById("addBoook")) {
            // ENTER was pressed, but not while the submit button was active


            // Cancel form's submit event
            event.preventDefault();

            //  Invoke click event of target so that non-form submit behaviors will work
            event.target.click();

            // Tell JQuery to cancel the event
            return false;
        }
    });////#addBook


    $('#add').on("click", function (event) {
        //console.log(event.currentTarget);
        // Check to see if ENTER was pressed and the submit button was active or not
        if (event.currentTarget === document.getElementById("add")) {
            //alert('aza');
            // It was, so submit the form
            //return false;

            $('#myform').attr("disabled", true).submit(function () {



            });//endMyform


        } else if (event.keyCode === 13 && event.target !== document.getElementById("add")) {
            // ENTER was pressed, but not while the submit button was active


            // Cancel form's submit event
            event.preventDefault();

            //  Invoke click event of target so that non-form submit behaviors will work
            event.target.click();

            // Tell JQuery to cancel the event
            return false;
        }
    });


////////////////////////////////////////////////////////
    $('#registracion').keyup(function () {
        $('#summast').val(Number($('#registracion').val()) + Number($('#pickup').val()) + Number($('#russianpay').val()));
    });
    $('#pickup').keyup(function () {
        $('#summast').val(Number($('#registracion').val()) + Number($('#pickup').val()) + Number($('#russianpay').val()));
    });
    $('#russianpay').keyup(function () {
        $('#summast').val(Number($('#registracion').val()) + Number($('#pickup').val()) + Number($('#russianpay').val()));
    });
//////////////////////////////////////////////////
    $('#staddform').submit(function () {


        //if($('#email').val()==""){
        //    alert('Вы не ввели email студента!');
        //    return false;
        //}
        var k2 = 0;
        var kol = 0;
        var firstday = 0;
        var poslden = 0;



        var a = $('#first_date_lesson').val();


        //////////////////////////////////////////////////

        // alert($("#gruppa option:selected").text());
        var oplu = 0;
        var oplk = 0;
        var oplc = 0;
        var bookPay = 0;

        // alert(oplu);
        //return false;

        if ($('#radio_russian').is(':checked')) {

            var ob1 = oplu;
            $('#opl_russian').text(ob1);

            $('#oplza_russian').text('Thank you.');

            $('#printertitle_russian').text($('#fio').val());
            $('#printerfd_russian').text($('#first_date_lesson').val());
            $('#printerld_russian').text($('#last_date_lesson').val());
            $('#printerkol_russian').text($('#count_lesson').val());
            $('#balanschek_russian').text($('#balans').val());
            if ($('#registracion').val() != '') {
                $('#pay_registration').text($('#registracion').val());
            }
            else {
                $('#reg_col').hide();
            }
            //////////
            if ($('#pickup').val() != '') {
                $('#pay_pickup').text($('#pickup').val());
            }
            else {
                $('#picup_col').hide();
            }
            /////
            if ($('#russianpay').val() != '') {
                $('#pay_study').text($('#russianpay').val());
            }
            else {
                $('#russianpay_col').hide();
            }


            $('#gruppacheck_russian').text($("#gruppa option:selected").text());


            $("#printer_russian").print({
                //Use Global styles
                globalStyles: false,
                //Add link with attrbute media=print
                mediaPrint: false,
                //Custom stylesheet
                stylesheet: base_url+"/assets/css/bootstrap.css",
                stylesheet: base_url+"/assets/css/style.css",
                //Print in a hidden iframe
                iframe: false,
                //Don't print this
                noPrintSelector: ".avoid-this",
                //Add this at top
                //prepend : "<h1>Callanshcool</h1> <a class='btn btn-primary'></a><br/>",
                //Add this on bottom
                //append : "<br/>Thank you for chose CallanSchool!"
                //alert('uraa');
            });
        }
        else {


            var ob = oplu;
            var stbookp = $('.stad #book-pay').length > 0 ? parseInt($('.stad #book-pay').val(), 10) : 0;
            var stcdp = $('.stad #cd-pay').length > 0 ? parseInt($('.stad #cd-pay').val(), 10) : 0;


            $('#opls').text(ob + stbookp + stcdp + ' сом');
            $('#opl').append('Оплата за учёбу:  ' + $('#summast').val() + 'сом ');
            if (stbookp > 0) {
                $('#opl').append('   Оплата за книгу:  ' + stbookp + 'сом ');
            }
            if (stcdp > 0) {
                $('#opl').append('   Оплата за сд:  ' + stcdp + 'сом ');
            }


            $('#printertitle').text($('#fio').val());
            $('#printerfd').text($('#first_date_lesson').val());
            $('#printerld').text($('#last_date_lesson').val());
            $('#printerkol').text($('#count_lesson').val());

            var stbookd = $('.stad #ks_price').length > 0 ? $('.stad #ks_price').val() : 0;
            var stcdd = $('.stad #cd-dolg').length > 0 ? $('.stad #cd-dolg').val() : 0;
            var dolgG = parseInt($('#opltdolg').val(), 10);

            if ($('.stad #ks_price').length > 0 || $('.stad #cd-dolg').length > 0) {
                // alert(bookd);
                //  alert(cdd);
                if (isNaN(stbookd) || stbookd == "") {
                    stbookd = 0;
                }
                if (isNaN(stcdd) || stcdd == "") {
                    stcdd = 0;
                }
            }
            if ((dolgG + stbookd + stcdd) > 0) {
                //$('#dol3t').text(' Долг:  ');
                //$('#dol3t').append(dolgG+dolg_book+'сом ');
                if (dolgG > 0) {
                    $('#dol3t').append('  Долг за учёбу: ' + dolgG + 'сом      ');
                }
                if (stbookd > 0) {
                    $('#dol3t').append('   Долг за книгу: ' + stbookd + 'сом ');
                }
                if (stcdd > 0) {
                    $('#dol3t').append('   Долг за cd: ' + stcdd + 'сом ');
                }
            }
            else {
                $('.stoh').hide();

            }




            $('#balanschek').text($('#balans').val());
            $('#gruppacheck').text($("#gruppa option:selected").text());
            $('#oplza').text('Спасибо за оплату.');
            $("#printer").print({

                globalStyles: false,

                mediaPrint: false,

                stylesheet: base_url+"/assets/css/bootstrap.css",
                stylesheet: base_url+"/assets/css/style.css",
                //Print in a hidden iframe
                iframe: false,
                //Don't print this
                noPrintSelector: ".avoid-this",
                //Add this at top
                //prepend : "<h1>Callanshcool</h1> <a class='btn btn-primary'></a><br/>",
                //Add this on bottom
                //append : "<br/>Thank you for chose CallanSchool!"
                //alert('uraa');
            });
        }


        //alert (a);
        //return false;


    });
    var nomermega;
    var nomero;
    var nomerbeeline;
    var nomer;




    $('.tabset0').pwstabs({
        effect: 'scale',              // You can change effects of your tabs container: scale / slideleft / slideright / slidetop / slidedown / none
        defaultTab: 1,                  // The tab we want to be opened by default
        containerWidth: '100%',         // Set custom container width if not set then 100% is used
        tabsPosition: 'horizontal',     // Tabs position: horizontal / vertical
        horizontalPosition: 'top',      // Tabs horizontal position: top / bottom
        verticalPosition: 'left',       // Tabs vertical position: left / right
        responsive: true,               // Make tabs container responsive: true / false - boolean
        theme: '',
        rtl: false                      // Right to left support: true/ false
    });

    $('.clockpicker').clockpicker({
        placement: 'top',
        align: 'left',
        donetext: 'Done'
    });

///////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////
    $('#staddform2').submit(function () {
        if ($('#fio').val() === "") {
            alert('Вы не ввели имя студента!');
            return false;
        }
        //if($('#email').val()==""){
        //    alert('Вы не ввели email студента!');
        //    return false;
        //}
        var k2 = 0;
        var kol = 0;
        var firstday = 0;
        var poslden = 0;
        if ($("#summast").val() === "") {
            kol += 1;
        }


        if ($("#first_date_lesson").val() === "") {
            firstday += 1;
        }
        if ($("#last_date_lesson").val() === "") {
            poslden += 1;
        }
        if (kol == 1) {
            alert("Один из полей Оплата должно быть заполненной!!!");
            return false;
        }
        if (firstday == 1) {
            alert("Вы забыли указать дату первого занятия!!!");
            return false;
        }
        if (poslden == 1) {
            alert("Вы забыли указать дату последного занятия!!!");
            return false;
        }
        $('#overlay').fadeIn(400, // сначала плавно показываем темную подложку
            function () { // после выполнения предъидущей анимации
                $('#modal_form')
                    .css('display', 'block') // убираем у модального окна display: none;
                    .animate({opacity: 1, top: '50%'}, 200); // плавно прибавляем прозрачность одновременно со съезжанием вниз
            });
        $('#modal_close, #overlay').click(function () { // ловим клик по крестику или подложке
            $('#modal_form')
                .animate({opacity: 0, top: '45%'}, 200,  // плавно меняем прозрачность на 0 и одновременно двигаем окно вверх
                    function () { // после анимации
                        $(this).css('display', 'none'); // делаем ему display: none;
                        $('#overlay').fadeOut(400); // скрываем подложку
                    }
                );
        });

        var a = $('#first_date_lesson').val();
        $('#printertitle').text($('#fio').val());
        $('#printerfd').text($('#first_date_lesson').val());
        $('#printerld').text($('#last_date_lesson').val());
        $('#printerkol').text($('#count_lesson').val());
        $('#dol3t').text($('#opltdolg').val());
        $('#balanschek').text($('#balans').val());
        $('#gruppacheck').text($("#gruppa option:selected").text());
        // alert($("#gruppa option:selected").text());
        var oplu = 0
        var oplk = 0;
        var oplc = 0;
        if ($('#summast').val() !== "") {
            oplu = parseInt($('#summast').val(), 10);
        }
        else {
            oplu = 0;
        }


        var ob = oplu;
        $('#opl').text(ob);

        $('#oplza').text('Спасибо за оплату.');

        //alert (a);
        //return false;

        /**/


        $("#printer").print({
            //Use Global styles
            globalStyles: false,
            //Add link with attrbute media=print
            mediaPrint: false,
            //Custom stylesheet
            stylesheet: base_url+"/assets/css/bootstrap.css",
            stylesheet: base_url+"/assets/css/style.css",
            //Print in a hidden iframe
            iframe: false,
            //Don't print this
            noPrintSelector: ".avoid-this",
            //Add this at top
            //prepend : "<h1>Callanshcool</h1> <a class='btn btn-primary'></a><br/>",
            //Add this on bottom
            //append : "<br/>Thank you for chose CallanSchool!"
            //alert('uraa');
        });

        return false;
    });

/////////////////////////////////////////////////////////////////////////////
    $("input:button").click(function () {
        //alert($(this).attr("id"));
        //alert($(this).attr("id").length);
        if ($(this).attr("id").length >= 9) {
            var nam = $(this).attr("id");
            var nam2 = $(this).attr("id");
            var nam3 = $(this).attr("id");
            var nam4 = $(this).attr("id");
            var nam5 = $(this).attr("id");
            var nam6 = $(this).attr("id");
            var nam7 = $(this).attr("id");
            //alert(nam3);
            $('#printertitle').text($('#fio').text());
            $('#namegr').text($('#gruppa').text());
            //alert($('#fio').text());

            //alert('#'+nam+' '+'#first_date_lesson');
            nam = '#' + nam + ' ' + '#first_date_lesson';
            $('#printerfd').text($(nam).text());
            //alert($(nam).text());
            //$(this).children(0).text();
            nam2 = '#' + nam2 + ' ' + '#last_date_lesson';
            $('#printerld').text($(nam2).text());
            nam3 = '#' + nam3 + ' ' + '#count_lesson';
            $('#printerkol').text($(nam3).text());
            nam4 = '#' + nam4 + ' ' + '#opltdolg';
            $('#dol3t').text($(nam4).text());
            nam5 = '#' + nam5 + ' ' + '#balans';
            $('#balanschek').text($(nam5).text());
            nam6 = '#' + nam6 + ' ' + '#nomerch';
            $('#nomer').text($(nam6).text());
            //nam7='#'+nam7+' '+'#summa';
            $('#opl').text($('#' + nam7 + ' ' + '#summa').text());
            $('#opls').text($('#' + nam7 + ' ' + '#opl3').text());
            $('#oplza').text('Спасибо за оплату');
            // console.log($('#'+nam7+' '+'#summa').html().split('<p>').split('</p>'));
            //$('#gruppacheck').text($("#gruppa option:selected").text());
            // $("div").children()opl
            $("#printer").print({
                //Use Global styles
                globalStyles: false,
                //Add link with attrbute media=print
                mediaPrint: false,
                //Custom stylesheet
                stylesheet: base_url+"/assets/css/bootstrap.css",
                stylesheet: base_url+"/assets/css/style.css",
                //Print in a hidden iframe
                iframe: false,
                //Don't print this
                noPrintSelector: ".avoid-this",
                //Add this at top
                //prepend : "<h1>Callanshcool</h1> <a class='btn btn-primary'></a><br/>",
                //Add this on bottom
                //append : "<br/>Thank you for chose CallanSchool!"
                //alert('uraa');
            });
        }
    });
//alert(base_url+"/assets/css/bootstrap.css");
    $('#st_cop').click(function () {
        var c = $('#fam p').length;
        var tema;
        for (var i = 1; i <= c; i++) {
            // $('#fam #farm'+i).text().html("modal_form");
            $('#modal_form').append($('#fam #farm' + i).text());
            $('#modal_form').append('<br/>');
            //alert($('#fam #farm'+i).text());
        }
        $('#overlay').fadeIn(400, // сначала плавно показываем темную подложку
            function () { // после выполнения предъидущей анимации
                $('#modal_form')
                    .css('display', 'block') // убираем у модального окна display: none;
                    .animate({opacity: 1, top: '50%'}, 200); // плавно прибавляем прозрачность одновременно со съезжанием вниз
            });
        $('#modal_close, #overlay').click(function () { // ловим клик по крестику или подложке
            $('#modal_form')
                .animate({opacity: 0, top: '45%'}, 200,  // плавно меняем прозрачность на 0 и одновременно двигаем окно вверх
                    function () { // после анимации
                        $(this).css('display', 'none'); // делаем ему display: none;
                        $('#overlay').fadeOut(400); // скрываем подложку
                    }
                );
        });
    });
    $('#opl_st').submit(function () {
        //alert('aza');
        $('#gruppa').text();
        if ($('#gruppa').text() === '') {
            alert('Добавьте студента в группу!');
            return false;
        }
        //alert($('#gruppa').text());

    });
    var paymentHide = 0;
    $('.bookPayment').hide();
    $('.lessonPayment').hide();
    $('.dolgPayment').hide();
    $('.bookcdinfo').hide();


    $('#lessonPayment').click(function (e) {

        $('.bookPayment').hide();
        $('.dolgPayment').hide();
        $('.bookcdinfo').hide();
        $('.lessonPayment').show();


    });

    $('#bookPayment').click(function () {
        $('.bookPayment').hide();
        $('.dolgPayment').hide();
        $('.lessonPayment').hide();
        $('.bookcdinfo').show();

    });
    $('#dolgPayment').click(function () {
        $('.bookPayment').hide();
        $('.lessonPayment').hide();
        $('.bookcdinfo').hide();
        $('.dolgPayment').show();
    });


    /*--------------Barcode Functions---------------------------------------------------*/
	 // $('#probnikAfterScan').hide();
	 $('#scanProbnik').hide();
    var sta = 0;
    var stb = 0;
    var stc = 0;
    var bflag = 0;

    function putBookForm(barcode) {

        if (barcode == 555890405 || barcode == 701890405 || barcode == 554177677 || barcode == 707890405) {
            stb++;
            // alert(barcode);
            if (stb == 1) {
                // bflag = (barcode == 555890405) ? 380 : 360;
                //bflag2 = (barcode == 555890405) ? 380 : 360;
                switch (barcode) {

                    case '555890405':
                        bflag = 600;
                        break;

                    case '701890405':
                        bflag = 600;
												break;
										case '707890405':
										bflag = 600;
										break;
                    case '554177677':
                        bflag = 1030;
                        break;

                    default:

                        bflag = 0;

                }
                $(` <div class="row bookp">
               <div class="col-md-5">
                 <div class="input-group">
                    <span class="input-group-addon">Оплата за книгу  <span class="glyphicon glyphicon-book"></span></span>
                    <input type="number" class="form-control"  placeholder="Введите сумму" name="book-pay" id="book-pay" required>
                </div>
               </div>
               <div class="col-md-4">
                 <div class="input-group">
                    <span class="input-group-addon">Долг за книгу&nbsp;&nbsp;&nbsp;&nbsp<span class="glyphicon glyphicon-asterisk"></span></span>
                    <input type="number" class="form-control"    name="ks_price" id="ks_price">
                    
                   
                </div>
               </div>
               <div class="col-md-3">
							 <div class="input-group"  :class="{'has-error':  errors.has('codeBook')}">
                   
							 <select  class="form-control"  name="codeBook" id='codeBook' v-validate="'required|not_in:Choose'" required="">
								
							 <option value="1" >Книга ур.1</option>
											<option value="2" >Книга ур.2</option>
											<option value="3" >Книга ур.3</option>
											<option value="4" >Книга ур.4</option>
											<option value="5" >Книга ур.5</option>
											<option value="6" >Книга ур.6</option>
											<option value="7" >Книга ур.7</option>
											<option value="8" >Книга ур.8</option>
											<option value="9" >Книга Русский</option>
								</select>
							
					</div>
               </div>
              </div>`).insertAfter('.stb');
                $('.stad #book-pay').val(bflag);
            }
        }
        if (barcode == 700890405) {
            $('.stlessonbookcdinfo').hide();

            stc++;
            if (stc == 1) {
                $(`  <div class="row cdp">
           <div class="col-md-6">
             <div class="input-group">
                <span class="input-group-addon">Оплата за cd&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-cd"></span></span>
                <input type="number" class="form-control"  placeholder="Введите сумму" name="cd-pay" id="cd-pay" required>
            </div>
           </div>
           <div class="col-md-6">
             <div class="input-group">
                <span class="input-group-addon">Долг за cd&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-asterisk"></span></span>
                <input type="number" class="form-control"    name="cd-dolg" id="cd-dolg">
            </div>
           </div>
        </div><br>`).insertAfter('.stc');
            }
            $('.stad #cd-pay').val(200);
        }
        if (barcode == 770890405) {
            $('#scanProbnik').hide();
            $('#probnikAfterScan').show();
        }

    }

    var bk = 0;
    var bk2 = 0;
    var lk = 0;
    var lk2 = 0;


    $(document.body).scannerDetection({
        timeBeforeScanTest: 200, // wait for the next character for upto 200ms
        avgTimeByChar: 100, // it's not a barcode if a character takes longer than 100ms
        onComplete: function (barcode, qty) {
            putBookForm(barcode);
        }
    });
    $('.stad').on("keyup change", '.bookp', function (e) {
        //alert(1);
        $('.stad #book-pay').val(bflag);
        if ($('.stad #ks_price').val() == '') {
            $('.stad #book-pay').val(bflag);
        }
        $('.stad #book-pay').val($('.stad #book-pay').val() - $('.stad #ks_price').val());
        if ($('.stad #book-pay').val() <= 0) {
            alert('Долг не может быть меньше или равно чем 0!!!!!');
            $('.stad #book-pay').val(bflag);
            $('.stad #ks_price').val('')
        }
    });

    $(".stad").on("keyup change", '.cdp', function (e) {
        $('.stad #cd-pay').val(200);
        if ($('.stad #cd-dolg').val() == '') {
            $('.stad #cd-pay').val(200);
        }
        $('.stad #cd-pay').val($('.stad #cd-pay').val() - $('.stad #cd-dolg').val());
        if ($('.stad #cd-pay').val() <= 0) {
            alert('Долг не может быть меньше или равно чем 0!!!!!');
            $('.stad #cd-pay').val(200);
            $('.stad #cd-dolg').val('')
        }
    });

    var bflag2 = 0;

    function putBookFormLessonPay(barcode) {

        if (barcode == 555890405 || barcode == 701890405 || barcode == 554177677  || barcode == 707890405) {
            bk++;
            //alert(barcode+' 2');
            if (bk == 1) {
                //bflag2 = (barcode == 555890405) ? 380 : 360;
                switch (barcode) {

                    case '555890405':
                        bflag2 = 600;
                        break;

                    case '701890405':
                        bflag2 = 600;
												break;
										case '707890405':
										bflag2 = 600;
										break;
                    case '554177677':
                        bflag2 = 1030;
                        break;

                    default:

                        bflag2 = 0;

                }

                $('.stlessonbookcdinfo').hide();
 $(` <div class="row bookp2">
               <div class="col-md-5">
                 <div class="input-group">
                    <span class="input-group-addon">Оплата за книгу&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-book"></span></span>
                    <input type="number" class="form-control"  placeholder="Введите сумму" name="book-pay" id="book-pay" required>
                </div>
               </div>
               <div class="col-md-4">
                 <div class="input-group">
                    <span class="input-group-addon">Долг за книгу&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-asterisk"></span></span>
                    <input type="number" class="form-control"    name="ks_price" id="ks_price">
                     
                </div>
               </div>
               <div class="col-md-3">
                 <div class="input-group"  :class="{'has-error':  errors.has('codeBook')}">
                   
                     <select  class="form-control"  name="codeBook" id='codeBook' v-validate="'required|not_in:Choose'" required="">
											
										 <option value="1" >Книга ур.1</option>
                            <option value="2" >Книга ур.2</option>
                            <option value="3" >Книга ур.3</option>
                            <option value="4" >Книга ур.4</option>
                            <option value="5" >Книга ур.5</option>
                            <option value="6" >Книга ур.6</option>
                            <option value="7" >Книга ур.7</option>
                            <option value="8" >Книга ур.8</option>
                            <option value="9" >Книга Русский</option>
                      </select>
										
                </div>
               </div>
              </div>`).insertAfter('.stb2');
                $('.lessonPayment #book-pay').val(bflag2);
            }
        }
        if (barcode == 700890405) {
            $('.stlessonbookcdinfo').hide();

            lk++;
            if (lk == 1) {
                $(`  <div class="row cdp2">
           <div class="col-md-6">
             <div class="input-group">
                <span class="input-group-addon">Оплата за cd&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-cd"></span></span>
                <input type="number" class="form-control"  placeholder="Введите сумму" name="cd-pay" id="cd-pay" required>
            </div>
           </div>
           <div class="col-md-6">
             <div class="input-group">
                <span class="input-group-addon">Долг за cd&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-asterisk"></span></span>
                <input type="number" class="form-control"    name="cd-dolg" id="cd-dolg">
            </div>
           </div>
        </div><br>`).insertAfter('.stc2');
            }
            $('.lessonPayment #cd-pay').val(200);
        }

    }

    var bflag3 = 0;

    function putBookFormBookPay(barcode) {
        // if (barcode == 555890405 || barcode == 701890405 || barcode == 554177677) {
        //     bk++;
        //    // alert(barcode);
        //     if (bk == 1) {
        //         bflag2 = (barcode == 555890405) ? 380 : 360;
        //         switch (barcode) {

        //                 case 555890405:
        //                     bflag2 = 380;
        //                     break;

        //                 case 701890405:
        //                     bflag2 = 360;
        //                     break;
        //                 case 554177677:
        //                     bflag2 = 1030;
        //                     break;

        //                 default:

        //                     bflag2 = 0;

        //                 }

        if (barcode == 555890405 || barcode == 701890405 || barcode == 707890405 || barcode == 554177677) {
            bk2++;
            //alert(barcode+ ' 3');
            if (bk2 == 1) {
                //bflag3 = (barcode == 555890405) ? 380 : 360;
                switch (barcode) {

                    case '555890405':
                        bflag3 = 600;
                        break;

												case '701890405':
                        bflag3 = 600;
												break;
												
												case '707890405':
                        bflag3 = 600;
                        break;
                    case '554177677':
                        bflag3 = 1030;
                        break;

                    default:

                        bflag3 = 0;

                }
                $('.bookcdinfo').hide();
                $('.bookPayment').show();
   $(` <div class="row bookp2">
               <div class="col-md-5">
                 <div class="input-group">
                    <span class="input-group-addon">Оплата за книгу&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-book"></span></span>
                    <input type="number" class="form-control"  placeholder="Введите сумму" name="book-pay" id="book-pay" required>
                </div>
               </div>
               <div class="col-md-4">
                 <div class="input-group">
                    <span class="input-group-addon">Долг за книгу&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-asterisk"></span></span>
                    <input type="number" class="form-control"    name="ks_price" id="ks_price">
                    <input type="hidden" name="barcode" value=${barcode}>
                </div>
               </div>
               <div class="col-md-3">
							 <div class="input-group"  :class="{'has-error':  errors.has('codeBook')}">
                   
							 <select  class="form-control"  name="codeBook" id='codeBook' v-validate="'required|not_in:Choose'" required="">
								
							 <option value="1" >Книга ур.1</option>
											<option value="2" >Книга ур.2</option>
											<option value="3" >Книга ур.3</option>
											<option value="4" >Книга ур.4</option>
											<option value="5" >Книга ур.5</option>
											<option value="6" >Книга ур.6</option>
											<option value="7" >Книга ур.7</option>
											<option value="8" >Книга ур.8</option>
											<option value="9" >Книга Русский</option>
								</select>
							
					</div>
               </div>
              </div>`).insertAfter('.booka');
                $('.bookPayment #book-pay').val(bflag3);
            }
        }
        if (barcode == 700890405) {
            $('.bookcdinfo').hide();
            $('.bookPayment').show();
            lk2++;
            if (lk2 == 1) {
                $(`  <div class="row cdp2">
           <div class="col-md-6">
             <div class="input-group">
                <span class="input-group-addon">Оплата за cd&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-cd"></span></span>
                <input type="number" class="form-control"  placeholder="Введите сумму" name="cd-pay" id="cd-pay" required>
            </div>
           </div>
           <div class="col-md-6">
             <div class="input-group">
                <span class="input-group-addon">Долг за cd&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-asterisk"></span></span>
                <input type="number" class="form-control"    name="cd-dolg" id="cd-dolg">
            </div>
           </div>
        </div><br>`).insertAfter('.cda');
            }
            $('.bookPayment #cd-pay').val(200);
        }

    }

    /*--------------END Barcode Functions---------------------------------------------------*/
    /*--------------Student Barcode Functions---------------------------------------------------*/
    $('#lessonPayment').scannerDetection({
        timeBeforeScanTest: 200, // wait for the next character for upto 200ms
        avgTimeByChar: 100, // it's not a barcode if a character takes longer than 100ms
        ignoreIfFocusOn: 'input',
        onKeyDetect: function (event) {
            console.log(event.which);
            return false;
        },
        endChar: [13], // be sure the scan is complete if key 13 (enter) is detected
        onComplete: function (barcode, qty) {


            putBookFormLessonPay(barcode);

            // alert(barcode);
        },
        onError: function (string) {
            alert('Error ' + string);
        },
    });

    $('.lessonPayment').on(':input', 'focus', function () {

    }).delegate(':input', 'blur', function () {
        $('#lessonPayment').focus();
    });

    $('.lessonPayment').on("keyup change", '.bookp2', function (e) {
        // alert(2);
        $('.lessonPayment #book-pay').val(bflag2);
        if ($('.lessonPayment #ks_price').val() == '') {
            $('.lessonPayment #book-pay').val(bflag2);
        }
        $('.lessonPayment #book-pay').val($('.lessonPayment #book-pay').val() - $('.lessonPayment #ks_price').val());
        if ($('.lessonPayment #book-pay').val() <= 0) {
            alert('Долг не может быть меньше или равно чем 0!!!!!');
            $('.lessonPayment #book-pay').val(bflag2);
            $('.lessonPayment #ks_price').val('')
        }
    });

    $(".lessonPayment").on("keyup change", '.cdp2', function (e) {
        $('.lessonPayment #cd-pay').val(200);
        if ($('.lessonPayment #cd-dolg').val() == '') {
            $('.lessonPayment #cd-pay').val(200);
        }
        $('.lessonPayment #cd-pay').val($('.lessonPayment #cd-pay').val() - $('.lessonPayment #cd-dolg').val());
        if ($('.lessonPayment #cd-pay').val() <= 0) {
            alert('Долг не может быть меньше или равно чем 0!!!!!');
            $('.lessonPayment #cd-pay').val(200);
            $('.lessonPayment #cd-dolg').val('')
        }
    });

    /*--------------END Student Barcode Functions---------------------------------------------------*/


    /*--------------Student Book Barcode Functions---------------------------------------------------*/

    $('#bookPayment').scannerDetection({
        timeBeforeScanTest: 200, // wait for the next character for upto 200ms
        avgTimeByChar: 100, // it's not a barcode if a character takes longer than 100ms
        ignoreIfFocusOn: 'input',
        onKeyDetect: function (event) {
            console.log(event.which);
            return false;
        },
        endChar: [13], // be sure the scan is complete if key 13 (enter) is detected
        onComplete: function (barcode, qty) {
            putBookFormBookPay(barcode);

        }
    });



    $('.bookPayment').on(':input', 'focus', function () {
        alert(1);
    }).delegate(':input', 'blur', function () {
        $('#bookPayment').focus();
    });
    $('.bookPayment').on("keyup change", '.bookp2', function (e) {
        // alert(2);
        $('.bookPayment #book-pay').val(bflag3);
        if ($('.bookPayment #ks_price').val() == '') {
            $('.bookPayment #book-pay').val(bflag3);
        }
        $('.bookPayment #book-pay').val($('.bookPayment #book-pay').val() - $('.bookPayment #ks_price').val());
        if ($('.bookPayment #book-pay').val() <= 0) {
            alert('Долг не может быть меньше или равно чем 0!!!!!');
            $('.bookPayment #book-pay').val(bflag3);
            $('.bookPayment #ks_price').val('')
        }
    });

    $(".bookPayment").on("keyup change", '.cdp2', function (e) {
        $('.bookPayment #cd-pay').val(200);
        if ($('.bookPayment #cd-dolg').val() == '') {
            $('.bookPayment #cd-pay').val(200);
        }
        $('.bookPayment #cd-pay').val($('.bookPayment #cd-pay').val() - $('.bookPayment #cd-dolg').val());
        if ($('.bookPayment #cd-pay').val() <= 0) {
            alert('Долг не может быть меньше или равно чем 0!!!!!');
            $('.bookPayment #cd-pay').val(200);
            $('.bookPayment #cd-dolg').val('')
        }
    });


    /*--------------END Student Book Barcode Functions---------------------------------------------------*/


///////////////////////////////////Oplata Dolga///////////////////////////////////////////////////////


    $('#dolgInfo').hide();
    $('#dolBinfo').hide();
    $('#dolCinfo').hide();

    $('#dolB').on('click', function () {
        if ($('#dolgInfo').is(":hidden")) {
            $('#dolgInfo').show();
        }
        $('#dolBinfo').show();
        $("#dolg-pay").prop('required', true);
        event.preventDefault();

        //  Invoke click event of target so that non-form submit behaviors will work
        event.target.click();

        // Tell JQuery to cancel the event $("input").prop('required',true);
        return false;
    });
    var cdbs = parseInt($('#dolBS').text(), 10);
    $('#dolg-pay').on("keyup change", function () {
        // var dbs=parseInt($('#dolBS').text(),10);
        var cpay = parseInt($('#dolg-pay').val(), 10);
        if (isNaN(cpay) || cpay == "") {
            cpay = 0;
        }
        $('#dolBS').text(cdbs - cpay);
        if (cpay > cdbs) {

            alert("Сумма больше чем долг!!!");
            $('#dolg-pay').val('');
            $('#dolBS').text(cdbs);
        }
        else {
            if ($('#dolBS').text() == 0) {
                $("#bookDolgPay").val('');
            }
            else {
                $("#bookDolgPay").val($('#dolBS').text());
            }
        }

    });

    $('#dolC').on('click', function () {
        if ($('#dolgInfo').is(":hidden")) {
            $('#dolgInfo').show();
        }
        $('#dolCinfo').show();
        $("#cd-dolg").prop('required', true);
        event.preventDefault();

        //  Invoke click event of target so that non-form submit behaviors will work
        event.target.click();

        // Tell JQuery to cancel the event $("input").prop('required',true);
        return false;
    });
    var cdcs = parseInt($('#dolCS').text(), 10);
    $('#cd-dolg').on("keyup change", function () {
        // var dbs=parseInt($('#dolBS').text(),10);
        var cpay2 = parseInt($('#cd-dolg').val(), 10);
        if (isNaN(cpay2) || cpay2 == "") {
            cpay2 = 0;
        }
        $('#dolCS').text(cdcs - cpay2);
        if (cpay2 > cdcs) {

            alert("Сумма больше чем долг!!!");
            $('#cd-dolg').val('');
            $('#dolCS').text(cdcs);
        }
        else {
            if ($('#dolCS').text() == 0) {
                $("#cdDolgPay").val('');
            }
            else {
                $("#cdDolgPay").val($('#dolCS').text());
            }
        }

    });


    $('#addDolg').on("click", function (event) {
        //console.log(event.currentTarget);
        // Check to see if ENTER was pressed and the submit button was active or not
        if (event.currentTarget === document.getElementById("#addDolg")) {
            $('#dolgPayment').submit(function () {
                var kol = 0;

                $('#printertitle').text($('#stfio2').val());
                $('#opl2').text('Оплатил долг за книгу ' + $("#dolg-pay").val() + ' сом');
                $('#oplza').text('Спасибо за оплату.');


                //alert(kol);
                //return false;
            });


        } else if (event.keyCode === 13 && event.target !== document.getElementById("add")) {
            // ENTER was pressed, but not while the submit button was active


            // Cancel form's submit event
            event.preventDefault();

            //  Invoke click event of target so that non-form submit behaviors will work
            event.target.click();

            // Tell JQuery to cancel the event
            return false;
        }
    });

///////////////////////////////////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////end///////////////////////////////////////////////////////////////

////////////////////////////////////Probnik///////////////////////////////////////////////////////////////
    $('#printProbnikChek').on("click", function (event) {
        //console.log(event.currentTarget);
        // Check to see if ENTER was pressed and the submit button was active or not
        //alert("aza");
        if (event.currentTarget === document.getElementById("printProbnikChek")) {
            $("#printerProbnik").print({                                                //Use Global styles
                globalStyles: false,
                //Add link with attrbute media=print
                mediaPrint: false,
                //Custom stylesheet
                stylesheet: base_url+"/assets/css/bootstrap.css",
                stylesheet: base_url+"/assets/css/style.css",
                //Print in a hidden iframe
                iframe: false,
                //Don't print this
                noPrintSelector: ".avoid-this",
                //Add this at top
                //prepend : "<h1>Callanshcool</h1> <a class='btn btn-primary'></a><br/>",
                //Add this on bottom
                //append : "<br/>Thank you for chose CallanSchool!"
                //alert('uraa');
            });


        }
        else if (event.keyCode === 13 && event.target !== document.getElementById("addBoook")) {
            // ENTER was pressed, but not while the submit button was active


            // Cancel form's submit event
            event.preventDefault();

            //  Invoke click event of target so that non-form submit behaviors will work
            event.target.click();

            // Tell JQuery to cancel the event
            return false;
        }
    });////#addBook


////////////////////////////////////End///////////////////////////////////////////////////////////////
////////////////////////////////////Table Matrix///////////////////////////////////////////////////////////////


////////////////////////////////////END Table Matrix///////////////////////////////////////////////////////////////


/////////////////////////////////Mark Search Result////////////////////////////////////////

    var markText = $('#markVal').val();
    $('#markSearch').highlight(markText);
//alert(markText);


/////////////////////////////////END Mark Search Result////////////////////////////////////////
/////////////////////////////////Add group lesson modal ////////////////////////////////////////
    $('.modal').on('click', '#addLesson', function (e) {
        // alert($('#first_date_lesson').val());
        // alert($('#idteacher').val());
        // alert($('#teachername').val());
        // alert($('#teachertelefon').val());
        // alert($('#first_date_lesson').val());
        // alert($('#time').val());
        // return false;
        if ($('#numberLesson').val() == '') {
            alert('Укажите номер урока');
            return false;
        }
        $.post(base_url + '/api/example/addLesson', {
            lesson: $('#numberLesson').val(),
            id_group: $('#idGr').val()
        }, function (result) {
			console.log(result);
            $('.alert').addClass('alert-success').text('Event added successfuly');
            $('.modal').modal('hide');
            location.reload();
            //$('#calendar').fullCalendar('rerenderEvents');
            //$('#calendar').fullCalendar("refetchEvents");
            //hide_notify();
        });
        // $.get(base_url+'shedule/deleteEvent?id=' + currentEvent._id, function(result){
        //     $('.alert').addClass('alert-success').text('Event deleted successfully !');
        //     $('.modal').modal('hide');
        //     $('#calendar').fullCalendar("refetchEvents");
        //     hide_notify();

    });
/////////////////////////////////End group lesson modal ////////////////////////////////////////
///////////////////////////////// Client modal ////////////////////////////////////////
    $('.result2').hide();
    $('.modal').on('click', '#addClient', function (e) {
        // alert($('#hidid').val());
        // return false;
        $.post(base_url + '/futurest/saveClient', {
            nameClient: $('#nameClient').val(),
            phoneClient: $('#phoneClient').val(),
            levelClient: $('#levelClient').val(),
            comentClient: $('#comentClient').val(),
            hidid: $('#hidid').val()
        }, function (result) {
            $('.alert').addClass('alert-success').text('Event added successfuly');
            $('.modal').modal('hide');
            location.reload();
        });
    });


    $('.modal').on('click', '#removeClient', function (e) {
        //alert($(this).data('sid'));
        //return false;
        $.post(base_url + '/futurest/dellClientAjax2', {
            id: $(this).data('sid')

        }, function (result) {
            $('.alert').addClass('alert-success').text('Event added successfuly');
            $('.modal').modal('hide');
            location.reload();
        });

    });


    $('.modal').on('click', '#searchClient', function (e) {
        $.ajax({
            url: base_url + '/futurest/searchClient',
            type: 'POST',
            dataType: 'json',
            cache: 'false',
            data: {
                levelClient: $('#levelClient2').val()

            },
            success: function (data) {
                //'console.log(data);
                // alert( $('#levelClient2').val());

                $('.result').hide();
                $('.result2').show();
                $('.modal').modal('hide');
                $(".insertBody").html('');
                // $.each(result, function (index, value) {
                //         alert(index );
                //     });
                for (var i = 0; i < data.length; i++) {
                    $(".insertBody").append(`
                    <tr>
                      <td>#</td>
                      <td>` + data[i].name + `</td>
                      <td>` + data[i].phone + `</td>
                      <td>` + returnLevel(parseInt(data[i].level)) + `</td>
                      <td>` + data[i].comment + `</td>
                      <td> <button type="button" class="btn btn-primary" id="dellClient" data-sid="` + data[i].id + `"><i class="fa fa-check" aria-hidden="true"></i></button></td>
                    </tr>`);
                }

                //location.reload();
            },
            error: function () {
                alert("Oops! Something didn't work getTeachers");
            }
        });
    });
    function returnLevel(l) {

        switch (l) {
            case 1:
                return 'Первый уровень начало';
                break;
            case 12:
                return 'Первый уровень середина';
                break;
            case 2:
                return 'Второй уровень начало';
                break;
            case 22:
                return 'Второй уровень середина';
                break;
            case 3:
                return 'Третий уровень начало';
                break;
            case 32:
                return 'Третий уровень середина';
                break;
            case 4:
                return 'Четвертый уровень начало';
                break;
            case 42:
                return 'Четвертый уровень середина';
                break;
            case 5:
                return 'Пятый уровень начало';
                break;
            case 52:
                return 'Пятый уровень середина';
                break;
            case 6:
                return 'Шесть уровень начало';
                break;
            case 62:
                return 'Шесть уровень середина';
                break;
            case 7:
                return 'Седьмой уровень начало';
                break;
            case 72:
                return 'Седьмой уровень середина';
                break;

            default:

                break;
        }

    }

    $('.result').on('click', '#dellClient', function (e) {
        $.ajax({
            url: base_url + '/futurest/dellClientAjax',
            type: 'POST',
            data: {
                id: $(this).data('sid')

            },
            success: function (data) {

                location.reload();
            },
            error: function () {
                alert("Oops! Something didn't work getTeachers");
            }
        });
    });
//////////////////////////////
    $('.result').on('click', '#correctClient', function (e) {
		$.ajax({
            url: base_url + '/futurest/getClientClientAjax',
            type: 'POST',
            dataType: 'json',
            cache: false,
            data: {
                id: $(this).data('sid')

            },
            success: function (response) {
                $('#addClient').modal('show');
                $('#nameClient').val(response.name);
                $('#phoneClient').val(response.phone);

                $("#levelClient option[value='" + response.level + "']").attr("selected", "selected");
                $('#comentClient').val(response.comment);
                $('#hidid').val(response.id);
                $(`<button type="button" class="btn btn-danger" id="removeClient" data-sid="` + response.id + `">Удалить </button>`).insertAfter($('.af'));
                console.log(response);
            },
            error: function () {
                alert("Oops! Something didn't work getTeachers");
            }
        });
    });
/////////////////////////////////End Client modal  ////////////////////////////////////////
    $('#printProbpusk').on("click", function (event) {
        //console.log(event.currentTarget);
        // Check to see if ENTER was pressed and the submit button was active or not
        //alert("aza");
        if (event.currentTarget === document.getElementById("printProbpusk")) {
            $("#Probpusk").print({                                                //Use Global styles
                globalStyles: false,
                //Add link with attrbute media=print
                mediaPrint: false,
                //Custom stylesheet
                stylesheet: base_url+"/assets/css/bootstrap.css",
                stylesheet: base_url+"/assets/css/style.css",
                //Print in a hidden iframe
                iframe: false,
                //Don't print this
                noPrintSelector: ".avoid-this",
                //Add this at top
                //prepend : "<h1>Callanshcool</h1> <a class='btn btn-primary'></a><br/>",
                //Add this on bottom
                //append : "<br/>Thank you for chose CallanSchool!"
                //alert('uraa');
			});
		}
	});////#addBook

	// $('#payBookManually').click(function() {
	// 	putBookFormBookPay('555890405');
	// }
	// );
});///end document



