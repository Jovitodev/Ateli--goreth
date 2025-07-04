<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    // Permite o preenchimento em massa (mass assignment)
    protected $fillable = ['nome', 'cpf', 'idade', 'local'];

    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }
}

