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
        Schema::connection('mysql')->create('tbl_categoria', function (Blueprint $table) {
            $table->integer('id_categoria', true);
            $table->string('nome_categoria', 80);
            $table->enum('status_categoria', ['ATIVO', 'INATIVO'])->nullable()->default('ATIVO');
            $table->dateTime('data_criacao')->nullable()->useCurrent();
            $table->dateTime('data_atualizacao')->useCurrentOnUpdate()->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mysql')->dropIfExists('tbl_categoria');
    }
};
