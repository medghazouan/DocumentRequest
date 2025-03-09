<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificat extends Model {
    public function demande() {
        return $this->belongsTo(DemandeDocument::class, 'idDemande');
    }
    
    public function document() {
        return $this->belongsTo(Document::class, 'idDocument');
    }
}
