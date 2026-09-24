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
        Schema::connection('mysql')->create('tbl_usuario', function (Blueprint $table) {
            $table->integer('id_usuario', true);
            $table->string('nome_usuario', 100);
            $table->string('email_usuario', 120)->unique('email_usuario');
            $table->string('senha_usuario');
            $table->enum('nivel_usuario', ['ADMIN', 'FUNCIONARIO']);
            $table->enum('status_usuario', ['ATIVO', 'INATIVO'])->nullable()->default('ATIVO');
            $table->dateTime('data_criacao')->nullable()->useCurrent();
            $table->dateTime('data_atualizacao')->useCurrentOnUpdate()->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mysql')->dropIfExists('tbl_usuario');
    }
};
