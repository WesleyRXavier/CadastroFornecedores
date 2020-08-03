<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'nome', 'descricao'
    ];

    public function categoria(){
        return $this->belongsTo(Categoria::class);

    }
    public function fornecedores(){
        return $this->belongsToMany(Fornecedor::class,'fornecedor_item','id_item','id_fornecedor');
    }

}
