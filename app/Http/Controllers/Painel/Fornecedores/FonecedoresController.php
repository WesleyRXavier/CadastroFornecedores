<?php

namespace App\Http\Controllers\painel\Fornecedores;
use Illuminate\Database\Eloquent\Model;
use App\Categoria;
use App\Categoria_Fornecedor;
use App\Contato;
use App\Fornecedor;
use App\Fornecedor_Item;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestFornecedores;
use App\Item;
use Illuminate\Http\Request;

class FonecedoresController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Painel de Fornecedores';
        $fornecedores = Fornecedor::orderBy('created_at', 'desc')->get();


        return view('Painel.Fornecedores.index', compact('title', 'fornecedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Painel Cadastro de Fornecedores';
        $categorias = Categoria::orderBy('nome')->get();

        $items = Item::all();

        return view('Painel.Fornecedores.create', compact('title', 'categorias', 'items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestFornecedores $request)
    {
        $data = $request->all();

        $items = $data['items'];
        $categorias = $data['categorias'];
        $contatosEmail = Contato::find($data['contatosEmail']);
        $contatosTelefone = Contato::find($data['contatosTelefone']);
        $contatosCelular = Contato::find($data['contatosCelular']);
        $contatosNome = Contato::find($data['contatosNome']);

        $dadosFornecedor = [
            'nome' => $data['nome'],
            'cnpj' => $data['cnpj'],
            'status' => 1,
        ];

        $fornecedor = Fornecedor::create($dadosFornecedor);

        foreach ($categorias as $categoria) {

            $categoria_fornecedor = new Categoria_Fornecedor();
            $categoria_fornecedor->id_fornecedor = $fornecedor->id;
            $categoria_fornecedor->id_categoria = $categoria;

            $categoria_fornecedor->save();

        }

        foreach ($items as $item) {
            $fornecedoritem = new Fornecedor_Item();
            $fornecedoritem->id_fornecedor = $fornecedor->id;
            $fornecedoritem->id_item = $item;
            $fornecedoritem->save();

        }

        foreach ($contatosEmail as $contatoEmail) {
            $i = 0;
            $contato = new Contato();
            $contato->nome = $contatosNome[i];
            $contato->telefone = $contatosTelefone[i];
            $contato->celular = $contatosCelular[i];
            $contato->email = $contatosEmail[i];
            $contato->status = 1;
            $contato->id_fornecedor = $fornecedor->id;
            $contato->save();
            $i++;

        }

        return redirect()->route('Painel.Fornecedores.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

       $fornecedor= Fornecedor::find($id);

       $fornecedor->categorias()->detach($fornecedor->categorias);
       $fornecedor->items()->detach($fornecedor->items);
       $fornecedor->delete();

        toastr()->success('deletado!');
        return redirect()->route('Painel.Fornecedores.index');
    }
}
