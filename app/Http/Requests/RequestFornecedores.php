<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Fornecedor;
class RequestFornecedores extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }




    public function rules()
    {
        return [
            'nome' => [
                'required',
                'unique:fornecedores,nome,' . $this->id
            ],
            'cnpj' => [
                'required',
                'unique:fornecedores,cnpj,' . $this->id
            ],
            'contatosNome' => 'required',
           'contatosTelefone' => 'required',
           'contatosEmail' => 'required',
           'categorias'=>'required',



        ];
    }
        public function messages(){

            return  [
                'required' => '   :attribute e obrigatorio.',
                'min' => ' O campo de ter no minimo :min caracteres.',


            ];


        }



}
