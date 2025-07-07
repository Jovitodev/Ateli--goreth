<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
    'cliente_id',
    'tipo_pedido',
    'valor',
    'status_pagamento',
    'status_execucao',
];
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}

