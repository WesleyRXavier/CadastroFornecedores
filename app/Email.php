<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $fillable = [
        'email'
    ];

    public function fornecedor(){
        return $this->belongsTo(Fornecedor::class);

    }

}
