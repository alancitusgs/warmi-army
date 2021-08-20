@extends('layouts/fullLayoutMaster')

@section('title', 'Login Page')


@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/page-auth.css')) }}">
@endsection

@section('content')


<div class="auth-wrapper auth-v2">
  <div class="auth-inner row m-0">
      <!-- Brand logo-->
      <a class="brand-logo" href="javascript:void(0);">
        <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="28"><defs><lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%"><stop stop-color="#000000" offset="0%"></stop><stop stop-color="#FFFFFF" offset="100%"></stop></lineargradient><lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%"><stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop><stop stop-color="#FFFFFF" offset="100%"></stop></lineargradient></defs><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="Artboard" transform="translate(-400.000000, -178.000000)"><g id="Group" transform="translate(400.000000, 178.000000)"><path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill: currentColor"></path><path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path><polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon><polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon><polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon></g></g></g></svg>
        <h2 class="brand-text text-primary ml-1">Warmi Army</h2>
      </a>
      <!-- /Brand logo-->
      <!-- Left Text-->
      <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
        <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
      
          <img class="img-fluid" src="{{asset('images/pages/login-v2.svg')}}" alt="Login V2" />
        
        </div>
      </div>
      <!-- /Left Text-->
      <!-- Login-->
      <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
        <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
          <h2 class="card-title font-weight-bold mb-1">Bienvenido a Warmi Army! &#x1F44B;</h2>
          <p class="card-text mb-2">Inicie sesión en su cuenta y comience la aventura emprendedora</p>
          <form method="POST" action="{{ route('login') }}">
                        @csrf

            <div class="form-group">
              <label class="form-label" for="login-email">{{ __('E-Mail Address') }}</label>
              <input class="form-control" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" 
               placeholder="john@example.com" aria-describedby="login-email" required autocomplete="email" autofocus tabindex="1"/>
               @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>


       

 


            <div class="form-group">
              <div class="d-flex justify-content-between">
                <label for="login-password">{{ __('Password') }}</label>
                <a href="{{url("auth/forgot-password-v2")}}">
                  <small>Forgot Password?</small>
                </a>
              </div>
              <div class="input-group input-group-merge form-password-toggle">
              <input id="password" type="password" class="form-control form-control-merge @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                <div class="input-group-append">
                  <span class="input-group-text cursor-pointer">
                    <i data-feather="eye"></i>
                  </span>
                </div>
                
    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
              </div>
            </div>


            

<div class="col-md-6">



            <div class="form-group">
              <div div class="custom-control custom-checkbox">
                <input class="custom-control-input" id="remember-me" type="checkbox" tabindex="3" />
                <label class="custom-control-label" for="remember-me">Permanezca conectado</label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block" tabindex="4">Iniciar sesión</button>
          </form>
          <p class="text-center mt-2">
            <span>Nuevo en la plataforma?</span>
            <a href="{{url('/register')}}"><span>&nbsp;Crear una cuenta</span></a>
          </p>

          <div class="auth-footer-btn d-flex justify-content-center">
         
          </div>
      </div>
    </div>
    <!-- /Login-->
  </div>
</div>
@endsection













