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
        Schema::create('visites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bien_id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('proprietaire_id');
            $table->date('date_visite');
            $table->time('heure_visite');
            $table->timestamps();
            $table->foreign('bien_id')->references('id')->on('biens')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('proprietaire_id')->references('id')->on('proprietaires')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visites');
    }
};
