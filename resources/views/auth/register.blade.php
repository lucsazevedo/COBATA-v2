@extends('layouts.site')
@section('content')
<div class="container">
    <div class="row section"> 
        <h3 align="center"> Registro</h3>
        <div class="divider"></div>
            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Nome</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('CNPJ') ? ' has-error' : '' }}">
                    <label for="CNPJ" class="col-md-4 control-label">CNPJ</label>

                    <div class="col-md-6">
                        <input id="CNPJ" type="text" class="form-control" name="CNPJ" value="{{ old('CNPJ') }}" required autofocus>

                        @if ($errors->has('CNPJ'))
                            <span class="help-block">
                                <strong>{{ $errors->first('CNPJ') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                 <div class="form-group{{ $errors->has('RazaoSocial') ? ' has-error' : '' }}">
                    <label for="RazaoSocial" class="col-md-4 control-label">Razão Social</label>

                    <div class="col-md-6">
                        <input id="RazaoSocial" type="text" class="form-control" name="RazaoSocial" value="{{ old('RazaoSocial') }}" required autofocus>

                        @if ($errors->has('RazaoSocial'))
                            <span class="help-block">
                                <strong>{{ $errors->first('RazaoSocial') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">E-Mail</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">Senha</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="col-md-4 control-label">Confirmar Senha</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Registrar-se
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
