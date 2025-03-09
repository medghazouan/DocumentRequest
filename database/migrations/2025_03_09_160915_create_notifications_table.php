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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id('idNotification');
            $table->unsignedBigInteger('idDestinataire');
            $table->unsignedBigInteger('idDemande')->nullable();
            $table->string('message');
            $table->date('dateEnvoi');
            $table->timestamps();

            $table->foreign('idDestinataire')->references('idUtilisateur')->on('utilisateurs');
            $table->foreign('idDemande')->references('idDemande')->on('demande_documents');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};