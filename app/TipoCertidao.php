<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCertidao extends Model
{
    protected $table = 'tipo_certidoes';

    protected $fillable = [
        'nome', 'descricao',
    ];

    public function certidoes(){
        return $this->hasmany(Certidao::class,'id_tipo','id');
    }




}
