<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model

{
    protected $table = 'contatos';

    protected $fillable = [
        'nome', 'id_fornecedor', 'telefone','celular','status'
    ];

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }
}
