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

}
