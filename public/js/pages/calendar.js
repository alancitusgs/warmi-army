(function($) {
                "use strict";
                $.getJSON("/lang/json", function(data) {

                    var calendar = $('#calendar').fullCalendar({
                      locale: data.lang,
                      header: {
                          left: 'prev, next today',
                          center: 'title',
                          right: 'month, basicWeek ,basicDay'
                      },
                      buttonText: {
                          prev: 'prev',
                          next: 'next'
                      },
                      timeFormat: 'h(:mm)t',
                      selectable: true,
                      dayClick: function (date, allDay, jsEvent, view) {
                          $.confirm({
                              columnClass: "xl",
                              icon: "fas fa-plus-circle",
                              title: data.new_activity,
                              content: "url:/activities/modal/create",
                              onContentReady: function () {
                                  flatpickr('#date_from', {
                                      enableTime: true,
                                      dateFormat: "Y-m-d H:i",
                                      defaultDate: date.format("YYYY-MM-DD H:i")
                                  });
                                  flatpickr('#date_to', {
                                      enableTime: true,
                                      dateFormat: "Y-m-d H:i",
                                      defaultDate: new Date()
                                  });
                                  days();
                              },
                              buttons: {
                                  confirm: {
                                      text: "<i class='fas fa-plus'></i></span> " + data.create,
                                      btnClass: "btn btn-icon btn-primary",
                                      action: function(){
                                          var form  = $('#form-create');
                                          var url   = form.attr('action');
                                          var data  = form.serialize();
                                          $.post(url, data, function(response){
                                              if(response === 'success'){
                                                  $('#form-create')[0].reset();
                                                  $.notify({
                                                      icon: 'ni ni-bell-55',
                                                      title: "<strong>" + data.msg_info + "</strong> <br>",
                                                      message: data.msg_success
                                                      },
                                                      {
                                                          type: "success",
                                                          placement: {
                                                              from: "top",
                                                              align: "center"
                                                          },
                                                      }
                                                  );
                                              }
                                          }).fail(function(jqXHR, textStatus, errorThrown){
                                              $('.btn-cancel').trigger('click');
                                              var errors = '';

                                              $.each(jqXHR.responseJSON.errors, function(key,value) {
                                                  errors += '* ' + value + '</br>';
                                              });

                                              $.notify({
                                                  icon: 'ni ni-fat-remove',
                                                  title: "<strong>" + data.msg_info + "</strong> <br>",
                                                  message: errors
                                                  },
                                                  {
                                                      z_index: 1300,
                                                      type: "danger",
                                                          placement: {
                                                          from: "top",
                                                          align: "center"
                                                      },
                                                  }
                                              );
                                          });
                                          return false;
                                      }
                                  },
                                  cancel: function () {
                                      
                                  },
                              }
                          });
                      },
                      eventClick: function (calEvent, jsEvent, view) {
                          $('#calendar-user-modal').html(calEvent.name);
                          $('#calendar-title-modal').html(calEvent.title);
                          $('#calendar-status-modal').html(calEvent.status);
                          $('#delete-buttom').data('data-delete-id', calEvent.id);
                          $("#calendar-edit-link").attr("href", calEvent.edit_url);
                          $('#calendar-description-modal').html(calEvent.description);
                          $('#calendar-status-dot').removeClass().addClass(calEvent.status_dot);
                          $('#calendar-date-from-modal').html('<i class="far fa-clock"></i> ' + calEvent.start.format("DD-MM-YYYY"));
                          $('#calendar-date-to-modal').html('<i class="far fa-clock"></i> ' + calEvent.end.format("DD-MM-YYYY"));
                          $('#calendar-image-modal').attr("src", calEvent.avatar);
                          $("#modal-form").modal();
                      },
                      select: function (start, end, allDay) {
                          
                      },
                        events: {
                            url: "/calendar/json",
                            failure: function() {
                                $.alert('Error');
                            }
                        }
                    });

                    //Calendar's Title
                  var date = calendar.fullCalendar('getDate');
                  $('#calendar-date').html(date.format("MMMM YYYY"));

                  $('.fullcalendar-btn-next').on('click', function() {
                    calendar.fullCalendar('next');
                    var date = calendar.fullCalendar('getDate');
                    $('#calendar-date').html(date.format("MMMM YYYY"));
                  });

                  $('.fullcalendar-btn-prev').on('click', function() {
                    calendar.fullCalendar('prev');
                    var date = calendar.fullCalendar('getDate');
                    $('#calendar-date').html(date.format("MMMM YYYY"));
                  });

                  $('.basicWeek').on('click', function() {
                    calendar.fullCalendar('changeView', 'basicWeek');
                    var date = calendar.fullCalendar('getDate');
                    $('#calendar-date').html(date.format("MMMM YYYY"));
                  });
                  $('.basicDay').on('click', function() {
                    calendar.fullCalendar('changeView', 'basicDay');
                    var date = calendar.fullCalendar('getDate');
                    $('#calendar-date').html(date.format("MMMM YYYY"));
                  });
                  $('.month').on('click', function() {
                    calendar.fullCalendar('changeView', 'month');
                    var date = calendar.fullCalendar('getDate');
                    $('#calendar-date').html(date.format("MMMM YYYY"));
                  });

                  function days(){
                      var date_to     = moment($('#date_to').val());
                      var date_from   = moment($('#date_from').val());
                      $('#days').html(date_to.diff(date_from, 'days') + " " + data.days);
                  }
                });
                
                $('#full_day').on('change', function() {
                  if($('#full_day').is(":checked")){
                      flatpickr('#date_to', {
                          enableTime: true,
                          dateFormat: "Y-m-d H:i",
                          defaultDate: $('#date_from').val()
                      });
                      days();
                  }
              });
              $('#date_from, #date_to').on('change', function() {
                  days();
              });
            })(jQuery);