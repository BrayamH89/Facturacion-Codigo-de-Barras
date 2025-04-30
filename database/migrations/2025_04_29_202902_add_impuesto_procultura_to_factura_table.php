<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('factura', function (Blueprint $table) {
        $table->integer('impuesto_procultura')->default(0)->after('total');
    });
}

    public function down(): void
    {
        Schema::table('factura', function (Blueprint $table) {
            $table->dropColumn('impuesto_procultura');
        });
    }
};
