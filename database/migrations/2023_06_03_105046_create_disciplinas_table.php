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
        Schema::create('disciplinas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('curso_id');
            $table->string('nome');
            $table->longText('descricao')->nullable();
            $table->string('imagem')->nullable();
            $table->integer('ch')->nullable();
            $table->string('link')->nullable();
            $table->string('codigo')->nullable();
            $table->string('modulo')->nullable();
            $table->timestamps();

            // constraint
            $table->foreign('curso_id')->references('id')->on('cursos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disciplinas');
    }
};
