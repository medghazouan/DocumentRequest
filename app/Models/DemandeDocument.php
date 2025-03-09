<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DemandeDocument extends Model {
    public function utilisateur() {
        return $this->belongsTo(Utilisateur::class, 'idUtilisateur');
    }
    
    public function responsable() {
        return $this->belongsTo(Utilisateur::class, 'idResponsableService');
    }
    
    public function archiviste() {
        return $this->belongsTo(Utilisateur::class, 'idArchiviste');
    }
    
    public function certificats() {
        return $this->hasMany(Certificat::class, 'idDemande');
    }
}
