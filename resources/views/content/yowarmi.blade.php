@extends('layouts/contentLayoutMaster')

@section('title', 'Yo Warmi')

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/page-knowledge-base.css')) }}">
@endsection

@section('content')
<!-- Knowledge base Jumbotron -->
<section id="knowledge-base-search">
  <div class="row">
    <div class="col-12">
      <div
        class="card knowledge-base-bg text-center"
        style="background-image: url('{{asset('images/banner/banner.png')}}')"
      >
        <div class="card-body">
          <h2 class="text-primary">Círculo Yo Warmi</h2>
          <p class="card-text mb-2">
            <span class="font-weight-bolder">Plataforma de Podcast generador de contenido de interés en diferentes temáticas relacionadas con el empoderamiento femenino 
</span>
          </p>
          <form class="kb-search-input">
            <div class="input-group input-group-merge">
              <div class="input-group-prepend">
                <span class="input-group-text"><i data-feather="search"></i></span>
              </div>
              <input type="text" class="form-control" id="searchbar" placeholder="Buscar podcast..." />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ Knowledge base Jumbotron -->

<!-- Knowledge base -->
<section id="knowledge-base-content">
  <div class="row kb-search-content-info match-height">
    <!-- sales card -->
    <div class="col-md-4 col-sm-6 col-12 kb-search-content">
      <div class="card">
        <a href="{{asset('page/knowledge-base/category')}}">
          <img
            src="{{asset('images/illustration/sales.svg')}}"
            class="card-img-top"
            alt="knowledge-base-image"
          />

          <div class="card-body text-center">
            <h4>Artes y academia</h4>
            <p class="text-body mt-1 mb-0">
            Creado para mujeres que quieren transmitir conocimiento en cualquier campo de expresión artística y científica .
            </p>
          </div>
        </a>
      </div>
    </div>

 
    <!-- api -->
    <div class="col-md-4 col-sm-6 col-12 kb-search-content">
      <div class="card">
        <a href="{{asset('page/knowledge-base/category')}}">
          <img src="{{asset('images/illustration/api.svg')}}" class="card-img-top" alt="knowledge-base-image" />
          <div class="card-body text-center">
            <h4>Warmi Educadora</h4>
            <p class="text-body mt-1 mb-0">Sección de podcast, dirigido a educar, orientar y capacitar en todos los sectores de la educación a través de profesionales en diversos campos.</p>
          </div>
        </a>
      </div>
    </div>

    <!-- personalization -->
    <div class="col-md-4 col-sm-6 col-12 kb-search-content">
      <div class="card">
        <a href="{{asset('page/knowledge-base/category')}}">
          <img
            src="{{asset('images/illustration/personalization.svg')}}"
            class="card-img-top"
            alt="knowledge-base-image"
          />
          <div class="card-body text-center">
            <h4>Warmi Emprende</h4>
            <p class="text-body mt-1 mb-0">Creado para la mujer emprendedora e independiente que quiere dar a conocer sus emprendimientos.</p>
          </div>
        </a>
      </div>
    </div>

    <!-- email -->
    <div class="col-md-4 col-sm-6 col-12 kb-search-content">
      <div class="card">
        <a href="{{asset('page/knowledge-base/category')}}">
          <img
            src="{{asset('images/illustration/email.svg')}}"
            class="card-img-top"
            alt="knowledge-base-image"
          />
          <div class="card-body text-center">
            <h4>Warmi Inspiración</h4>
            <p class="text-body mt-1 mb-0">Creado para mujeres que quieren inspirar a otras a través de su experiencia de lucha y perseverancia.</p>
          </div>
        </a>
      </div>
    </div>

    <!-- demand -->
    <div class="col-md-4 col-sm-6 col-12 kb-search-content">
      <div class="card">
        <a href="{{asset('page/knowledge-base/category')}}">
          <img
            src="{{asset('images/illustration/demand.svg')}}"
            class="card-img-top"
            alt="knowledge-base-image"
          />
          <div class="card-body text-center">
            <h4>Orientación Legal </h4>
            <p class="text-body mt-1 mb-0">Podcast  de orientación legal y de esa manera brindar apoyo a través de especialistas y organizaciones dedicadas a combatir la violencia de género y promover  equidad. </p>
          </div>
        </a>
      </div>
    </div>


    <div class="col-md-4 col-sm-6 col-12 kb-search-content">
      <div class="card">
        <a href="{{asset('page/knowledge-base/category')}}">
          <img
            src="{{asset('images/illustration/demand.svg')}}"
            class="card-img-top"
            alt="knowledge-base-image"
          />
          <div class="card-body text-center">
            <h4>Warmi Activar</h4>
            <p class="text-body mt-1 mb-0"> Podcast dirigido a la mujer deportista que rompe paradigmas y busca trascender en cualquier disciplina deportiva. </p>
          </div>
        </a>
      </div>
    </div>


    <div class="col-md-4 col-sm-6 col-12 kb-search-content">
      <div class="card">
        <a href="{{asset('page/knowledge-base/category')}}">
          <img
            src="{{asset('images/illustration/demand.svg')}}"
            class="card-img-top"
            alt="knowledge-base-image"
          />
          <div class="card-body text-center">
            <h4>Nutrición vida sana </h4>
            <p class="text-body mt-1 mb-0">Podcast donde se abordará los principales temas de alimentación y cuidado de la salud para una vida saludable y plena. </p>
          </div>
        </a>
      </div>
    </div>

    <div class="col-md-4 col-sm-6 col-12 kb-search-content">
      <div class="card">
        <a href="{{asset('page/knowledge-base/category')}}">
          <img
            src="{{asset('images/illustration/demand.svg')}}"
            class="card-img-top"
            alt="knowledge-base-image"
          />
          <div class="card-body text-center">
            <h4>Warmi Viajera </h4>
            <p class="text-body mt-1 mb-0">Creado para mujeres con espíritu de aventura que se atreven a viajar solas o en compañía, recibirás los mejores tips y consejos de viaje. </p>
          </div>
        </a>
      </div>
    </div>

    <div class="col-md-4 col-sm-6 col-12 kb-search-content">
      <div class="card">
        <a href="{{asset('page/knowledge-base/category')}}">
          <img
            src="{{asset('images/illustration/demand.svg')}}"
            class="card-img-top"
            alt="knowledge-base-image"
          />
          <div class="card-body text-center">
            <h4>Warmi Tech</h4>
            <p class="text-body mt-1 mb-0">Creado para mujeres que están imbuidas en tecnología en cualquier campo.  Conocerás los emprendimientos más innovadores del momento y también a líderes  tech  que te inspirarán. </p>
          </div>
        </a>
      </div>
    </div>

    <!-- no result -->
    <div class="col-12 text-center no-result no-items">
      <h4 class="mt-4">Search result not found!!</h4>
    </div>
  </div>
</section>
<!-- Knowledge base ends -->
@endsection

@section('page-script')
  {{-- Page js files --}}
  <script src="{{ asset(mix('js/scripts/pages/page-knowledge-base.js')) }}"></script>
@endsection
