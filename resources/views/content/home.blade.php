@extends('layouts/contentLayoutMaster')

@section('title', 'Basic Card')

@section('content')
<!-- Examples -->
<section id="card-demo-example">
  <div class="row match-height">
    <div class="col-md-6 col-lg-4">
      <div class="card">
        <img class="card-img-top" src="{{asset('images/slider/04.jpg')}}" alt="Card image cap" />
        <div class="card-body">
          <h4 class="card-title">Card title1</h4>
          <p class="card-text">
            Some quick example text to build on the card title and make up the bulk of the card's content.
          </p>
          <a href="javascript:void(0)" class="btn btn-outline-primary">Go somewhere</a>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-4">
      <div class="card">
        <img class="card-img-top" src="{{asset('images/slider/04.jpg')}}" alt="Card image cap" />
        <div class="card-body">
          <h4 class="card-title">Card title1</h4>
          <p class="card-text">
            Some quick example text to build on the card title and make up the bulk of the card's content.
          </p>
          <a href="javascript:void(0)" class="btn btn-outline-primary">Go somewhere</a>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-4">
      <div class="card">
        <img class="card-img-top" src="{{asset('images/slider/04.jpg')}}" alt="Card image cap" />
        <div class="card-body">
          <h4 class="card-title">Card title1</h4>
          <p class="card-text">
            Some quick example text to build on the card title and make up the bulk of the card's content.
          </p>
          <a href="javascript:void(0)" class="btn btn-outline-primary">Go somewhere</a>
        </div>
      </div>
    </div>
  
  </div>
</section>
<!-- Examples -->


@endsection
