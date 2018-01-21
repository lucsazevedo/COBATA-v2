 <div class="navbar-fixed">
    <nav>
    <div class="nav-wrapper red">
        <div class="container">
          <a href="{{route('site.home')}}" class="brand-logo">Cobata</a>
          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
            <li><a href="{{route('site.home')}}">Home</a></li>
            <li><a href="{{route('site.sobre')}}">Sobre</a></li>
            <li><a href="{{route('site.contato')}}">Contato</a></li>
            <li><a href="{{route('site.marcas')}}">Marcas</a></li>
            <li><a href="{{route('site.catalogos')}}">Catálogos</a></li>
              @if (Auth::guest())
                  <li><a href="{{ route('admin.login') }}">Entrar</a></li>
                  <li><a href="{{ url('/register') }}">Cadastre-se</a></li>
              @else
                  <li>
                      <a class="dropdown-button" href="#!" data-activates="dropdown-user">
                          Olá {{ Auth::user()->name }}!<i class="material-icons right">arrow_drop_down</i>
                      </a>
                      <ul id="dropdown-user" class="dropdown-content">
                          <li class="divider"></li>
                          <li><a href="{{ route('carrinho.compras') }}">Meus Pedidos</a></li>
                          <li><a href="{{ route('enderecos.index') }}">Meus Endereços</a></li>
                          <li><a href="{{ route('carrinho.index') }}">Carrinho</a></li>
                          <li><a href="{{route('admin.principal')}}"> Administração</a></li>
                          <li><a href="#">2ª Via de Boleto</a></li>
                          <li><a href="{{route('admin.login.sair')}}">Sair</a></li>
                      </ul>
                  </li>
            @endif
          </ul>
          <!--<ul class="side-nav" id="mobile-demo">
             <li><a href="{{route('site.home')}}">Home</a></li>
             <li><a href="{{route('site.sobre')}}">Sobre</a></li>
             <li><a href="{{route('site.contato')}}">Contato</a></li>
              @if (Auth::guest())
                  <li><a href="{{ url('/login') }}">Entrar</a></li>
                  <li><a href="{{ url('/register') }}">Cadastre-se</a></li>
              @else
                  <li>
                      <a class="dropdown-button" href="#!" data-activates="dropdown-user">
                          Olá {{ Auth::user()->name }}!<i class="material-icons right">arrow_drop_down</i>
                      </a>
                      <ul id="dropdown-user" class="dropdown-content">
                          <li class="divider"></li>
                          <li>
                              <a href="{{ url('/logout') }}"
                                  onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                  Sair
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li><a href="{{ route('carrinho.compras') }}">Minhas compras</a></li>
                  <li><a href="{{ route('carrinho.index') }}">Carrinho</a></li>
                  <li><a href="{{route('admin.principal')}}"> Administração</a></li>
            @endif
          </ul>-->
        </div>
    </div>
  </nav>
</div>