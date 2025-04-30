<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTipoDocumentoToFacturaTable extends Migration
{
    public function up()
    {
        Schema::table('factura', function (Blueprint $table) {
            $table->string('tipo_documento', 50)->nullable()->after('identificacion');
        });
    }

    public function down()
    {
        Schema::table('factura', function (Blueprint $table) {
            $table->dropColumn('tipo_documento');
        });
    }
}