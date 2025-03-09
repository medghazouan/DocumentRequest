<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Certificat extends Model
{
    use HasFactory;

    protected $primaryKey = 'idCertificat';
    
    protected $fillable = [
        'idDemande',
        'idUtilisateur',
        'idDocument',
        'dateGeneration',
        'signatureUtilisateur',
    ];

    /**
     * Get the document request associated with this certificate
     */
    public function demandeDocument(): BelongsTo
    {
        return $this->belongsTo(DemandeDocument::class, 'idDemande', 'idDemande');
    }

    /**
     * Get the user associated with this certificate
     */
    public function utilisateur(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'idUtilisateur', 'idUtilisateur');
    }

    /**
     * Get the document associated with this certificate
     */
    public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class, 'idDocument', 'idDocument');
    }
}