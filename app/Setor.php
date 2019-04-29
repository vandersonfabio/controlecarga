<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    protected $table = 'setor';
    protected $primarykey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'descricao',        
        'isActive',
        'idResponsavel'
    ];

    protected $guarded = [
        
    ];
}
