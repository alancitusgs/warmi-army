(function($) {
            "use strict";
            $.getJSON("/lang/json", function(data) {
                $('.btn-create').on('click', function(e) {
                    e.preventDefault();
                    var form  = $('#form-create');
                    var url   = form.attr('action');
                    var dataForm  = form.serialize();
                    $.post(url, dataForm, function(response){
                        if(response === 'success'){
                            $('#form-create')[0].reset();
                            $.notify({
                                icon: 'ni ni-bell-55',
                                title: "<strong>"+ data.msg_info +"</strong> <br>",
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