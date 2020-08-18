<?php

namespace App\Http\Controllers\painel\Items;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\itemsRequest;
use App\Item;
use App\Categoria;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Painel de Items';
        $items = Item::with('categoria')->orderBy('nome', 'asc')->get();
       // dd($items);

       return view('Painel.Items.index', compact('title', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Painel Cadastro de Items';
        $categorias = Categoria::all();

        return view('Painel.Items.create', compact('title', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(itemsRequest $request)
    {
        $data = $request->all();

        $item = Item::create($request->all());

        toastr()->success('Item Foi cadastrado!');
        return redirect()->route('Painel.Items.index');
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
        $title = 'Edição de Items';
        $item = Item::find($id);
        $categorias = Categoria::all();

        return view('Painel.Items.edit', compact('title', 'item','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(itemsRequest $request, $id)
    {
        $item = Item::find($id);
        $item->nome = $request->nome;
        $item->descricao = $request->descricao;
        $item->id_categoria = $request->id_categoria;
        $item->save();

        toastr()->success('Item Alterado com sucesso!');
        return redirect()->route('Painel.Items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        $item->fornecedores()->detach($item->fornecedores);
        $item->delete();

        toastr()->success('deletado!');
        return redirect()->route('Painel.Items.index');
    }
}
