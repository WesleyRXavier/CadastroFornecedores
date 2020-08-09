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

    .select2-selection__choice__display {
        color: rgb(44, 44, 44);
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Cadastro de Fornecedores
            <small>SRSV-Compras</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('Painel.Principal.Show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Cadastro de Fornecedores</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">

            <div class="col-xs-6">

                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cadastrando Fornecedor</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('Painel.Fornecedores.store') }}" method="post">
                            @csrf

                            <!-- NOME -->
                            <div class="form-group has-feedback">
                                <label for="nome">Nome:</label>
                                <input type="text" class="form-control  {{ $errors->has('nome') ? ' is-invalid' : '' }}"
                                    placeholder="Nome Completo" value="{{ old('nome') ?? $fornecedor->nome}}"
                                    name="nome" id="nome" autofocus>
                                <span class="form-control-feedback"></span>
                                @if ($errors->has('nome'))
                                <span class="invalid-feedback" role="alert">
                                    <strong class="alert-danger">{{ $errors->first('nome') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- CNPJ-->
                            <div class="form-group has-feedback ">
                                <label for="cnpj">Cnpj:</label>
                                <input type="text" class="form-control {{ $errors->has('cnpj') ? ' is-invalid' : '' }}"
                                    placeholder="Cnpj" value="{{ old('cnpj') ?? $fornecedor->cnpj }}" name="cnpj"
                                    id="cnpj" maxlength="14" autofocus onkeyup="mascaraCnpj(this);">
                                <span class="form-control-feedback"></span>
                                @if ($errors->has('cnpj'))
                                <span class="invalid-feedback" role="alert">
                                    <strong class="alert-danger">{{ $errors->first('cnpj') }}</strong>
                                </span>
                                @endif

                            </div>
                            <!-- CONTATOS -->
                            <div class="form-group has-feedback" id="contatos">
                                @if($errors->has('contatosNome')||$errors->has('contatosEmail')||$errors->has('contatosTelefone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong class="alert-danger">Pelo menos um Contato deve ser informado !</strong>
                                </span>

                                @endif
                                <div class="btnModal"><button type="button" name="chamaModal" id="chamaModal"
                                        class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#myModal">Adicionar
                                        contato </button>
                                </div>
                                <table class="table table-dark" id="tblContatos">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Telefone</th>
                                            <th>Email</th>
                                            <th>Del</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (old('contatosNome'))






                                        @endif

                                    </tbody>
                                </table>
                            </div>

                            <!-- CATEGORIA -->
                            <div class="form-group">
                                <label>Categoria</label>
                                <select class="selectCategorias form-control  col-md-12" name="categorias[]"
                                    multiple="multiple">
                                    @foreach($categorias as $categoria)
                                    <option value="{{$categoria->id}}"
                                        {{(in_array($categoria->id, old("categorias") ?: []) ? "selected":(in_array($categoria->id, $fornecedoCategorias ?: []) ? "selected":  ""))}}>
                                        {{$categoria->nome}}
                                    </option>
                                    @endforeach

                                </select>
                                @if ($errors->has('nome'))
                                <span class="invalid-feedback" role="alert">
                                    <strong class="alert-danger">{{ $errors->first('categorias') }}</strong>
                                </span>
                                @endif
                            </div>

                            <!-- ITEM -->
                            <div class="form-group">
                                <label>Items(Produtos)</label>
                                <select class=" form-control selectItems col-md-12" name="items[]" multiple="multiple">
                                    @foreach ($categorias as $categoria)
                                    <optgroup label="{{ $categoria->nome }}">
                                        @foreach ($items as $item)
                                        @if ($item->id_categoria == $categoria->id)
                                        <option value="{{$item->id}}"
                                            {{(in_array($item->id, old("items") ?: []) ? "selected":(in_array($item->id, $fornecedoItems ?: []) ? "selected":  ""))}}>
                                            {{$item->nome}}
                                        </option>
                                        @endif
                                        @endforeach
                                        @endforeach
                                </select>
                            </div>
                            <!-- INPUTS DO CONTATO -->
                            <div id="inputsAdicionais">
                                @if (old('contatosNome'))
                                <script>
                                    limpaInputs();
                                </script>
                                @foreach (old('contatosNome') as $contatosNome)

                                <input type="" value="{{ old('contatosNome.'.$loop->index)  }}" name="contatosNome[]" />
                                <input type="" value="{{ old('contatosTelefone.'.$loop->index)  }}"
                                    name="contatosTelefone[]" />
                                <input type="" value="{{ old('contatosCelular.'.$loop->index)  }}"
                                    name="contatosCelular[]" />
                                <input type="" value="{{ old('contatosEmail.'.$loop->index)  }}"
                                    name="contatosEmail[]" />

                                @endforeach
                                @endif
                                @if ($contatos)
                                @foreach ($contatos as $contato)

                                <input type="hidden" value="{{ $contato->nome }}" name="contatosNome[]" />
                                <input type="hidden" value="{{ $contato->telefone  }}" name="contatosTelefone[]" />
                                <input type="hidden" value="{{$contato->celular }}" name="contatosCelular[]" />
                                <input type="hidden" value="{{ $contato->email }}" name="contatosEmail[]" />

                                @endforeach
                                @endif
                            </div>
                            <div class="box-footer">

                                <button type="submit" class="btn btn-success btn-sm pull-right">Cadastrar
                                    Fornecedor</button>
                            </div>

                        </form>
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
                    <h4 class="modal-title" style="text-align: center">Contato</h4>

                </div>
                <div class="modal-body">
                    <form id="modalForm">
                        <div class="form-group col-md-12">
                            <label for="contatoNome">Nome:</label>
                            <input type="text" name="contatoNome" class="form-control" max="191" id="contatoNome"
                                required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="contatoTelefone">Telefone:</label>
                            <input type="number" class="form-control" name="contatoTelefone" id="contatoTelefone">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="celular">WhatsApp:</label>
                            <input type="number" class="form-control" name="contatoCelular" id="contatoCelular">
                        </div>
                        <div class="form-group col-md-12" style="margin-bottom: 50px">
                            <label for="contatoEmail">Email:</label>
                            <input type="email" class="form-control" name="contatoEmail" id="contatoEmail" required>
                        </div>
                </div>
                <div class="erroCampo"></div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal"
                        onclick="fechaModal()">Fechar</button>
                    <button type="submit" onclick="SalvaContato()" class="btn btn-success">Salvar</button>
                </div>
                </form>
            </div>

        </div>
    </div>

</div>



@endsection




<script>
    function SalvaContato(){
        event.preventDefault();
        var nome = $('#contatoNome').val();
        var telefone = $('#contatoTelefone').val();
        var celular = $('#contatoCelular').val();
        var email = $('#contatoEmail').val();


//

if( nome && email) {
var contato =0;
//procura na lista se ja existe o contato
var lista = $('.tdEmail');
        $.each(lista, function(index,item){
            var linha = $(item).text();
            if(email != linha){
                $('.erroEmail').remove();
                 contato = 0;

            }else{
                $('.erroEmail').remove();
                $('.erroCampo').append('<span class="alert alert-danger erroEmail">Ja existe um contato com este Email</span>');
                contato = 1;
           }
   });
    //fim

    if(contato ==0){




            var NumerosTel ;
            if(telefone  && celular){
             NumerosTel = telefone +"/"+celular;
            } if(telefone && !celular){
                NumerosTel  =telefone;
            }
            if(celular && !telefone){
                NumerosTel  =celular;
            }


            var linhaTbl ='<tr name="contatos" id="trContatos"><td>'+ nome +'</td>'+'   '+ '<td>'+ NumerosTel+'</td>'+' '+'<td class="tdEmail">'+ email +'</td><td><a class="btn-sm btn-danger fa fa-trash" onclick="RemoveContato(this)"></a></td></tr>';

             var inputs =  '<input type="hidden" name="contatosNome[]" value="' +
                nome +
                '"><input type="hidden" name="contatosTelefone[]" value="' +
                telefone +
                '"><input type="hidden" name="contatosCelular[]" value="' +
                celular +
                '"><input type="hidden" name="contatosEmail[]" value="' +
                email +
                '"><br>';

                $("#contatos tbody").append(linhaTbl);
                $("#inputsAdicionais").append(inputs);

                $('.erroEmail').remove();
                $('.erroCampo').append('<span class="alert alert-success erroEmail">Contato adicionado!</span>');
                $("#modalForm").trigger("reset");

    }


        }else{


        }
                //



    }



    function RemoveContato(tr){

        tr.closest('tr').remove();

    }

    function mascaraCnpj(num) {
	var campo = num;
	campo.value = campo.value.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/g,"\$1.\$2.\$3\/\$4\-\$5");
}
function fechaModal(){
    $('.erroEmail').remove();
    $("#modalForm").trigger("reset");
}


function limpaInputs(){

}

function LimpaTbl(){
    $('#tblContatos').closest('tr').remove();
}




</script>

