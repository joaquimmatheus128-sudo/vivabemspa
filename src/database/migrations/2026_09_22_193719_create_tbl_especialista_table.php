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
        Schema::connection('mysql')->create('tbl_especialista', function (Blueprint $table) {
            $table->integer('id_especialista', true);
            $table->string('nome_especialista', 100);
            $table->enum('genero_especialista', ['MASCULINO', 'FEMININO', 'OUTRO'])->nullable();
            $table->enum('status_especialista', ['ATIVO', 'INATIVO'])->nullable()->default('ATIVO');
            $table->dateTime('data_criacao')->nullable()->useCurrent();
            $table->dateTime('data_atualizacao')->useCurrentOnUpdate()->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mysql')->dropIfExists('tbl_especialista');
    }
};
