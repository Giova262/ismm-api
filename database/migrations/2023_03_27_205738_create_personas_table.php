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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('apellido')->nullable();
            $table->string('sexo')->nullable();
            $table->string('fecha_nacimiento')->nullable();
            $table->string('fecha_ingreso')->nullable();
            $table->string('telefono')->nullable();
            $table->string('email')->nullable();
            $table->text('comentario')->nullable();
            $table->text('testimonio')->nullable();
            $table->string('iglesia')->nullable();
            $table->boolean('bautizado')->nullable();
            $table->string('edad')->nullable();
            $table->text('foto_url')->nullable();
            $table->text('direccion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
