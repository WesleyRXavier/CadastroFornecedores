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
                                    <th>Categorias</th>
                                    <th>Status</th>
                                    <th>Detalhar</th>
                                    <th>Ação</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($fornecedores as $fornecedor)
                                    <tr>
                                        <td><a href="{{ route('Painel.Fornecedores.show', $fornecedor->id) }}">{{  $fornecedor->nome }}</a></td>
                                        <td>{{ $fornecedor->cnpj }}</td>
                                        <td>
                                            @foreach ($fornecedor->categorias()->get() as $categoria )
                                            <li class="liCategoria">{{ $categoria->nome }}</li>
                                        @endforeach
                                    </td>
                                    <td>{{ ($fornecedor->status=='1'? 'Ativo': 'Desativado') }}</td>
                                        <td> <a href="{{ route('Painel.Fornecedores.show', $fornecedor->id)}}" class="btn btn-info ">Ver mais »</a></td>
                                        <td style="display: flex">

                                            <form class="archiveItem" action="{{ route('Painel.Fornecedores.destroy', $fornecedor->id)}}" method="post" style="margin-left: 5px">
                                              @method('DELETE')
                                              @csrf
                                              <a href="{{ route('Painel.Fornecedores.edit', $fornecedor->id) }}" class="btn btn-warning fa fa-edit " ></a>
                                              <a class="btn btn-danger fa fa-trash deleteRecord " onclick="archiveRemove(this)" id="{{$fornecedor->id}}" ></a>
                                            </form>
                                        </td>


                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Nome</th>
                                    <th>Cnpj</th>
                                    <th>Categorias</th>
                                    <th>Status</th>
                                    <th>Detalhar</th>
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




<script>
    function archiveRemove(any) {

        var click = $(any);
        var id = click.attr("id");

        swal.fire({
            title: 'Excluir este Fornecedor ? ',
               text: "Ele sera excluido permanente!",
               type: 'warning',
               icon: 'warning',
               showCancelButton: true,
               confirmButtonColor: '#3085d6',
               cancelButtonColor: '#d33',
               confirmButtonText: 'Sim, tenho certeza!',
               cancelButtonText: 'Cancelar'
        }).then((result)=>{
            if(result.value){
                $('a[id="' + id + '"]').parents(".archiveItem").submit();
            }
        })
    }
</script>

