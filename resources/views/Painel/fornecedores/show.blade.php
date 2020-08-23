@extends('Painel.Layouts.index')

@section('content')
<style>
    .jumbotron {
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
                                                        <span id="spanTelefone">{{ $contato->telefone }}</span> / <span
                                                            id="spanCelular">{{ $contato->celular }}</span>
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
                                            <ol>
                                                @foreach ($fornecedor->categorias as $categoria )

                                                <li>{{ $categoria->nome }} »</li>

                                                @foreach ($categoria->items as $item)
                                                <ol>
                                                    {{(in_array($item->id, $fornecedoItems ?: []) ? $item->nome:'' )}}
                                                </ol>
                                                @endforeach
                                                @endforeach
                                            </ol>
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

                        <div class="">
                            <div class="panel panel-warning">
                                <div class="panel-heading">Certidões e declarações</div>
                                <div class="table-responsive">
                                    <div>

                                        <table class="table table-hover table-striped table-bordered table-condensed"
                                            cellspacing="0" rules="all" border="1" id=""
                                            style="border-collapse:collapse;">
                                            @if($fornecedor->certidoes->count()> 0)
                                            <ul>
                                                @foreach ($fornecedor->certidoes as $certidao )

                                                <li class="liCertidao" style="padding:5px ">{{ $certidao->tipodeCertidao->nome }} »
                                                    @if(date( 'Y-m-d' , strtotime($certidao->validade))<
                                                        Carbon\Carbon::today())<a style="color: red;cursor:pointer"
                                                        data-toggle="modal" data-target="#myModal"
                                                        data-tipo="{{ $certidao->tipodeCertidao->id }}"
                                                        data-fornecedor="{{ $fornecedor->id }}"> Esta Certidão
                                                        venceu dia {{ $certidao->validade}}, faça a
                                                        substituicao </a>
                                                         @else
                                                         <a href="{{url('storage/'. $certidao->url) }}" target="blank" style="color: green;"
                                                            > Esta
                                                            Certidão e valida ate {{ $certidao->validade }}
                                                            - Clique
                                                            para baixar </a> @endif </li>



                                                @endforeach
                                                <hr>
                                                <a style="color:rgb(33, 22, 180);cursor:pointer" data-toggle="modal"
                                                    data-target="#myModal" data-fornecedor="{{ $fornecedor->id }}">
                                                    Adicionar Nova Certidão- clique aqui! </a>
                                                </ul>
                                            @else
                                            <td colspan="5">
                                                <a style="color: red;cursor:pointer" data-toggle="modal"
                                                    data-target="#myModal" data-fornecedor="{{ $fornecedor->id }}">
                                                    Nenhuma certidao encontrada - clique aqui para adicionar </a>
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
<div class="container">

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" id="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="text-align: center">Certidões</h4>

                </div>
                <div class="modal-body">
                    <form id="modalForm" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group col-md-12" style="text-align: center">

                        </div>
                        <div class="form-group col-md-6">
                            <label for="contatoTelefone">Validade:</label>
                            <input type="text" class="form-control" name="validade" id="validade"
                                autocomplete="off">
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-6 control-label" for="tipo">Certidão</label>
                            <div class="col-md-6">
                                <select id="id_tipo" name="id_tipo" class="form-control">
                                    @foreach ($tiposCertidoes as $tipo)
                                    <option value="{{ $tipo->id }}">{{ $tipo->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="certidao">Certidão em PDF:</label>
                            <input type="file" id="certidao" name="certidao"><br>
                        </div>
                        <div>
                            <input type="hidden" id="id_fornecedor" />
                            <input type="hidden" id="id_tipo" />
                        </div>
                </div>
                <div class="erroCampo"></div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal"
                        onclick="fechaModal()">Fechar</button>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
                </form>
            </div>

        </div>
    </div>

</div>







@endsection
@section('js')
<script>
    $("#spanTelefone").mask("(00) 0000-0000");
$("#spanCelular").mask("(00) 00000-0000");
$("#validade").mask("00/00/0000");

function fechaModal(){
    $('.erroDados').remove();
    $("#modalForm").trigger("reset");
}
//setamodal

$('#myModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var fornecedor  = button.data('fornecedor')
        var tipo = button.data('tipo')

        var modal = $(this)
        modal.find('#id_fornecedor').val(fornecedor)
        modal.find('#id_tipo').val(tipo)
    })

//formsubmit

$('form').submit(function(event) {
    event.preventDefault();
 var validade = $('#validade').val();
 var certidao = $('#certidao').val();

   if(certidao && validade){
    $('.erroDados').remove();

    $.ajaxSetup({

 headers: {

   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

 }

 });
 var formData = new FormData(this);
 formData.append('id_tipo', $('#id_tipo').val());
 formData.append('id_fornecedor', $('#id_fornecedor').val());
    $.ajax({
            url: '{{ route('Painel.Certidoes.store') }}',
            type: 'POST',
            contentType: false,
            processData: false,
            cache: false,
            data: formData,

        success: function(result)
        {
            //alert($('.liCertidao').attr('data-tipo'));
            $("li[data-id=1]").find("li.base").remove()
            $('.liCertidao').attr('data-tipo')

         //  console.log(result);
          window.location.reload();
        },
        error: function(data)
        {
            console.log(data);
        }
    });
    }else{
        $('.erroDados').remove();
        $('.erroCampo').append('<span class="alert alert-danger erroDados">Esta faltando dados</span>');
    }
});

//Painel.Certidoes.store
</script>

@endsection
