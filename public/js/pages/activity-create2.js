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
                    var url   = form.attr('action');
                    var dataForm  = form.serialize();
                    $.post(url, dataForm, function(response){
                        console.log(response)
                       // alert('llego');
                   /*     if(response === 'success'){
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
                        }*/

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
                });
            });
        })(jQuery);