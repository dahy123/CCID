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
        Schema::create('visiteurs', function (Blueprint $table) {
            $table->id();
            // $table->string('photo'); // Mettre à jour
            $table->string('nom');
            $table->string('prenom');
            $table->string('email'); // Mettre à jour
            $table->string('contact');
            $table->string('adresse'); // Mettre à jour
            $table->string('motif'); // Mettre à jour
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visiteurs');
    }
};
