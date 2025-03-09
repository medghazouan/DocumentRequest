<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model {
    public function demandes() {
        return $this->hasMany(DemandeDocument::class, 'idDocument');
    }
    
    public function certificats() {
        return $this->hasMany(Certificat::class, 'idDocument');
    }
}
