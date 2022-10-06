<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Funcionario extends Authenticatable
{

    protected $table = 'funcionario';

    const CREATED_AT = 'data_criacao';
    const UPDATED_AT = 'data_alteracao';

    protected $fillable = [
        'nome_completo',
        'saldo_atual',
        'login',
        'senha',
    ];

    protected $hidden = [
        'senha'
    ];

}
