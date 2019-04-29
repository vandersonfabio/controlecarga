<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Policial extends Model
{
    protected $table = 'policial';
    protected $primarykey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'matricula',        
        'nomeFuncional',
        'nomeCompleto',        
        'isActive',
        'idPosto'
    ];

    protected $guarded = [
        
    ];
}
