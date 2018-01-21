<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ isset($seo['titulo']) ? $seo['titulo'] : 'Cobata' }}</title>
    <meta name="description" content="{{ isset($seo['descricao']) ? $seo['descricao'] : 'Site Cobata' }}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" value="summary">

    <!-- Open Graph data -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta property="og:title" content="{{ isset($seo['titulo']) ? $seo['titulo'] : 'Cobata' }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ isset($seo['url']) ? $seo['url'] : config('app.url') }}" />
    <meta property="og:image" content="{{ isset($seo['imagem']) ? $seo['imagem'] : config('seo.imagem') }}" />
    <meta property="og:description" content="{{ isset($seo['descricao']) ? $seo['descricao'] : config('seo.descricao') }}" />

    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="{{ asset('lib/icones/css/materialdesignicons.min.css') }}" media="all" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="{{asset('lib/materialize/dist/css/materialize.css')}}">
    <link rel="stylesheet" href="{{asset('js/slick/slick.css')}}" />
    <link rel="stylesheet" href="{{asset('js/slick/slick-theme.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css"> 
       
</head>
<body id="app-layout">
  <header>
    @include('layouts._site._nav')
  </header>
  <main>
    @if(Session::has('mensagem'))
      <div class="container">
        <div class="row">
          <div class="card {{ Session::get('mensagem')['class'] }}">
            <div align="center" class="card-content">
              {{ Session::get('mensagem')['msg'] }}
            </div>
          </div>
        </div>
        
      </div>
    @endif 
    @yield('content')
  </main>  
    
    
     @include('layouts._site/_footer')
    <!-- Scripts -->
   <script src="{{asset('lib/jquery/dist/jquery.js')}}"></script>
   
   <script src="{{asset('lib/materialize/dist/js/materialize.js')}}"></script>
   <script src="{{asset('js/init.js')}}"></script>
   <script src="{{asset('js/carrinho.js')}}"></script>
   <script src="{{asset('js/slick/slick.min.js')}}"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
  
</body>
</html>
