<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'nome', 'descricao'
    ];

    public function items(){
        return $this->hasMany(Item::class, 'id_categoria', 'id');
    }

}
