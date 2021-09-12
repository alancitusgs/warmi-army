@extends('layouts/contentLayoutMaster')

@section('title', 'Empresarial')

@section('content')
<!-- Examples -->
<section id="card-demo-example">
  <div class="row match-height">

@foreach ($projects as $project)

<div class="col-md-6 col-lg-4">
      <div class="card">
        <img class="card-img-top" src="/storage/{{ $project->project_image }}" alt="Card image cap" />

               <div class="card-body">
          <h4 class="card-title">{{ $project->project_name}}</h4>
              <a href="javascript:void(0)" class="btn btn-outline-primary" data-toggle="modal" data-target="#modals-slide-in">Ver más</a>

         
        </div>
      </div>
    </div>



@endforeach






    </div>
  
  </div>


  <!-- Modal to add new user starts-->
  <div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
      <div class="modal-dialog">
        <form class="add-new-user modal-content pt-0">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
          <div class="modal-header mb-1">
            <h5 class="modal-title" id="exampleModalLabel">{{ $project->project_name}}</h5>
          </div>
          <div class="modal-body flex-grow-1">
            <div class="form-group">
           

          

            <h5>Descripción</h5>
        <small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
       labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</small>
       </p>
       <p class="card-text">
      <h5>Metas</h5>
      <small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
       labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</small>
       </p>
       <p class="card-text">
      <h5>Círculo de integración</h5>
      <small class="text-muted"> Capacitación</small>
       </p>
       <p class="card-text">
      <h5>Integrantes</h5>
      <small class="text-muted">3</small>
       </p>

    
            <button type="submit" class="btn btn-primary mr-1 data-submit">Unirme</button>
                    </div>
        </form>


        </div>
      </div>
    </div>
    <!-- Modal to add new user Ends-->




</section>
<!-- Examples -->


@endsection
