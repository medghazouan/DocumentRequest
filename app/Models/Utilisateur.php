<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model {
    public function demandes() {
        return $this->hasMany(DemandeDocument::class, 'idUtilisateur');
    }
    
    public function notifications() {
        return $this->hasMany(Notification::class, 'idDestinataire');
    }
}
