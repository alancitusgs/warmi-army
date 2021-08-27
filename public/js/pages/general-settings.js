(function($) {
            "use strict";
            $.getJSON("/lang/json", function(data) {
                $('.btn-save').on('click', function(e) {
                    e.preventDefault();
                    var form  = $('#settings-update');
                    var url   = form.attr('action');
                    var dataForm  = form.serialize();
                    $.post(url, dataForm, function(response){
                        if(response === 'success'){
                            $.notify({
                                icon: 'ni ni-bell-55',
                                title: "<strong>"+ data.msg_info +"</strong> <br>",
                                message: data.msg_data_warning
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
                        $.notify({
                            icon: 'ni ni-fat-remove',
                            title: "<strong>"+ data.msg_info +"</strong> <br>",
                            message: jqXHR.responseJSON.errors.name[0]
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