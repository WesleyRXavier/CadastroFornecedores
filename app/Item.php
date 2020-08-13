<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'nome', 'descricao', 'id_categoria',
    ];

    public function categoria(){
        return $this->belongsTo(Categoria::class,'id_categoria', 'id');

    }
    public function fornecedores(){
        return $this->belongsToMany(Fornecedor::class,'fornecedor_item','id_item','id_fornecedor');
    }

}
