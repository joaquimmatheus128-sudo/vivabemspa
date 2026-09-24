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
        Schema::connection('mysql')->create('tbl_servico_equipamento', function (Blueprint $table) {
            $table->integer('id_servico');
            $table->integer('id_equipamento')->index('id_equipamento');

            $table->primary(['id_servico', 'id_equipamento']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mysql')->dropIfExists('tbl_servico_equipamento');
    }
};
