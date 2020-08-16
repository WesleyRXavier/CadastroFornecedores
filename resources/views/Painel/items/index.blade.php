@extends('Painel.Layouts.index')

@section('content')
<style>

</style>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Lista de Items
                <small>SRSV-Compras</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('Painel.Principal.Show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Lista de Items</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">

                <div class="col-xs-12">

                    <div class="box ">
                        <div class="box-header">
                            <h3 class="box-title">Lista de Items | Adicionar : <a href="{{ route('Painel.Items.create') }}" class="btn btn-success fa fa-plus"></a></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>

                                    <th>Nome</th>
                                    <th>Descricao</th>
                                    <th>Categoria</th>
                                    <th>Ação</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($items as $item)
                                    <tr>
                                        <td>{{ $item->nome }}</td>
                                        <td>{{ $item->descricao }}</td>
                                        <td>{{ $item->categoria->nome}}</td>
                                        <td style="display: flex">

                                            <form class="archiveItem" action="{{ route('Painel.Items.destroy', $item->id)}}" method="post" style="margin-left: 5px">
                                              @method('DELETE')
                                              @csrf
                                              <a href="{{ route('Painel.Items.edit', $item->id) }}" class="btn btn-warning fa fa-edit " ></a>
                                              <a class="btn btn-danger fa fa-trash deleteRecord " onclick="archiveRemove(this)" id="{{$item->id}}" ></a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Nome</th>
                                    <th>Descriçao</th>
                                    <th>Categoria</th>
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
            title: 'Excluir este Item ? ',
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
