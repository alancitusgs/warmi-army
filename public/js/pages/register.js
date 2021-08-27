(function($) {
            "use strict";
            $.getJSON("/auth/json", function(data) {
                var pass = document.getElementById('password');
                pass.addEventListener('keyup', function(){
                  checkpassword(pass.value)
                })

                function checkpassword(password){
                  var strong = 0;
                  if(password.match(/[a-zA-Z0-9][a-zA-Z0-9]+/)){
                    strong += 1;
                  }
                  if(password.length >=6){
                    strong += 1;
                  }
                  if(password.match(/[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/)){
                    strong += 1;
                  }

                  switch(strong) {
                    case 1:
                      $('#strength').html(data.weak);
                      $('#strength').removeClass('text-success').removeClass('text-warning').addClass('text-danger');
                    break;

                    case 2:
                    $('#strength').html(data.moderate);
                      $('#strength').removeClass('text-success').removeClass('text-danger').addClass('text-warning');
                    break;

                    case 3:
                    $('#strength').html(data.strong);
                      $('#strength').removeClass('text-danger').removeClass('text-warning').addClass('text-success');
                    break;
                  }
                }
            });
        })(jQuery);