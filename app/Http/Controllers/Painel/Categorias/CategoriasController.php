<?php

namespace App\Http\Controllers\painel\Categorias;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\categoriaRequest;

use App\Categoria;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Painel de Categorias';
        $categorias = Categoria::orderBy('created_at', 'desc')->get();

        return view('Painel.Categorias.index', compact('title', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Painel Cadastro de Categorias';

        return view('Painel.Categorias.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(categoriaRequest $request)
    {

        $data = $request->all();
        $categoria = Categoria::create($data);

        toastr()->success('Categoria Foi cadastrado!');
        return redirect()->route('Painel.Categorias.index');
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
        $title = 'Edição de Categorias';
        $categoria = Categoria::find($id);

        return view('Painel.Categorias.edit', compact('title', 'categoria'));
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
        dd($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        $categoria->fornecedores()->detach($categoria->fornecedores);
        $categoria->delete();

        toastr()->success('deletado!');
        return redirect()->route('Painel.Categorias.index');
    }
}
