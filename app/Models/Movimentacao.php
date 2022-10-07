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

    protected static function boot() {
        parent::boot();

        static::created(function($movimentacao) {
            Funcionario::updateSaldoAtual($movimentacao);
        });
    }

    public function funcionario(){
        return $this->hasOne(Funcionario::class, 'id', 'funcionario_id');
    }

}
