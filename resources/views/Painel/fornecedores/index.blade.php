@extends('Painel.Layouts.index')

@section('content')
<style>

</style>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Lista de Fornecedores
                <small>SRSV-Compras</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('Painel.Principal.Show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Lista de Fornecedores</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">

                <div class="col-xs-12">

                    <div class="box ">
                        <div class="box-header">
                            <h3 class="box-title">Lista de Fornecedores | Adicionar : <a href="{{ route('Painel.Fornecedores.create') }}" class="btn btn-success fa fa-plus"></a></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>

                                    <th>Nome</th>
                                    <th>Cnpj</th>
                                    <th>Contato</th>
                                    <th>Status</th>
                                    <th>Ação</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($fornecedores as $fornecedor)
                                    <tr>
                                        <td>{{ $fornecedor->nome }}</td>
                                        <td>{{ $fornecedor->cnpj }}</td>
                                        <td> <a class="btn btn-info fa fa-info"></a></td>
                                        <td>{{ $fornecedor->status }}</td>


                                        <td style="display: flex">
                                            <a  class="btn btn-warning fa fa-edit"></a>
                                            <form action="{{ route('Painel.Fornecedores.destroy', $fornecedor->id)}}" method="post" style="margin-left: 5px">
                                              @csrf
                                              @method('DELETE')
                                              <button class="btn btn-danger fa fa-trash" type="submit"></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Nome</th>
                                    <th>Cnpj</th>
                                    <th>Contato</th>
                                    <th>Status</th>
                                    <th>Ação</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </section>
    </div>

@endsection

