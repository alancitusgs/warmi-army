(function($) {
            "use strict";
            $.getJSON("/lang/json", function(data) {
                $('.btn-upload-avatar').on('click', function() {
                    $.confirm({
                        type: 'dark',
                        icon: 'far fa-image',
                        keyboardEnabled: true,
                        title: data.change_avatar,
                        content: "url:/profile/upload-avatar",
                        confirmButtonClass: 'btn-info',
                        buttons: {
                            confirm: {
                                text: "<i class='far fa-save'></i> " + data.save,
                                btnClass: 'btn-primary',
                                action: function(){
                                    var pic = this.$content.find('#avatar');
                                    if (pic.get(0).files.length === 0)
                                    {
                                        $.alert({
                                            type: 'red',
                                            title: '<i class="fas fa-info-circle"></i> Error',
                                            content: data.choose_file,
                                        });
                                    }
                                    else {
                                        $("#form-edit-avatar").trigger('submit');
                                    }
                                }
                            },
                            cancelar: {
                                text: data.cancel,
                                action: function () {}
                            }
                        }
                    });
                });

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
                        }
                    }).fail(function(jqXHR, textStatus, errorThrown){
                        var errors = '';
                        $.each(jqXHR.responseJSON.errors, function(key,value) {
                            errors += '* ' + value + '</br>';
                        });

                        $.notify({
                            icon: 'ni ni-fat-remove',
                            title: "<strong>" + data.msg_error + "</strong> <br>",
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
