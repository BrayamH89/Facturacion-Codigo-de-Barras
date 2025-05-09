<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveUniqueFromCodigoBarrasOnFacturaTable extends Migration
{
    public function up()
    {
        Schema::table('factura', function (Blueprint $table) {
            $table->dropUnique(['codigo_barras']);
        });
    }

    public function down()
    {
        Schema::table('factura', function (Blueprint $table) {
            $table->unique('codigo_barras');
        });
    }
}
