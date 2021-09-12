
@extends('layouts/contentLayoutMaster')
@section('title', 'Proyectos')



@section('content')

<!-- Basic Tables -->
<div class="row" id="basic-table">
  <div class="col-12">
    <div class="card">
    <div class="card-header border-bottom p-1">
        <div class="head-label">
            <h6 class="mb-0">Todos mis círculos</h6>
        </div>
        <div class="dt-action-buttons text-right">
            <div class="dt-buttons flex-wrap d-inline-flex"> 
                
                <a href="/articulos/nuevo" class="btn create-new btn-primary" 
                    tabindex="0"  
                    type="button">
                    <span>
                        <i data-feather="plus"></i> Nuevo proyecto
                    </span>
                </a> 
                </div>
            </div>
    </div>
      


      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Proyecto</th>
              <th>Estado</th>
              <th>Integrantes</th>
              <th>Opciones</th>
              </tr>
          </thead>





          <tbody>
          @forelse ($projects as $project)
                    @php {{
                      switch($project->project_participants){
                        case 4 :
                          $alertColor = 'green';
                          break;

                        case 5:
                          $alertColor = 'red';
                          break;
                        
                        default:
                        $alertColor = 'blue';
                          break;
                      }
                    }} @endphp 

            <tr>
              <td>
                <a href="{{ $project->project_id}}" target="_blank" class="font-weight-bold">{{ $project->project_name}}</a>
              </td>
           
              <td>
              <span class="badge badge-pill badge-success mr-11">
              <i class="" style="background-color: {{ $alertColor }}"></i> {{ (($project->project_participants == 2) ? 'Completado': 'Por completar') }}
                      </span>
              </td>
            <td>
            <div id="users-{{ $project->project_shortName }}" class="avatar-group">
                        @foreach($usersProjects as $userProject)
                          @if ($userProject->project_id == $project->project_id)
                          <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="{{ $userProject->name . ' ' . $userProject->lastName }}">
                            
                            <img alt="Image placeholder" src="{{ $userProject->image == null ? '/storage/upload-profile/user-default.png' : '/storage/upload-profile/'.$userProject->image }}" class="rounded-circle">
                          </a>
                          @endif
                        
                        @endforeach
                   
                      </div>
            </td>

              <td>
                <div class="dropdown">
                  <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                    <i data-feather="more-vertical"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="/articulos/{{ $project->project_id }}/editar">
                      <i data-feather="edit-2" class="mr-50"></i>
                      <span>Editar</span>
                    </a>
                    <button class="dropdown-item" onclick="deleteproject({{ $project->project_id}})">
                      <i data-feather="trash" class="mr-50"></i>
                      <span>Eliminar</span>
                    </button>
                  </div>
                </div>
              </td>
            </tr>

            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- Basic Tables end -->

<!-- Toast de articulo guardado -->
<div
  class="toast toast-basic hide position-fixed bg-success text-white"
  role="alert"
  aria-live="assertive"
  aria-atomic="true"
  data-delay="5000"
  style="top: 1rem; right: 1rem"
>
  <div class="toast-header " >
    <strong class="mr-auto">Alerta USIL</strong>
    <button type="button" class="ml-1 close" data-dismiss="toast" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div id="message" class="toast-body">
  </div>
</div>
<!-- Basic toast ends -->


@endsection


@section('page-script')
<script src="{{ env('APP_ENV') === 'local' ? asset('js/scripts/components/components-bs-toast.js') : secure_asset('js/scripts/components/components-bs-toast.js') }}"></script>

<script>
    if(window.location.search === '?created=true'){
      document.getElementById('message').innerHTML = 'Artículo creado correctamente.'
      $('.toast').toast('show');
    }
    if(window.location.search === '?updated=true'){
      document.getElementById('message').innerHTML = 'Artículo actualizado correctamente.'
      $('.toast').toast('show');
    }
    if(window.location.search === '?deleted=true'){
      document.getElementById('message').innerHTML = 'Artículo eliminado correctamente.'
      $('.toast').toast('show');
    }

    function deleteproject(id){
      if(!confirm('¿Está seguro de  eliminar este artículo?')) return
      $.ajax({
        url: `/articulos/${id}`,
        type: "DELETE",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data){
          var data = JSON.parse(data)
          if(data.success){
            window.location='/articulos?deleted=true'
          } else {
            alert("Por favor vuelva a intentarlo.");
          }
        },
        error: function() {
          alert("No se ha podido enviar la información");
        }
      });
    }
</script>
@endsection
