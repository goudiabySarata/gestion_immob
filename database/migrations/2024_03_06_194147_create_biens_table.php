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
        Schema::create('biens', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('type_bien');
            $table->string('adresse');
            $table->string('ville');
            $table->longText('description');
            $table->integer('prix');
            $table->string('statut');
            $table->integer('superficie')->nullable();
            $table->integer('nombre_pieces')->nullable();
            $table->string('photo')->nullable();
            $table->bigInteger('proprietaire_id')->unsigned();
            $table->foreign('proprietaire_id')->references('id')->on('proprietaires')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biens');
    }
};
