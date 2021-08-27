(function($) {
            "use strict";
            $.getJSON("/lang/json", function(data) {
                $(document).ready(function(){
                    flatpickr('.flat-datetime', {
                        enableTime: true,
                        dateFormat: "Y-m-d H:i",
                    });
                    days();
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
                function days(){
                    var date_to     = moment($('#date_to').val());
                    var date_from   = moment($('#date_from').val());
                    $('#days').html(date_to.diff(date_from, 'days') + " " + data.days);
                }

                $('.btn-create').on('click', function(e) {
                    e.preventDefault();
                    var form  = $('#form-create');

                    var title=document.getElementById('title').value.trim();
                    var responsable=document.getElementById('responsable').value.trim();
                    var description=document.getElementById('description').value.trim();
                    var area=document.getElementById('area').value.trim();
                    var alcance=document.getElementById('alcance').value.trim();
                    var resena=document.getElementById('resena').value.trim();
                    var ponente=document.getElementById('ponente').value.trim();
                    var publico=document.getElementById('publico').value.trim();
                    var date_from=document.getElementById('date_from').value.trim();
                    var date_to=document.getElementById('date_to').value.trim();
                   var imagen= $('input[type=file]')[0].files[0];
                   var url   = form.attr('action');

                 //  var imagen = document.getElementById.files[0] || null

                    const body = new FormData();
                    body.append('title', title);
                    body.append('responsable', responsable);
                    body.append('description', description);
                    body.append('alcance', alcance);
                    body.append('area', area);
                    body.append('resena', resena);
                    body.append('publico', publico);
                    body.append('ponente', ponente);
                    body.append('date_from', date_from);
                    body.append('date_to', date_to);
                    body.append('imagen', imagen);
                    
                    
                    console.log(imagen,body)


                    $.ajax({
                        url: url,
                        data: body,
                        type: "POST",
                        contentType: false,
                        processData:false,
                        headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data){
                          var data = JSON.parse(data)
                          // console.log('Del server:', data)
                          /*
                          if(data.success){
                            window.location='/articulos?created=true'
                          } else {
                            alert("Por favor complete los datos obligatorios.");
                            document.getElementById('send_form').disabled = false
                          }*/
                         

                          if(data.success){
                            $('#form-create')[0].reset();
                            $.notify({
                                icon: 'ni ni-bell-55',
                                title: "<strong>"+ "Satisfactoriamente" + "</strong> <br>",
                                message: "creado correctamente"
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


                        },
                        error: function() {
                          alert("No se ha podido obtener la información");
                        }
                      });


                 /*
                    var url   = form.attr('action');
                    var dataForm  = form.serialize();
                 
                    $.post(url, dataForm, function(response){

                        console.log(response)

                        if(response === 'success'){
                            $('#form-create')[0].reset();
                            $.notify({
                                icon: 'ni ni-bell-55',
                                title: "<strong>"+ data.msg_info + "</strong> <br>",
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
                        $('.btn-cancel').trigger("click");

                        var errors = '';
                        $.each(jqXHR.responseJSON.errors, function(key,value) {
                            errors += '* ' + value + '</br>';
                        });

                        $.notify({
                            icon: 'ni ni-fat-remove',
                            title: "<strong>"+ data.msg_info +"</strong> <br>",
                            message: errors
                            },
                            {
                                type: "danger",
                                    placement: {
                                    from: "top",
                                    align: "center"
                                },
                            }
                        );
                    });
                    */
                });
            });
        })(jQuery);