<?php

namespace App\Http\Controllers\Painel\Usuarios;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestUser;
use Illuminate\Support\Facades\Hash;
class UsuariosController extends Controller
{



    public function index()
    {
        $title = 'Painel de usuários';
        $usuarios = User::all();
        return view('Painel.Usuarios.index', compact('title', 'usuarios'));
    }


    public function create()
    {
        $title = 'Painel Cadastro de Usuários';
        return view('Painel.Usuarios.create', compact('title'));
    }


    public function store(RequestUser $request)
    {


        $user =  User::create([
            'name' => $request['nome'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role_id'=>$request['role_id'],
        ]);
        return redirect()->route('Painel.Usuarios.index');


    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
