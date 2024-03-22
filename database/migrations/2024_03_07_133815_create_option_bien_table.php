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
        Schema::create('option_bien', function (Blueprint $table) {
            $table->foreignId('option_id')->constrained()->cascadeOnDelete();
            $table->foreignId('bien_id')->constrained()->cascadeOnDelete();
            $table->primary(['option_id', 'bien_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('option_bien');
    }
};
