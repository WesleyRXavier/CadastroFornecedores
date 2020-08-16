<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    //------------------------------------------------------------------------------------------------------------------
    public function __construct()
    {

    }
    //------------------------------------------------------------------------------------------------------------------
    public function Show()
    {
        $compact =
            [
                'title'=>'Cadastro de Fornecedores'
            ];
        return view('Home.Principal.Show', $compact);
    }
    //------------------------------------------------------------------------------------------------------------------

    /*
     *
     * Funções Auxiliares
     *
     *
     */
}
