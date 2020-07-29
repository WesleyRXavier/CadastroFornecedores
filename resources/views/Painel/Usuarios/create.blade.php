@extends('Painel.Layouts.index')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Cadastro de Usuários
            <small>Sistema {{ env('APP_NAME') }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('Painel.Principal.Show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Cadastro de Usuários</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">

            <div class="col-xs-6">

                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cadastrando usuário</h3>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">
                        <form action="{{ route('Painel.Usuarios.store') }}" method="post">
                            @csrf

                            <input type="hidden" name="role_id" value="1">
                            <div class="form-group has-feedback">
                                <label for="nome">Nome:</label>
                                <input type="text" class="form-control  {{ $errors->has('nome') ? ' is-invalid' : '' }}" placeholder="Nome Completo" value="{{ old('nome') }}" name="nome" id="nome" autofocus>
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                @if ($errors->has('nome'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nome') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group has-feedback">
                                <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Melhor E-mail" name="email" id="email" value="{{ old('email') }}" >
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password" placeholder="Sua Senha">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" class="form-control" placeholder="Repita Sua Senha" name="password_confirmation" id="password-confirm">
                                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                            </div>
                             <!-- confirmacao -->



                            <!--
                             <div class="form-group">
                                <label>Select</label>
                                <select class="form-control">
                                    <option>option 1</option>
                                    <option>option 2</option>
                                    <option>option 3</option>
                                    <option>option 4</option>
                                    <option>option 5</option>
                                </select>
                            </div>
                                -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                                <button type="submit" class="btn btn-danger pull-right">Cancelar</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>



        </div>
    </section>
</div>
@endsection
