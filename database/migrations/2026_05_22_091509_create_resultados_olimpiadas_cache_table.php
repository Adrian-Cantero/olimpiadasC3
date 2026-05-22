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
        Schema::create('resultados_olimpiadas_cache', function (Blueprint $table) {
            $table->id();
            $table->string('grado', 2)->charset('utf8mb4')->default(null)->nullable();
            $table->string('lastname', 100)->default('');
            $table->string('firstname', 100)->default('');
            $table->unsignedBigInteger('id_prueba')->default(0);
            $table->foreign('id_prueba')->references('id')->on('pruebas');
            $table->decimal('maxpuntuacion', 10, 5)->default(null)->nullable();
            $table->dateTime('MomentoConsecución')->default(null)->nullable();
            $table->bigInteger('penalizaciones')->default(0);
            $table->dateTime('TiempoFinal')->default(null)->nullable();
            $table->string('nombrePrueba', 255)->default(null)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resultados_olimpiadas_cache');
    }
};
