<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('factura', function (Blueprint $table) {
            $table->dropColumn('id_factura'); // Elimina la columna autoincremental
        });
        
        Schema::table('factura', function (Blueprint $table) {
            $table->string('id_factura', 20)->primary(); // Nuevo campo editable
        });
    }

    public function down()
    {
        Schema::table('factura', function (Blueprint $table) {
            $table->dropPrimary(['id_factura']);
            $table->dropColumn('id_factura');
        });
        
        Schema::table('factura', function (Blueprint $table) {
            $table->id('id_factura'); // Restaurar la versión original
        });
    }
};
