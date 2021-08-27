(function($) {
        		"use strict";
        		$.getJSON("lang/json", function(data) {
        			$('.btn-yes').on('click', function() {
			            var form  = $('#form-delete');
			            var id    = $('#delete-buttom').data('data-delete-id');
			            var url   = form.attr('action').replace(':id', id);
			            var dataForm  = form.serialize();
			            $.post(url, dataForm, function(response){
			              if(response === 'success'){
			                $('.btn-cancel').trigger('click');
			                $('#modal-form').removeClass('show').removeAttr('aria-modal').attr('aria-hidden', 'true').hide();
			                $.notify({
			                    icon: 'ni ni-bell-55',
			                    title: "<strong>" + data.msg_info + "</strong> <br>",
			                    message: data.msg_danger
			                  },
			                  {
			                    z_index: 1300,
			                    type: "success",
			                    placement: {
			                      from: "top",
			                      align: "center"
			                    },
			                  }
			                );
			              }
			            }).fail(function(){
			              $('.btn-cancel').trigger('click');
			              $.notify({
			                    icon: 'ni ni-fat-remove',
			                    title: "<strong>" + data.msg_info + "</strong> <br>",
			                    message: data.msg_error
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
			          });
        		});
        	})(jQuery);