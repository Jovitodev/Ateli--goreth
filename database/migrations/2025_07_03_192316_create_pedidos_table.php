<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('pedidos', function (Blueprint $table) {
        $table->id();
        $table->foreignId('cliente_id')->constrained('clientes')->onDelete('cascade');
        $table->string('tipo_pedido');
        $table->decimal('valor', 8, 2);
        $table->enum('status_pagamento', ['pago', 'pendente'])->default('pendente');
        $table->enum('status_execucao', ['em andamento', 'concluído', 'cancelado'])->default('em andamento');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
