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
        Schema::create('equipe_tournoi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('equipe_id')->constrained();
            $table->foreignId('tournoi_id')->constrained()->cascadeOnDelete();
            $table->unsignedInteger('classement')->nullable();
            $table->timestamps();

            $table->unique(['equipe_id', 'tournoi_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipe_tournoi');
    }
};
