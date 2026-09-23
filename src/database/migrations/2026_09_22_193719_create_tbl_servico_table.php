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
        Schema::connection('mysql')->create('tbl_servico', function (Blueprint $table) {
            $table->integer('id_servico', true);
            $table->string('nome_servico', 100);
            $table->text('descricao_servico');
            $table->text('indicacoes_servico')->nullable();
            $table->string('imagem_servico')->nullable();
            $table->enum('status_servico', ['ATIVO', 'INATIVO'])->nullable()->default('ATIVO');
            $table->dateTime('data_criacao')->nullable()->useCurrent();
            $table->dateTime('data_atualizacao')->useCurrentOnUpdate()->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mysql')->dropIfExists('tbl_servico');
    }
};
