<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model {
    public function destinataire() {
        return $this->belongsTo(Utilisateur::class, 'idDestinataire');
    }
}
