(function($) {
            "use strict";
            $.getJSON("/lang/json", function(data) {
                $(document).ready(function() {
                    var date_from = $('#date_from').val();
                    var date_to = $('#date_to').val();
                    $('#datatable-basic').DataTable({
                      "language": {
                        "url": data.base_url + "/vendor/datatables.net/locale/" + data.lang + ".json",
                      },
                      order: [[0, 'asc']],
                      "columnDefs": [{targets:0, visible:false}],
                      rowGroup: {
                          dataSrc: 0
                      },
                      dom: 'lBfrtip',
                      buttons: [{
                           extend: 'collection',
                              text: '<i class="fas fa-download"></i> ' + data.export,
                              buttons: [
                                  'copy',
                                  {
                                      extend: 'excel',
                                      messageTop: data.agenda_summary_report_title + ": "+ date_from +' To: ' + date_to,
                                      exportOptions: {
                                          columns: ':visible'
                                      }
                                  },
                                  {
                                      extend: 'pdf',
                                      messageTop: data.agenda_summary_report_title + ": "+ date_from +' To: ' + date_to,
                                      messageBottom: null,
                                      exportOptions: {
                                          columns: ':visible'
                                      }
                                  },
                                  {
                                      extend: 'print',
                                      messageBottom: null
                                  },
                              ]
                          }
                      ],
                    });
                });
            });
        })(jQuery);