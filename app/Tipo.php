<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $table = 'tipo_item';
    protected $primarykey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'descricao',
        'isActive'
    ];

    protected $guarded = [
        
    ];
}
