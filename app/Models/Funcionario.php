<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Funcionario extends Authenticatable
{

    protected $table = 'funcionario';

    const CREATED_AT = 'data_criacao';
    const UPDATED_AT = 'data_alteracao';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome_completo',
        'saldo_atual',
        'login',
        'senha',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'senha'
    ];

}
