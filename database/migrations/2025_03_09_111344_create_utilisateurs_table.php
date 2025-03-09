<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilisateursTable extends Migration
{
    public function up()
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id('idUtilisateur');
            $table->string('nom');
            $table->string('email')->unique();
            $table->string('fonction')->nullable();
            $table->string('societe')->nullable();
            $table->string('direction')->nullable();
            $table->string('service')->nullable();
            
            // Adaptez les rôles selon vos besoins
            $table->enum('role', ['ResponsableService', 'Archiviste', 'Utilisateur'])->default('Utilisateur');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('utilisateurs');
    }
}
