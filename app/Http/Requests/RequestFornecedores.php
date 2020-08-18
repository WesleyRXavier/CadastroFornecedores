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
            'categorias'=>'required',
            'contatosNome' => 'required',
           'contatosTelefone' => 'required',
           'contatosEmail' => 'required',




        ];
    }
        public function messages(){

            return  [
                'required' => '   :attribute obrigatorio.',
                'min' => ' O campo de ter no minimo :min caracteres.',


            ];


        }



}
