(function($) {
            "use strict";
            $(document).ready(function() {
                $.getJSON("/lang/json", function(data) {
                    $('#datatable-basic').DataTable({
                      "language": {
                        "url": data.base_url + "/vendor/datatables.net/locale/" + data.lang + ".json",
                      }
                    });
                });
            });
        })(jQuery);