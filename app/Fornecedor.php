<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{

    protected $table = 'fornecedores';

    protected $fillable = [
        'nome', 'cnpj','status'
    ];

    public function emails(){
        return $this->hasmany(Email::class);
    }

}
