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


    public function categorias(){

        return $this->belongsToMany(Categoria::class);
    }
    public function items(){

        return $this->belongsToMany(Item::class);
    }

    public function contatos(){
        return $this->hasmany(Contato::class,'contatos');
    }


    private function clearField(?string $param)
    {
        if(empty($param)){
            return null;
        }

        return str_replace(['.', '-', '/', '(', ')', ' '], '', $param);
    }

}
