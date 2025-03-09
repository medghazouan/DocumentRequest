<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandeDocumentsTable extends Migration
{
    public function up()
    {
        Schema::create('demande_documents', function (Blueprint $table) {
            $table->id('idDemande');
            $table->dateTime('dateCreation')->useCurrent();
            $table->date('dateVaidationResponsable');
            $table->date('dateVaidationArchiviste');
            $table->date('dateRecuperation');

            // Clés étrangères vers la table utilisateurs (ResponsableService, Archiviste, et l’utilisateur qui fait la demande)
            $table->unsignedBigInteger('idResponsableService')->nullable();
            $table->unsignedBigInteger('idArchiviste')->nullable();
            $table->unsignedBigInteger('idUtilisateur');
            
            
            $table->text('description')->nullable();

            // Statut de la demande : adaptez la liste d'enums selon votre logique
            $table->enum('statut', ['Enattente', 'Validee', 'Refusee', 'Recuperee'])->default('Enattente');

            $table->timestamps();

            // Définition des clés étrangères
            $table->foreign('idResponsableService') 
                  ->references('idUtilisateur') 
                  ->on('utilisateurs')
                  ->onDelete('set null');

            $table->foreign('idArchiviste')
                  ->references('idUtilisateur')
                  ->on('utilisateurs')
                  ->onDelete('set null');

            $table->foreign('idUtilisateur')
                  ->references('idUtilisateur')
                  ->on('utilisateurs')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('demande_documents');
    }
}
