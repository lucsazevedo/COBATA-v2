<footer class="page-footer red">
  <div class="container">
    <div class="row">
      <div class="col l6 s12">
        <h5 class="white-text">Cobata</h5>
          <div class="row">
            <form class="col s12" action="{{route('site.newslatter.salvar')}}" method="post">
             {{ csrf_field() }}
              <div class="row">
                <div class="input-field col s6">
                  <input id="icon_prefix" name="email" type="email" class="validate">
                  <label for="icon_prefix">Newslatter</label>
                </div>
                <div class="input-field col s6"> <button class="btn teal darken-3"> <i class="material-icons">mail</i></button></div>
              </div>
            </form>
          </div>
      </div>
      <div class="col l4 offset-l2 s12">
        <h5 class="white-text">Mapa do Site</h5>
        <ul>
          <li><a class="grey-text text-lighten-3" href="{{route('site.home')}}">Home</a></li>
          <li><a class="grey-text text-lighten-3" href="{{route('site.sobre')}}">Sobre</a></li>
          <li><a class="grey-text text-lighten-3" href="{{route('site.contato')}}">Contato</a></li>
          <li><a class="grey-text text-lighten-3" href="{{route('site.marcas')}}">Marcas</a></li>
          <li><a class="grey-text text-lighten-3" href="{{route('site.catalogos')}}">Catálogos</a></li>
            @if (Auth::guest())
                <li><a class="grey-text text-lighten-3" href="{{ route('admin.login') }}">Entrar</a></li>
                <li><a class="grey-text text-lighten-3"  href="{{ url('/register') }}">Cadastre-se</a></li>
            @else
              <li><a class="grey-text text-lighten-3" href="{{ route('carrinho.compras') }}">Meus Pedidos</a></li>
              <li><a class="grey-text text-lighten-3" href="{{ route('enderecos.index') }}">Meus Endereços</a></li>
              <li><a class="grey-text text-lighten-3" href="{{ route('carrinho.index') }}">Carrinho</a></li>
              <li><a class="grey-text text-lighten-3" href="{{route('admin.principal')}}"> Administração</a></li>
              <li><a class="grey-text text-lighten-3" href="#">2ª Via de Boleto</a></li>
              <li><a class="grey-text text-lighten-3" href="{{route('admin.login.sair')}}">Sair</a></li>
            @endif
        </ul>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
    © {{date('Y')}} Agencion - Todos os Direitos Reservados
    </div>
  </div>
</footer>
    