@extends('Painel.Layouts.index')


@section('content')

<style>
    .btnModal {
        display: inline;
        float: right;
        padding-bottom: 5px
    }

    table,
    th,
    td {
        border: 1px solid rgb(143, 140, 140);
        border-collapse: collapse;
    }

    th,
    td {
        padding: 5px;
        text-align: left;
    }

    caption {
        text-align: center
    }
    .select2-selection__choice__display{
    color: rgb(44, 44, 44);
}
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Cadastro de Categorias
            <small>SRSV-Compras</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('Painel.Principal.Show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Cadastro de Categorias</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">

            <div class="col-md-6 col-xs-12">

                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cadastrando Categoria</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('Painel.Categorias.store') }}" method="post">
                            @csrf

                            <!-- NOME -->
                            <div class="form-group has-feedback">
                                <label for="nome">Nome:</label>
                                <input type="text" class="form-control  {{ $errors->has('nome') ? ' is-invalid' : '' }}"
                                    placeholder="Nome Completo" value="{{ old('nome') }}" name="nome" id="nome"
                                    autofocus required>
                                <span class="form-control-feedback"></span>
                                @if ($errors->has('nome'))
                                <span class="invalid-feedback" role="alert">
                                    <strong class="alert-danger">{{ $errors->first('nome') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- DESCRICAO-->
                            <div class="form-group has-feedback ">
                                <label for="descricao">Descrição:</label>
                                <input type="text" class="form-control {{ $errors->has('descricao') ? ' is-invalid' : '' }}"
                                    placeholder="descricao" value="{{ old('descricao') }}" name="descricao" id="descricao"
                                    autofocus required>
                                <span class="form-control-feedback"></span>
                                @if ($errors->has('descricao'))
                                <span class="invalid-feedback" role="alert">
                                    <strong class="alert-danger">{{ $errors->first('descricao') }}</strong>
                                </span>
                                @endif

                            </div>




                            <div class="box-footer">

                                <button type="submit" class="btn btn-success btn-sm pull-right">Cadastrar categoria</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>



        </div>
    </section>
</div>



@endsection

