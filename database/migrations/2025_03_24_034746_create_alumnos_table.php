<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('expediente');
            $table->string('nombre');
            $table->string('correo');
            $table->string('carrera');
            $table->string('telefono');
            $table->enum('status', ['activo', 'inactivo'])->default('activo'); 
            $table->binary('huella')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
     Schema::dropIfExists('alumnos');
    }
};
