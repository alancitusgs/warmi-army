@extends('layouts/contentLayoutMaster')

@section('title', 'Empresarial')

@section('content')
<!-- Examples -->
<section id="card-demo-example">
  <div class="row match-height">
    <div class="col-md-6 col-lg-4">
      <div class="card">
        <img class="card-img-top" src="{{asset('images/slider/04.jpg')}}" alt="Card image cap" />
        <div class="card-body">
          <h4 class="card-title">Empresarial 1</h4>
          <p class="card-text">
            texto texto 1....
          </p>
          <a href="javascript:void(0)" class="btn btn-outline-primary">Unirse</a>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-4">
      <div class="card">
        <img class="card-img-top" src="{{asset('images/slider/04.jpg')}}" alt="Card image cap" />
        <div class="card-body">
          <h4 class="card-title">Empresarial 2</h4>
          <p class="card-text">
           txtxtx txtxtx ...
          </p>
          <a href="javascript:void(0)" class="btn btn-outline-primary">Unirse</a>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-4">
      <div class="card">
        <img class="card-img-top" src="{{asset('images/slider/04.jpg')}}" alt="Card image cap" />
        <div class="card-body">
          <h4 class="card-title">Empresarial 3</h4>
          <p class="card-text">
           Empresarial de prueba
          </p>
          <a href="javascript:void(0)" class="btn btn-outline-primary">Unirse</a>
        </div>
      </div>
    </div>
  
  </div>
</section>
<!-- Examples -->


@endsection
