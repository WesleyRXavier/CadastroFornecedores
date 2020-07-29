@extends('Painel.Layouts.index')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Painel Principal
                <small>Sistema SRSV - Compras</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('Painel.Principal.Show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Painel Principal</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">

                <div class="col-lg-12 col-xs-12" style="padding:0;">
                    <h2 class="title_painel ">Sistema Cadastro Fornecedores</h2>
                       <!-- card Fornecedores -->
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-teal">
                            <div class="inner">
                                @inject('fornecedores', '\App\Fornecedor')
                                <h3>{{ $fornecedores->count() }}</h3>
                                <p>Fornecedores Cadastrados</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-building-o"></i>
                            </div>
                            <a href="{{ route('Painel.Fornecedores.index') }}" class="small-box-footer">Gerenciar <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                     <!-- card Categorias -->
                     <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-teal">
                            <div class="inner">
                                @inject('categorias', '\App\Categoria')
                                <h3>{{ $fornecedores->count() }}</h3>
                                <p>Categorias Cadastrados</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-list-alt"></i>
                            </div>
                            <a href="{{ route('Painel.Fornecedores.index') }}" class="small-box-footer">Gerenciar <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- card items -->
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-teal">
                            <div class="inner">
                                @inject('categorias', '\App\Categoria')
                                <h3>{{ $items->count() }}</h3>
                                <p>Items Cadastrados</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-list-alt"></i>
                            </div>
                            <a href="{{ route('Painel.Fornecedores.index') }}" class="small-box-footer">Gerenciar <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>


                    <!-- card Usuarios -->
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-teal">
                            <div class="inner">
                                @inject('users', '\App\User')
                                <h3>{{ $users->count() }}</h3>
                                <p>Usuários do Sistema</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <a href="{{ route('Painel.Usuarios.index') }}" class="small-box-footer">Gerenciar <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- card Usuarios -->
                </div>
            </div>
        </section>
    </div>
@endsection
