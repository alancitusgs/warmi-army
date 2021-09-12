@extends('layouts/contentLayoutMaster')

@section('title', 'Podcasts')

@section('vendor-style')
<link rel="stylesheet" href="{{asset(mix('vendors/css/charts/apexcharts.css'))}}">
@endsection
@section('page-style')
<link rel="stylesheet" href="{{asset(mix('css/base/pages/app-chat-list.css'))}}">
@endsection

@section('content')
<!-- Card Advance -->
<div class="row match-height">
  <!-- Congratulations Card -->
  <div class="col-12 col-md-6 col-lg-7">
    <div class="card card-congratulations">
      <div class="card-body text-center">
        <img
          src="{{asset('images/elements/decore-left.png')}}"
          class="congratulations-img-left"
          alt="card-img-left"
        />
        <img
          src="{{asset('images/elements/decore-right.png')}}"
          class="congratulations-img-right"
          alt="card-img-right"
        />
        <div class="avatar avatar-xl bg-primary shadow">
          <div class="avatar-content">
            <i data-feather="award" class="font-large-1"></i>
          </div>
        </div>
        <div class="text-center">
          <h1 class="mb-1 text-white">Arte y academia</h1>
          <p class="card-text m-auto w-75">
           Un espacio de podcast de mucho interes.
          </p>
        </div>
      </div>
    </div>
  </div>
  <!--/ Congratulations Card -->

  <!-- Medal Card -->
  <div class="col-12 col-md-6 col-lg-5" style="display: none;">
    <div class="card card-congratulation-medal">
      <div class="card-body">
        <h5>Congratulations 🎉 John!</h5>
        <p class="card-text font-small-3">You have won gold medal</p>
        <h3 class="mb-75 mt-4">
          <a href="javascript:void(0);">$48.9k</a>
        </h3>
        <button type="button" class="btn btn-primary">View Sales</button>
        <img src="{{asset('images/illustration/badge.svg')}}" class="congratulation-medal" alt="Medal Pic" />
      </div>
    </div>
  </div>
  <!--/ Medal Card -->
