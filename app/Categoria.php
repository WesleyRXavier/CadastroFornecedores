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
        return $this->belongsToMany(Fornecedor::class);
    }

    public function items(){
        return $this->hasMany(Item::class);
    }

}
