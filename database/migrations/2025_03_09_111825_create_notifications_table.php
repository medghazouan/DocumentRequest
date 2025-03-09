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

            // Clé étrangère vers le certificat concerné
            $table->unsignedBigInteger('idCertificat');

            $table->boolean('isRead')->default(false);
            $table->dateTime('dateEnvoi')->useCurrent();

            $table->timestamps();

            $table->foreign('idDestinataire')
                  ->references('idUtilisateur')
                  ->on('utilisateurs')
                  ->onDelete('cascade');

            $table->foreign('idCertificat')
                  ->references('idCertificat')
                  ->on('certificats')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
