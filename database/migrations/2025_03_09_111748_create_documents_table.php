<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id('idDocument');
            $table->string('titre');
            $table->string('type');
            $table->boolean('copiePapier')->default(false);
            $table->dateTime('dateCreation')->useCurrent();

            // Relation 1:N avec DemandeDocument
            $table->unsignedBigInteger('idDemande');

            // Relation 1:N avec Certificat
            $table->unsignedBigInteger('idCertificat');

            $table->timestamps();

            $table->foreign('idDemande')
                  ->references('idDemande')
                  ->on('demande_documents')
                  ->onDelete('cascade');

            $table->foreign('idCertificat')
                  ->references('idCertificat')
                  ->on('certificats')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
