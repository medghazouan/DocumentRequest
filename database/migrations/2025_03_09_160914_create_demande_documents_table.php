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
        Schema::create('demande_documents', function (Blueprint $table) {
            $table->id('idDemande');
            $table->unsignedBigInteger('idUtilisateur');
            $table->unsignedBigInteger('idResponsableService');
            $table->unsignedBigInteger('idArchiviste');
            $table->string('description');
            $table->enum('statut', ['en attente', 'validée', 'refusée', 'récupérée']);
            $table->date('dateSoumission');
            $table->date('dateValidationResponsable')->nullable();
            $table->date('dateValidationArchiviste')->nullable();
            $table->date('dateRecuperation')->nullable();
            $table->timestamps();

            $table->foreign('idUtilisateur')->references('idUtilisateur')->on('utilisateurs');
            $table->foreign('idResponsableService')->references('idUtilisateur')->on('utilisateurs');
            $table->foreign('idArchiviste')->references('idUtilisateur')->on('utilisateurs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demande_documents');
    }
};