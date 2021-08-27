(function($) {
            "use strict";
            $.getJSON("/lang/json", function(data) {
                $('.btn-delete').on('click', function() {
                    var row   = $(this).parents('tr');
                    var id    = row.attr('id');
                    $('#delete-buttom').data('data-delete-id', id);
                });

                $('.btn-yes').on('click', function() {
                    var form  = $('#form-delete');
                    var id    = $('#delete-buttom').data('data-delete-id');
                    var url   = form.attr('action').replace(':id', id);
                    var dataForm  = form.serialize();
                    $.post(url, dataForm, function(response){
                      if(response === 'success'){
                        $('tr#'+ id).fadeOut();
                        $('.btn-cancel').trigger("click");
                        $.notify({
                            icon: 'ni ni-bell-55',
                            title: "<strong>"+ data.msg_info +"</strong> <br>",
                            message: data.msg_danger
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
                    }).fail(function(){
                      $('.btn-cancel').trigger("click");
                      $.notify({
                            icon: 'ni ni-fat-remove',
                            title: "<strong>"+ data.msg_info +"</strong> <br>",
                            message: data.msg_constrain
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