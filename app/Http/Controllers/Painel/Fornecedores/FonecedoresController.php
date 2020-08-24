<?php

namespace App\Http\Controllers\painel\Fornecedores;

use App\Categoria;
use App\Contato;
use App\Fornecedor;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestFornecedores;
use App\Item;
use App\Certidao;
use App\TipoCertidao;
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


        $categorias = $data['categorias'];
        $contatosEmail = $data['contatosEmail'];
        $contatosTelefone = $data['contatosTelefone'];
        $contatosCelular = $data['contatosCelular'];
        $contatosNome = $data['contatosNome'];

        $dadosFornecedor = [
            'nome' => $data['nome'],
            'cnpj' => $data['cnpj'],
            'status' => 1,
        ];

        $fornecedor = Fornecedor::create($dadosFornecedor);

        try {
            $fornecedor->categorias()->attach($categorias);

        } catch (Exception $err) {
            $fornecedor->categorias()->detach($categorias);
            $fornecedor->delete();
            toastr()->danger('Erro ao salvar Fornecedor!');
            return redirect()->route('Painel.Fornecedores.create');
        }

        try {
            $i = 0;
            foreach ($contatosEmail as $contatoEmail) {

                $contato = new Contato();
                $contato->nome = $contatosNome[$i];
                $contato->telefone = $contatosTelefone[$i];
                $contato->celular = $contatosCelular[$i];
                $contato->email = $contatoEmail;
                $contato->status = 1;
                $contato->id_fornecedor = $fornecedor->id;
                $contato->save();
                $i += 1;

            }
        } catch (Exception $err) {
            $fornecedor->categorias()->detach($categorias);
            $fornecedor->delete();
            toastr()->danger('Erro ao salvar Fornecedor!');
            return redirect()->route('Painel.Fornecedores.create');

        }

        if ($request->items) {
            $items = $request->items;
            try {
                $fornecedor->items()->attach($items);
            } catch (Exception $err) {
                $fornecedor->categorias()->detach($categorias);
                $fornecedor->delete();
                toastr()->danger('Erro ao salvar Fornecedor!');
                return redirect()->route('Painel.Fornecedores.create');
            }
        }

        toastr()->success('Fornecedor Foi cadastrado!');
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
        $fornecedoItems = null;
        $fornecedor = Fornecedor::find($id);

        if ($fornecedor->items->count() > 0) {
            for ($i = 0; $i < $fornecedor->items->count(); $i++) {
                $fornecedoItems[$i] = $fornecedor->items[$i]->id;
            }
        }
        $title =$fornecedor->nome;
        $tiposCertidoes = TipoCertidao::all();
        return view('Painel.Fornecedores.show', compact('title', 'fornecedor','fornecedoItems','tiposCertidoes'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Painel Edição de Fornecedor';
        $categorias = Categoria::orderBy('nome')->get();
        $items = Item::all();
        $contatos = Contato::where('id_fornecedor', $id)->get();
        $fornecedor = Fornecedor::find($id);
        $fornecedoItems = null;
        $fornecedoCategorias = null;
        if ($fornecedor->items->count() > 0) {
            for ($i = 0; $i < $fornecedor->items->count(); $i++) {
                $fornecedoItems[$i] = $fornecedor->items[$i]->id;
            }
        }
        for ($j = 0; $j < $fornecedor->categorias->count(); $j++) {
            $fornecedoCategorias[$j] = $fornecedor->categorias[$j]->id;
        }

        return view('Painel.Fornecedores.edit', compact('title', 'categorias', 'items', 'fornecedor', 'fornecedoItems', 'fornecedoCategorias', 'contatos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestFornecedores $request, $id)
    {

        $fornecedor = Fornecedor::where('id', $id)->first();
      //  dd($request);
        $fornecedor->nome = $request->nome;
        $fornecedor->cnpj = $request->cnpj;
        $fornecedor->status = $request->status;
        $fornecedor->save();

        $fornecedor->categorias()->detach($fornecedor->categorias);
        $fornecedor->categorias()->attach($request->categorias);
        $fornecedor->items()->detach($fornecedor->items);
        $fornecedor->items()->attach($request->items);

        $fornecedor->contatos()->delete();

        $i = 0;
            foreach ($request->contatosEmail as $contatoEmail) {

                $contato = new Contato();
                $contato->nome = $request->contatosNome[$i];
                $contato->telefone = $request->contatosTelefone[$i];
                $contato->celular = $request->contatosCelular[$i];
                $contato->email = $contatoEmail;
                $contato->status = 1;
                $contato->id_fornecedor = $fornecedor->id;
                $contato->save();
                $i += 1;

            }

            toastr()->success('Fornecedor Foi Alterado!');
            return redirect()->route('Painel.Fornecedores.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $fornecedor = Fornecedor::find($id);
        $fornecedor->categorias()->detach($fornecedor->categorias);
        $fornecedor->items()->detach($fornecedor->items);
        $fornecedor->delete();

        toastr()->success('deletado!');
        return redirect()->route('Painel.Fornecedores.index');
    }

    public function buscaItems(Request $request){

        $categorias = $request->id_categoria;


     $items = Item::whereIn('id_categoria',$categorias)->get();

        if($items->count() > 0){

        return response()->json($items);
        }else{
            $item = 'Nunumitem';
            return response()->json($items);
        }
    }



}
