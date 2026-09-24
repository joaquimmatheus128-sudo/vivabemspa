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
        Schema::connection('mysql')->create('tbl_cliente', function (Blueprint $table) {
            $table->integer('id_cliente', true);
            $table->string('nome_cliente', 100);
            $table->string('email_cliente', 120)->unique('email_cliente');
            $table->string('senha_cliente');
            $table->enum('genero_cliente', ['MASCULINO', 'FEMININO', 'OUTRO'])->nullable();
            $table->text('condicao_saude')->nullable();
            $table->enum('status_cliente', ['ATIVO', 'INATIVO'])->nullable()->default('ATIVO');
            $table->dateTime('data_criacao')->nullable()->useCurrent();
            $table->dateTime('data_atualizacao')->useCurrentOnUpdate()->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mysql')->dropIfExists('tbl_cliente');
    }
};
