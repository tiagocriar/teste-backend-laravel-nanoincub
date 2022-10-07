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

    public static function updateSaldoAtual(Movimentacao $movimentacao){
        $changes = false;
        $funcionario = Funcionario::findOrFail($movimentacao->funcionario_id);

        if($movimentacao->tipo_movimentacao === 'entrada'){
            $funcionario->saldo_atual = $funcionario->saldo_atual + $movimentacao->valor;
            $changes = true;
        }elseif($movimentacao->tipo_movimentacao === 'saida'){
            $funcionario->saldo_atual = $funcionario->saldo_atual - $movimentacao->valor;
            $changes = true;
        }

        if($changes){
            $funcionario->save();
        }
    }

}
