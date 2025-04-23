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
        Schema::create('operateurs', function (Blueprint $table) {
            $table->id();
            $table->string('photo'); // Mettre à jour
            $table->string('nom');
            $table->string('adresse');
            $table->string('contact');
            $table->string('email'); // Mettre à jour 
            $table->string('type'); // Mettre à jour 
            $table->string('raison');  
            $table->string('formel'); // Mettre à jour 
            $table->string('nif');
            $table->string('stat');
            $table->string('rc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operateurs');
    }
};
