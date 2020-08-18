<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
class categoriaRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => [
                'required',
                'unique:categorias,nome,' . $this->id,
            ],
            'descricao'=>'required',
        ];
    }
    public function messages(){

        return  [
            'required' => '   :attribute e obrigatorio.',
            'min' => ' O campo de ter no minimo :min caracteres.',


        ];


    }
}
