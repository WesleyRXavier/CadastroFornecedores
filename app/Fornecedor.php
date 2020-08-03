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

        return $this->belongsToMany(Categoria::class,'categoria_fornecedor','id_fornecedor','id_categoria');
    }
    public function items(){

        return $this->belongsToMany(Item::class,'fornecedor_item','id_fornecedor','id_item');
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
