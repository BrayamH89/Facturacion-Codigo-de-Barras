<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('factura', function (Blueprint $table) {
            $table->renameColumn('identificacion', 'numero_id');
        });
    }

    public function down(): void
    {
        Schema::table('factura', function (Blueprint $table) {
            $table->renameColumn('numero_id', 'identificacion');
        });
    }
};
