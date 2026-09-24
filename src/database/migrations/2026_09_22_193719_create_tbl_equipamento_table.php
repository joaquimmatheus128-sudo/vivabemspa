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
        Schema::connection('mysql')->create('tbl_equipamento', function (Blueprint $table) {
            $table->integer('id_equipamento', true);
            $table->string('nome_equipamento', 100);
            $table->text('descricao_equipamento')->nullable();
            $table->enum('status_equipamento', ['ATIVO', 'INATIVO'])->nullable()->default('ATIVO');
            $table->dateTime('data_criacao')->nullable()->useCurrent();
            $table->dateTime('data_atualizacao')->useCurrentOnUpdate()->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mysql')->dropIfExists('tbl_equipamento');
    }
};
