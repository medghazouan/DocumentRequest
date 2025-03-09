<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id('idNotification');
            $table->text('message');

            // Clé étrangère vers l’utilisateur destinataire
            $table->unsignedBigInteger('idDestinataire');

           
            $table->dateTime('dateEnvoi')->useCurrent();

            $table->timestamps();

            $table->foreign('idDestinataire')
                  ->references('idUtilisateur')
                  ->on('utilisateurs')
                  ->onDelete('cascade');

            
        });
    }

    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
