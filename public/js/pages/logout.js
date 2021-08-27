(function($) {
                "use strict";
                $("#logout-btn").on('click', function(e){
                    e.preventDefault();
                    $("#logout-form").trigger('submit');
                });
            })(jQuery);