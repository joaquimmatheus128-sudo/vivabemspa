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
        Schema::connection('mysql')->create('tbl_contato', function (Blueprint $table) {
            $table->integer('id_contato', true);
            $table->string('nome_contato', 80);
            $table->string('email_contato', 100);
            $table->string('telefone_contato', 20)->nullable();
            $table->string('assunto_contato', 150)->nullable();
            $table->text('mensagem_contato');
            $table->enum('status_contato', ['PENDENTE', 'RESPONDIDO'])->nullable()->default('PENDENTE');
            $table->dateTime('data_criacao')->nullable()->useCurrent();
            $table->dateTime('data_atualizacao')->useCurrentOnUpdate()->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mysql')->dropIfExists('tbl_contato');
    }
};
