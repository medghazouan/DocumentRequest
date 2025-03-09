<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Document extends Model
{
    use HasFactory;

    protected $primaryKey = 'idDocument';
    
    protected $fillable = [
        'titre',
        'type',
        'societe',
        'direction',
        'service',
        'statut',
    ];

    /**
     * Get the document requests associated with this document
     */
    public function demandeDocuments(): BelongsToMany
    {
        return $this->belongsToMany(DemandeDocument::class, 'document_demande_document', 'idDocument', 'idDemande');
    }

    /**
     * Get the certificates associated with this document
     */
    public function certificats(): HasMany
    {
        return $this->hasMany(Certificat::class, 'idDocument', 'idDocument');
    }
}