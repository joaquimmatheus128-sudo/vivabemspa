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
        Schema::connection('mysql')->create('tbl_depoimento', function (Blueprint $table) {
            $table->integer('id_depoimento', true);
            $table->integer('id_cliente')->index('id_cliente');
            $table->string('titulo_depoimento', 100);
            $table->text('descricao_depoimento');
            $table->decimal('nota_depoimento', 2, 1);
            $table->enum('status_depoimento', ['PENDENTE', 'APROVADO', 'REJEITADO'])->nullable()->default('PENDENTE');
            $table->dateTime('data_criacao')->nullable()->useCurrent();
            $table->dateTime('data_atualizacao')->useCurrentOnUpdate()->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mysql')->dropIfExists('tbl_depoimento');
    }
};
