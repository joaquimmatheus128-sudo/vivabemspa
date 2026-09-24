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
        Schema::connection('mysql')->create('tbl_galeria', function (Blueprint $table) {
            $table->integer('id_galeria', true);
            $table->string('nome_galeria', 100)->nullable();
            $table->string('categoria_galeria', 80)->nullable();
            $table->string('imagem_galeria')->nullable();
            $table->string('status_galeria', 10);
            $table->text('descricao_galeria')->nullable();
            $table->dateTime('data_criacao')->nullable()->useCurrent();
            $table->dateTime('data_atualizacao')->useCurrentOnUpdate()->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mysql')->dropIfExists('tbl_galeria');
    }
};
