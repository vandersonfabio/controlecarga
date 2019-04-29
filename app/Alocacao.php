<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alocacao extends Model
{
    protected $table = 'alocacao';
    protected $primarykey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'idItem',
        'idSetor',
        'dataEntrega',
        'dataBaixa',
        'userBaixa',
        'isActive'
    ];

    protected $guarded = [
        
    ];
}
