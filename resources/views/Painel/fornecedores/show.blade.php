@extends('Painel.Layouts.index')

@section('content')
<style>
.jumbotron{
    text-align: center;
}
</style>
<div class="content-wrapper">
    <section class="content-header ">
        <h1>
            Detalhe do Fornecedor
            <small>SRSV-Compras</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('Painel.Principal.Show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Detalhe do Fornecedor</li>
        </ol>
    </section>
    <section class="content ">
        <div class="row">

            <div class="col-xs-12 ">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">{{ $fornecedor->nome }} | Editar : <a
                                href="{{ route('Painel.Fornecedores.edit',$fornecedor->id) }}"
                                class="btn-sm btn-warning fa fa-edit"></a></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body ">
                        <div
                            class="jumbotron {{ ($fornecedor->status=='1'? 'alert alert-success': ' alert alert-danger') }}">
                            <h1 class="alert-heading display-1 ">{{ $fornecedor->nome }}</h1>
                            <p> CNPJ: {{ $fornecedor->cnpj }}</p>
                            <p> Fornecedor: {{ ($fornecedor->status=='1'? 'Ativo': 'Desativado') }}</p>

                        </div>
                        <div class="">
                            <div class="panel panel-success">
                                <div class="panel-heading">Contatos</div>
                                <div class="table-responsive">
                                    <div>

                                        <table class="table table-hover table-striped table-bordered table-condensed"
                                            cellspacing="0" rules="all" border="1" id=""
                                            style="border-collapse:collapse;">
                                            @if($fornecedor->contatos->count()> 0)
                                            <thead>

                                                <tr>

                                                    <th>Nome</th>
                                                    <th>Telefone</th>
                                                    <th>Email</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach($fornecedor->contatos as $contato)
                                                <tr>
                                                    <td>
                                                        {{ $contato->nome }}
                                                    </td>
                                                    <td>

                                                        @if (($contato->telefone )&&( $contato->celular))
                                                        {{ $contato->telefone }} / {{ $contato->celular }}
                                                        @else
                                                        {{ $contato->telefone }}{{ $contato->celular }}

                                                        @endif


                                                    </td>
                                                    <td>
                                                        {{ $contato->email }}
                                                    </td>


                                                </tr>
                                                @endforeach
                                            </tbody>
                                            @else
                                            <td colspan="5">
                                                Nenhum contato encontrado!
                                            </td>
                                            @endif
                                        </table>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="panel panel-info">
                                <div class="panel-heading">categorias e items</div>
                                <div class="table-responsive">
                                    <div>

                                        <table class="table table-hover table-striped table-bordered table-condensed"
                                            cellspacing="0" rules="all" border="1" id=""
                                            style="border-collapse:collapse;">
                                            @if($fornecedor->categorias->count()> 0)
                                                @foreach ($fornecedor->categorias as $categoria )
                                                    <p>{{ $categoria->nome }} :</p>
                                                    @foreach ($categoria->items as $item)
                                                    <p>{{ $item->nome }}</p>

                                                    @endforeach
                                                @endforeach
                                            @else
                                            <td colspan="5">
                                                Nenhuma categoria encontrado!
                                            </td>
                                            @endif
                                        </table>


                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>

        </div>
    </section>
</div>


@endsection
