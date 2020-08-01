<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Contato;
class Fornecedor extends Model
{

    protected $table = 'fornecedores';

    protected $fillable = [
        'nome', 'cnpj','status'
    ];

    public function contatos(){
        return $this->hasmany(Contato::class,'id_fornecedor', 'id');
    }

    public function setCnpjAttribute($value)
    {
        $this->attributes['cnpj'] = (!empty($value) ? $this->clearField($value) : null);
    }

    public function getCnpjAttribute($value)
    {
        return substr($value, 0, 2) . '.' . substr($value, 2, 3) . '.' . substr($value, 5, 3) .
            '/' . substr($value, 8, 4) . '-' . substr($value, 12, 2);
    }

    private function clearField(?string $param)
    {
        if(empty($param)){
            return null;
        }

        return str_replace(['.', '-', '/', '(', ')', ' '], '', $param);
    }

}
