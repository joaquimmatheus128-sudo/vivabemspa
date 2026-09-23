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
        Schema::connection('mysql')->table('tbl_agendamento', function (Blueprint $table) {
            $table->foreign(['id_cliente'], 'tbl_agendamento_ibfk_1')->references(['id_cliente'])->on('tbl_cliente')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['id_servico'], 'tbl_agendamento_ibfk_2')->references(['id_servico'])->on('tbl_servico')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['id_especialista'], 'tbl_agendamento_ibfk_3')->references(['id_especialista'])->on('tbl_especialista')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['id_sala'], 'tbl_agendamento_ibfk_4')->references(['id_sala'])->on('tbl_sala')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mysql')->table('tbl_agendamento', function (Blueprint $table) {
            $table->dropForeign('tbl_agendamento_ibfk_1');
            $table->dropForeign('tbl_agendamento_ibfk_2');
            $table->dropForeign('tbl_agendamento_ibfk_3');
            $table->dropForeign('tbl_agendamento_ibfk_4');
        });
    }
};
