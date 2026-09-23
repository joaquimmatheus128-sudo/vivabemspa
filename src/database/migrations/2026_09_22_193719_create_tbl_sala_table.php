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
        Schema::connection('mysql')->create('tbl_sala', function (Blueprint $table) {
            $table->integer('id_sala', true);
            $table->string('nome_sala', 100);
            $table->text('descricao_sala')->nullable();
            $table->enum('status_sala', ['ATIVA', 'INATIVA'])->nullable()->default('ATIVA');
            $table->dateTime('data_criacao')->nullable()->useCurrent();
            $table->dateTime('data_atualizacao')->useCurrentOnUpdate()->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mysql')->dropIfExists('tbl_sala');
    }
};
