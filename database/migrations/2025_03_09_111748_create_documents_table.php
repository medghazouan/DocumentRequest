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
            $table->string('societe')->nullable();
            $table->string('direction')->nullable();
            $table->string('service')->nullable();

            // Statut de la demande : adaptez la liste d'enums selon votre logique
            $table->enum('statut', ['disponible', 'indisponible'])->default('disponible');


            $table->timestamps();

            
        });
    }

    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
