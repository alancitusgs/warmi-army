/*=========================================================================================
	File Name: article-create.js
	Description: field select2 and quill editor JS
	----------------------------------------------------------------------------------------
==========================================================================================*/
(function (window, document, $) {
    'use strict';
  
    var select = $('.select2');
    var editor = '#blog-editor-container .editor';
    var blogFeatureImage = $('#blog-feature-image');
    var blogImageInput = $('#blogCustomFile');
  
    // Basic Select2 select
    select.each(function () {
      var $this = $(this);
      $this.wrap('<div class="position-relative"></div>');
      $this.select2({
        // the following code is used to disable x-scrollbar when click in select input and
        // take 100% width in responsive also
        dropdownAutoWidth: true,
        width: '100%',
        dropdownParent: $this.parent()
      });
    });
  
    // Snow Editor
  
    var Font = Quill.import('formats/font');
    Font.whitelist = ['sofia', 'slabo', 'roboto', 'inconsolata', 'ubuntu'];
    Quill.register(Font, true);
  
    var blogEditor = new Quill(editor, {
      bounds: editor,
      modules: {
        formula: true,
        syntax: true,
        toolbar: [
          [
            {
              font: []
            },
            {
              size: []
            }
          ],
          ['bold', 'italic', 'underline', 'strike'],
          [
            {
              color: []
            },
            {
              background: []
            }
          ],
          [
            {
              script: 'super'
            },
            {
              script: 'sub'
            }
          ],
          [
            {
              header: '1'
            },
            {
              header: '2'
            },
            'blockquote',
            'code-block'
          ],
          [
            {
              list: 'ordered'
            },
            {
              list: 'bullet'
            },
            {
              indent: '-1'
            },
            {
              indent: '+1'
            }
          ],
          [
            'direction',
            {
              align: []
            }
          ],
          ['link', 'image', 'video', 'formula'],
          ['clean']
        ]
      },
      theme: 'snow'
    });

    blogEditor.getModule("toolbar").addHandler("image", selectLocalImage );

    function saveToServer (file) {
        const body = new FormData();
        body.append('file', file);

        $.ajax({
          url: '/posts/image',
          data: body,
          type: "POST",
          contentType: false,
          processData:false,
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(data){
            var data = JSON.parse(data)
            // console.log('Del server:', data)
            if(data.success){
              const range = blogEditor.getSelection();
              blogEditor.insertEmbed(range.index, 'image', data.url);
            } else {
              alert("Por favor intente subir otra imagen.");
            }
          },
          error: function() {
            alert("No se ha podido obtener la información");
          }
        });        
    };
    
    function selectLocalImage() {
      const input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');
        input.click();

        input.onchange = () => {
            const file = input.files[0];
            saveToServer(file);
        };
    }

    // Change featured image
    if (blogImageInput.length) {
      $(blogImageInput).on('change', function (e) {
        var reader = new FileReader(),
          files = e.target.files;
        reader.onload = function () {
          if (blogFeatureImage.length) {
            blogFeatureImage.attr('src', reader.result);
          }
        };
        reader.readAsDataURL(files[0]);
      });
    }

    $('#send_form').click(function(e){
      e.preventDefault();

      const title = document.getElementById('title').value.trim()
      const text = blogEditor.container.firstChild.innerHTML
      const category = document.getElementById('category').value.trim()
      const visibility = document.getElementById('visibility').value.trim()
      const url = document.getElementById('url').value.trim()
      const image = blogCustomFile.files[0] || null
      const UN_MB = 1048576

      const body = new FormData();
      body.append('title', title);
      body.append('category', category);
      body.append('visibility', visibility);
      body.append('url', url);
      body.append('text', text);
      body.append('file', image);

      if(title === '') return alert('Debe ingresar un título de video')
      if(url == '' || !url.includes('http')) return alert('Debe ingresar un enlace de video de Youtube válido')
      if(image && image.size >  UN_MB) return alert('Por favor, seleccione una imagen con peso menor a 1 MB.')

      // var ajaxurl = '{{route('myitems', ':id')}}';
      // ajaxurl = ajaxurl.replace(':id', id);
      document.getElementById('send_form').disabled = true
      $.ajax({
        url: '/videos',
        data: body,
        type: "POST",
        contentType: false,
        processData:false,
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data){
          console.log(data)
          if(data.success){
            window.location='/videos?created=true'
          } else {
            alert("Por favor complete los datos obligatorios.");
            document.getElementById('send_form').disabled = false
          }
        },
        error: function(data) {
          alert(data.responseJSON.message);
          document.getElementById('send_form').disabled = false
        }
      });
      return false;
    });




  })(window, document, jQuery);