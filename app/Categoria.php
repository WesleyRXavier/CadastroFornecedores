<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    protected $fillable = [
        'nome', 'descricao'
    ];




    public function fornecedores(){
        return $this->belongsToMany(Fornecedor::class,'categoria_fornecedor','id_categoria','id_fornecedor');
    }

    public function items(){
        return $this->hasMany(Item::class);
    }

}
