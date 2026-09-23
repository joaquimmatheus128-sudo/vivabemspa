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
        Schema::connection('mysql')->table('tbl_servico_equipamento', function (Blueprint $table) {
            $table->foreign(['id_servico'], 'tbl_servico_equipamento_ibfk_1')->references(['id_servico'])->on('tbl_servico')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['id_equipamento'], 'tbl_servico_equipamento_ibfk_2')->references(['id_equipamento'])->on('tbl_equipamento')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mysql')->table('tbl_servico_equipamento', function (Blueprint $table) {
            $table->dropForeign('tbl_servico_equipamento_ibfk_1');
            $table->dropForeign('tbl_servico_equipamento_ibfk_2');
        });
    }
};
