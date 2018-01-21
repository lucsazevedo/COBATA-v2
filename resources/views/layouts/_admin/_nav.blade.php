<nav>
  <div class="nav-wrapper red">
    <a href="#!" class="brand-logo">Logo</a>
    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
    <ul class="right hide-on-med-and-down">
      <li><a href="{{ route('admin.principal')}}">Início</a></li>
      <li><a class="grey-text text-lighten-3" href="{{route('site.home')}}">Site</a></li>
      @if(Auth::guest())
        <li><a href="{{ route('admin.login')}}">Login</a></li>
      @else
        <li>{{Auth::user()->name}}</li>
        @can('usuario_listar')
          <li><a href="{{ route('admin.usuarios') }}">Usuários</a></li>
        @endcan
         <li><a href="{{ route('admin.funcoes') }}">Funções</a></li>      
        <li><a href="{{ route('admin.slides') }}">Slides</a></li>    
        <li><a href="{{ route('admin.paginas') }}">Páginas</a></li>    
        <li><a href="{{ route('admin.categorias') }}">Categorias</a></li>   
        <li><a href="{{ route('admin.marcas') }}">Marcas</a></li>   
        <li><a href="{{ route('admin.catalogos') }}">Catálogos</a></li>   
        <li><a href="{{ route('admin.cidades') }}">Cidades</a></li>   
        <li><a href="{{ route('admin.produtos') }}">Produtos</a></li> 
        <li><a href="{{ route('admin.lancamentos') }}">Lançamentos</a></li> 
        <li><a href="{{ route('admin.depoimentos') }}">Depoimentos</a></li> 
        <li><a href="{{route('admin.login.sair')}}">Sair</a></li>
      @endif
    </ul>

   <ul class="side-nav" id="mobile-demo">
     <li><a href="{{ route('admin.principal')}}">Início</a></li>
      <li><a class="grey-text text-lighten-3" href="{{route('site.home')}}">Site</a></li>
      @if(Auth::guest())
        <li><a href="{{ route('admin.login')}}">Login</a></li>
      @else
        <li>{{Auth::user()->name}}</li>
        @can('usuario_listar')
          <li><a href="{{ route('admin.usuarios') }}">Usuários</a></li>
        @endcan
         <li><a href="{{ route('admin.funcoes') }}">Funções</a></li>      
        <li><a href="{{ route('admin.slides') }}">Slides</a></li>    
        <li><a href="{{ route('admin.paginas') }}">Páginas</a></li>    
        <li><a href="{{ route('admin.categorias') }}">Categorias</a></li>   
        <li><a href="{{ route('admin.marcas') }}">Marcas</a></li>   
        <li><a href="{{ route('admin.catalogos') }}">Catálogos</a></li>   
        <li><a href="{{ route('admin.cidades') }}">Cidades</a></li>   
        <li><a href="{{ route('admin.produtos') }}">Produtos</a></li> 
        <li><a href="{{ route('admin.lancamentos') }}">Lançamentos</a></li> 
        <li><a href="{{ route('admin.depoimentos') }}">Depoimentos</a></li> 
        <li><a href="{{route('admin.login.sair')}}">Sair</a></li>
      @endif
    </ul>

  </div>
</nav>