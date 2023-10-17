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
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->enum('type',['DVD', 'Blu-Ray', 'DVD-Rom', 'Téléchargé','']);
            $table->string('titre');
            $table->string('duree')->nullable();
            $table->string('genres');
            $table->enum('rangement',['Tour', 'Album', 'Disque-dur', 'Etuit', '']);
            $table->string('nbreCD')->nullable();
            $table->enum('fonctionne', ['oui', 'non', 'Non-Testé', ''])->nullable();
            $table->string('titre_alternatif')->nullable();
            $table->string('remarques')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
