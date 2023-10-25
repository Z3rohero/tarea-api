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
        Schema::create('tareas', function (Blueprint $table) {
            $table->id();
            $table->string('tarea_titulo', 100);
            $table->string('tarea_descripcion');
            $table->string('tarea_estado', 100)->default('pendiente');
            $table->timestamps();
            $table->unsignedBigInteger('codigo_user'); 
            $table->foreign('codigo_user') 
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });
    }


    /*
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tareas');
    }
};
