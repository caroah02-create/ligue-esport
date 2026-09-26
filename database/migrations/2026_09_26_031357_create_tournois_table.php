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
        Schema::create('tournois', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('jeu');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->decimal('bourse', 10, 2);
            $table->unsignedInteger('nb_equipes_max');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tournois');
    }
};