</div>
<div class="row match-height">
  <!-- Employee Task Card -->
  <div class="col-lg-4 col-md-6 col-12">
    <div class="card card-employee-task">
      <div class="card-header">
        <h4 class="card-title">Podcaster</h4>
        <i data-feather="more-vertical" class="font-medium-3 cursor-pointer"></i>
      </div>
      <div class="card-body">
        <div class="employee-task d-flex justify-content-between align-items-center">
          <div class="media">
            <div class="avatar mr-75">
              <img
                src="{{asset('images/portrait/small/avatar-s-9.jpg')}}"
                class="rounded"
                width="42"
                height="42"
                alt="Avatar"
              />
            </div>
            <div class="media-body my-auto">
              <h6 class="mb-0">Luis Rojas</h6>
              <small>Artista</small>
            </div>
          </div>
          <div class="d-flex align-items-center">
            <small class="text-muted mr-75">9hr 20m</small>
            <div class="employee-task-chart-primary-1"></div>
          </div>
        </div>
        <div class="employee-task d-flex justify-content-between align-items-center">
          <div class="media">
            <div class="avatar mr-75">
              <img
                src="{{asset('images/portrait/small/avatar-s-20.jpg')}}"
                class="rounded"
                width="42"
                height="42"
                alt="Avatar"
              />
            </div>
            <div class="media-body my-auto">
              <h6 class="mb-0">Luisa López</h6>
              <small>UI Designer</small>
            </div>
          </div>
          <div class="d-flex align-items-center">
            <small class="text-muted mr-75">4hr 17m</small>
            <div class="employee-task-chart-danger"></div>
          </div>
        </div>
        <div class="employee-task d-flex justify-content-between align-items-center">
          <div class="media">
            <div class="avatar mr-75">
              <img
                src="{{asset('images/portrait/small/avatar-s-1.jpg')}}"
                class="rounded"
                width="42"
                height="42"
                alt="Avatar"
              />
            </div>
            <div class="media-body my-auto">
              <h6 class="mb-0">Jorge Ruiz</h6>
              <small>Gerente de universidad</small>
            </div>
          </div>
          <div class="d-flex align-items-center">
            <small class="text-muted mr-75">12hr 8m</small>
            <div class="employee-task-chart-success"></div>
          </div>
        </div>
        <div class="employee-task d-flex justify-content-between align-items-center">
          <div class="media">
            <div class="avatar mr-75">
              <img
                src="{{asset('images/portrait/small/avatar-s-20.jpg')}}"
                class="rounded"
                width="42"
                height="42"
                alt="Avatar"
              />
            </div>
            <div class="media-body my-auto">
              <h6 class="mb-0">Cynthia Howell</h6>
              <small>Artista</small>
            </div>
          </div>
          <div class="d-flex align-items-center">
            <small class="text-muted mr-75">3hr 19m</small>
            <div class="employee-task-chart-secondary"></div>
          </div>
        </div>
        <div class="employee-task d-flex justify-content-between align-items-center">
          <div class="media">
            <div class="avatar mr-75">
              <img
                src="{{asset('images/portrait/small/avatar-s-16.jpg')}}"
                class="rounded"
                width="42"
                height="42"
                alt="Avatar"
              />
            </div>
            <div class="media-body my-auto">
              <h6 class="mb-0">Helena Robles</h6>
              <small>Publicista Telefonica</small>
            </div>
          </div>
          <div class="d-flex align-items-center">
            <small class="text-muted mr-75">9hr 50m</small>
            <div class="employee-task-chart-warning"></div>
          </div>
        </div>
        <div class="employee-task d-flex justify-content-between align-items-center">
          <div class="media">
            <div class="avatar mr-75">
              <img
                src="{{asset('images/portrait/small/avatar-s-13.jpg')}}"
                class="rounded"
                width="42"
                height="42"
                alt="Avatar"
              />
            </div>
            <div class="media-body my-auto">
              <h6 class="mb-0">Javier Ganosa</h6>
              <small>Academias Pamer</small>
            </div>
          </div>
          <div class="d-flex align-items-center">
            <small class="text-muted mr-75">4hr 48m</small>
            <div class="employee-task-chart-primary-2"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Employee Task Card -->

  <!-- Developer Meetup Card -->
  <div class="col-lg-4 col-md-6 col-12">
    <div class="card card-developer-meetup">
      <div class="meetup-img-wrapper rounded-top text-center">
        <img src="{{asset('images/illustration/email.svg')}}" alt="Meeting Pic" height="170" />
      </div>
      <div class="card-body">
        <div class="meetup-header d-flex align-items-center">
          <div class="meetup-day">
            <h6 class="mb-0">LUN</h6>
            <h3 class="mb-0">27</h3>
          </div>
          <div class="my-auto">
            <h4 class="card-title mb-25">Como crear una feria apoyARTE</h4>
            <p class="card-text mb-0">Aprende a emprender y apoya a los artistas</p>
          </div>
        </div>
        <div class="media">
          <div class="avatar bg-light-primary rounded mr-1">
            <div class="avatar-content">
              <i data-feather="calendar" class="avatar-icon font-medium-3"></i>
            </div>
          </div>
          <div class="media-body">
            <h6 class="mb-0">Lun, Set 27, 2021</h6>
            <small> 4:00pM to 6:00PM</small>
          </div>
        </div>
        <div class="media">
          <div class="avatar bg-light-primary rounded mr-1">
            <div class="avatar-content">
              <i data-feather="map-pin" class="avatar-icon font-medium-3"></i>
            </div>
          </div>
          <div class="media-body">
            <h6 class="mb-0">Podcast en vivo</h6>
            <small>Transmisión desde Lima, Perú</small>
          </div>
        </div>
        <div class="avatar-group">
          <div
            data-toggle="tooltip"
            data-popup="tooltip-custom"
            data-placement="bottom"
            data-original-title="Billy Hopkins"
            class="avatar pull-up"
          >
            <img src="{{asset('images/portrait/small/avatar-s-9.jpg')}}" alt="Avatar" width="33" height="33" />
          </div>
          <div
            data-toggle="tooltip"
            data-popup="tooltip-custom"
            data-placement="bottom"
            data-original-title="Amy Carson"
            class="avatar pull-up"
          >
            <img src="{{asset('images/portrait/small/avatar-s-6.jpg')}}" alt="Avatar" width="33" height="33" />
          </div>
          <div
            data-toggle="tooltip"
            data-popup="tooltip-custom"
            data-placement="bottom"
            data-original-title="Brandon Miles"
            class="avatar pull-up"
          >
            <img src="{{asset('images/portrait/small/avatar-s-8.jpg')}}" alt="Avatar" width="33" height="33" />
          </div>
          <div
            data-toggle="tooltip"
            data-popup="tooltip-custom"
            data-placement="bottom"
            data-original-title="Daisy Weber"
            class="avatar pull-up"
          >
            <img src="{{asset('images/portrait/small/avatar-s-20.jpg')}}" alt="Avatar" width="33" height="33" />
          </div>
          <div
            data-toggle="tooltip"
            data-popup="tooltip-custom"
            data-placement="bottom"
            data-original-title="Jenny Looper"
            class="avatar pull-up"
          >
            <img src="{{asset('images/portrait/small/avatar-s-20.jpg')}}" alt="Avatar" width="33" height="33" />
          </div>
          <h6 class="align-self-center cursor-pointer ml-50 mb-0">+42</h6>
        </div>
      </div>
    </div>
  </div>
  <!--/ Developer Meetup Card -->


  <!-- Profile Card -->
  <div class="col-lg-4 col-md-6 col-12">
    <div class="card card-profile">
      <img
        src="{{asset('images/banner/banner-12.jpg')}}"
        class="img-fluid card-img-top"
        alt="Profile Cover Photo"
      />
      <div class="card-body">
        <div class="profile-image-wrapper">
          <div class="profile-image">
            <div class="avatar">
            <a href="{{asset('podcast')}}">
              <img src="{{asset('images/portrait/small/avatar-s-9.jpg')}}" alt="Profile Picture" />
            </a>
            </div>
          </div>
        </div>
        <h3>Luis Rojas</h3>
        <h6 class="text-muted">Lima</h6>
        <div class="badge badge-light-primary profile-badge">Gold</div>
        <hr class="mb-2" />
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h6 class="text-muted font-weight-bolder">Seguidores</h6>
            <h3 class="mb-0">10.3k</h3>
          </div>
          <div>
            <h6 class="text-muted font-weight-bolder">Podcasts</h6>
            <h3 class="mb-0">156</h3>
          </div>
          <div>
            <h6 class="text-muted font-weight-bolder">Ranking</h6>
            <h3 class="mb-0">1</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Profile Card -->
  

  <!-- Profile Card -->
  <div class="col-lg-4 col-md-6 col-12">
    <div class="card card-profile">
      <img
        src="{{asset('images/banner/banner-12.jpg')}}"
        class="img-fluid card-img-top"
        alt="Profile Cover Photo"
      />
      <div class="card-body">
        <div class="profile-image-wrapper">
          <div class="profile-image">
            <div class="avatar">
              <img src="{{asset('images/portrait/small/avatar-s-9.jpg')}}" alt="Profile Picture" />
            </div>
          </div>
        </div>
        <h3>Jorge Ruiz</h3>
        <h6 class="text-muted">Cusco</h6>
        <div class="badge badge-light-primary profile-badge">Silver</div>
        <hr class="mb-2" />
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h6 class="text-muted font-weight-bolder">Seguidores</h6>
            <h3 class="mb-0">2.3k</h3>
          </div>
          <div>
            <h6 class="text-muted font-weight-bolder">Podcasts</h6>
            <h3 class="mb-0">100</h3>
          </div>
          <div>
            <h6 class="text-muted font-weight-bolder">Ranking</h6>
            <h3 class="mb-0">3</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Profile Card -->


</div>
<!--/ Card Advance -->
@endsection

@section('vendor-script')
<script src="{{asset(mix('vendors/js/charts/apexcharts.min.js'))}}"></script>
@endsection
@section('page-script')
  {{-- Page js files --}}
  <script src="{{ asset(mix('js/scripts/cards/card-advance.js')) }}"></script>
@endsection
