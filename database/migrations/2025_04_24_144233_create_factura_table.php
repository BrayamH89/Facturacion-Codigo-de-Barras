<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('factura', function (Blueprint $table) {
            $table->increments('id_factura');
            $table->string('numero_factura', 20)->unique(); // si necesitas otro identificador visible
            $table->string('descripcion_oferta', 150);
            $table->integer('precio');
            $table->integer('descuento');
            $table->integer('cantidad');
            $table->integer('subtotal');
            $table->integer('total');
            $table->string('nombre_programas', 150);
            $table->string('responsable', 100);
            $table->string('identificacion', 20);
            $table->bigInteger('consecutivo');
            $table->date('fecha_factura');
            $table->date('fecha_vencimiento');
            $table->string('codigo_barras', 150)->unique();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('factura');
    }
};