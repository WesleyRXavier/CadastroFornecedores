<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certidao extends Model
{
    protected $table = 'certidoes';

    protected $fillable = [
        'nome', 'validade', 'id_tipo','id_fornecedor','url'
    ];

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class,'id_fornecedor', 'id');
    }
    public function tipodeCertidao()
    {
        return $this->belongsTo(TipoCertidao::class,'id_tipo', 'id');
    }
    public function setValidadeAttribute($value)
    {
        $this->attributes['validade'] = (!empty($value) ? $this->convertStringToDate($value) : null);
    }

    public function getValidadeAttribute($value)
    {
        if (empty($value)) {
            return null;
        }

        return date('d/m/Y', strtotime($value));
    }

    private function convertStringToDate($param)
    {
        if(empty($param)) {
            return null;
        }

        list($day, $month, $year) = explode('/', $param);
        return (new \DateTime($year . '-' . $month . '-' . $day))->format('Y-m-d');
    }

}
