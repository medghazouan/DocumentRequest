<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatsTable extends Migration
{
    public function up()
    {
        Schema::create('certificats', function (Blueprint $table) {
            $table->id('idCertificat');
            $table->dateTime('dateGeneration')->useCurrent();
            $table->boolean('signatureUtilisateur')->default(false);

            // Relation 1:1 avec DemandeDocument : on stocke la clé de la demande
            $table->unsignedBigInteger('idDemande')->unique();
            $table->unsignedBigInteger('idDocument')->unique();
            $table->unsignedBigInteger('idUtilisateur')->unique();

            $table->timestamps();

            $table->foreign('idDemande')
                  ->references('idDemande')
                  ->on('demande_documents')
                  ->onDelete('cascade');
            
            $table->foreign('idDocument')
            ->references('idDocument')
            ->on('documents')
            ->onDelete('cascade');

            $table->foreign('idUtilisateur')
                  ->references('idUtilisateur')
                  ->on('utiisateurs')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('certificats');
    }
}
