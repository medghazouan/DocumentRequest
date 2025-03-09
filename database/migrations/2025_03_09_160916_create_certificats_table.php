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
        Schema::create('certificats', function (Blueprint $table) {
            $table->id('idCertificat');
            $table->unsignedBigInteger('idDemande');
            $table->unsignedBigInteger('idUtilisateur');
            $table->unsignedBigInteger('idDocument');
            $table->date('dateGeneration');
            $table->boolean('signatureUtilisateur');
            $table->timestamps();

            $table->foreign('idDemande')->references('idDemande')->on('demande_documents');
            $table->foreign('idUtilisateur')->references('idUtilisateur')->on('utilisateurs');
            $table->foreign('idDocument')->references('idDocument')->on('documents');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificats');
    }
};