@extends('layouts/contentLayoutMaster')

@section('title', 'Crear círculo')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="alert alert-primary" role="alert">
  
    
@section('content')
<!-- Validation -->
<section class="bs-validation">
  <div class="row">
    <!-- Bootstrap Validation -->
    <div class="col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Registrar proyecto - {{ Auth::user()->id }}</h4>
        </div>
        <div class="card-body">
        <form method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data" novalidate>
                @csrf
            <div class="form-group">
              <label class="form-label" for="basic-addon-name">Título</label>

              <input
                type="text"
                id="name"
                name="name"
                class="form-control"
                placeholder="Name"
                aria-label="Name"
                aria-describedby="basic-addon-name"
                required
              />
              <div class="valid-feedback">Looks good!</div>
              <div class="invalid-feedback">Por favor ingrese un título.</div>
            </div>
          
            <div class="form-group">
              <label for="select-country1">Círculo de Integración2</label>
              <select class="form-control" id="select-country1" required>
                <option value="">Seleccione círculo</option>
                <option value="usa">Empresarial</option>
                <option value="uk">Warmi Productiva</option>
                <option value="france">Capacitación laboral</option>
              </select>
              <div class="valid-feedback">Looks good!</div>
              <div class="invalid-feedback">Por favor ingrese el círculo</div>
            </div>

            <div class="form-group">
              <label class="d-block" for="validationBioBootstrap">Descripción</label>
              <textarea
                class="form-control"
                id="description"
                name="description"
                rows="3"
                required
              ></textarea>
            

            <div class="form-group">
              <label class="d-block" for="validationBioBootstrap">Metas</label>
              <textarea
                class="form-control"
                id="goals"
                name="goals"
                rows="3"
                required
              ></textarea>
</div>

          <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">


            <div class="form-group">
              <label for="customFile1">Logo</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="image" name="image" required />
                <label class="custom-file-label" for="customFile1">Escoga un logo</label>
              </div>
            </div>
         
           
            </div>
            <div class="form-group">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="validationCheckBootstrap" required />
                <label class="custom-control-label" for="validationCheckBootstrap"
                  >Estoy de acuerdo con los términos y condiciones</label
                >
                <div class="invalid-feedback">Estoy de acuerdo con los términos y condiciones.</div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn-primary">Enviar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /Bootstrap Validation -->

  </div>
</section>
<!-- /Validation -->
@endsection
      </div>
    </div>
  </div>
</div>
@endsection
