<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::connection('mysql')->create('tbl_agendamento', function (Blueprint $table) {
            $table->integer('id_agendamento', true);
            $table->integer('id_cliente')->index('id_cliente');
            $table->integer('id_servico')->index('id_servico');
            $table->integer('id_especialista')->index('id_especialista');
            $table->integer('id_sala')->index('id_sala');
            $table->date('data_agendamento');
            $table->time('horario_agendamento');
            $table->text('observacao_agendamento')->nullable();
            $table->enum('status_agendamento', ['PENDENTE', 'CONFIRMADO', 'CONCLUIDO', 'CANCELADO'])->nullable()->default('PENDENTE');
            $table->dateTime('data_criacao')->nullable()->useCurrent();
            $table->dateTime('data_atualizacao')->useCurrentOnUpdate()->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mysql')->dropIfExists('tbl_agendamento');
    }
};
