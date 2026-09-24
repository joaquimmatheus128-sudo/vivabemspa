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
        Schema::connection('mysql')->table('tbl_depoimento', function (Blueprint $table) {
            $table->foreign(['id_cliente'], 'tbl_depoimento_ibfk_1')->references(['id_cliente'])->on('tbl_cliente')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mysql')->table('tbl_depoimento', function (Blueprint $table) {
            $table->dropForeign('tbl_depoimento_ibfk_1');
        });
    }
};
