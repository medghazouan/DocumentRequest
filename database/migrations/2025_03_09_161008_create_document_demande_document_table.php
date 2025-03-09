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
        Schema::create('document_demande_document', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idDocument');
            $table->unsignedBigInteger('idDemande');
            $table->timestamps();

            $table->foreign('idDocument')->references('idDocument')->on('documents');
            $table->foreign('idDemande')->references('idDemande')->on('demande_documents');
            
            $table->unique(['idDocument', 'idDemande']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_demande_document');
    }
};