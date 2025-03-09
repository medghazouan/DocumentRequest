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
            $table->dateTime('dateCreation')->useCurrent();
            $table->boolean('signatureUtilisateur')->default(false);

            // Relation 1:1 avec DemandeDocument : on stocke la clé de la demande
            $table->unsignedBigInteger('idDemande')->unique();

            $table->timestamps();

            $table->foreign('idDemande')
                  ->references('idDemande')
                  ->on('demande_documents')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('certificats');
    }
}
