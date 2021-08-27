(function($) {
            "use strict";
            $.getJSON("/lang/json", function(data) {
                $('.btn-edit').on('click', function(e) {
                    e.preventDefault();
                    var form  = $('#form-edit');
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
                            setTimeout(function(){
                                window.location = url;
                            }, 500);
                        }
                    }).fail(function(){
                        $.notify({
                            icon: 'ni ni-fat-remove',
                            title: "<strong>"+ data.msg_error +"</strong> <br>",
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