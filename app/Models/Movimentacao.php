<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movimentacao extends Model
{
    protected $table = 'movimentacao';
    public $timestamps = false;

    protected $fillable = [
        'tipo_movimentacao',
        'valor',
        'observacao',
        'funcionario_id',
        'administrador_id',
        'data_criacao',
    ];

}
