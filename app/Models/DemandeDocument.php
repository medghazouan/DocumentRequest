<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class DemandeDocument extends Model
{
    use HasFactory;

    protected $primaryKey = 'idDemande';
    
    protected $fillable = [
        'idUtilisateur',
        'idResponsableService',
        'idArchiviste',
        'description',
        'statut',
        'dateSoumission',
        'dateValidationResponsable',
        'dateValidationArchiviste',
        'dateRecuperation',
    ];

    /**
     * Get the user who made the request
     */
    public function utilisateur(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'idUtilisateur', 'idUtilisateur');
    }

    /**
     * Get the responsible service manager
     */
    public function responsableService(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'idResponsableService', 'idUtilisateur');
    }

    /**
     * Get the archivist
     */
    public function archiviste(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'idArchiviste', 'idUtilisateur');
    }

    /**
     * Get the documents associated with this request
     */
    public function documents(): BelongsToMany
    {
        return $this->belongsToMany(Document::class, 'document_demande_document', 'idDemande', 'idDocument');
    }

    /**
     * Get the certificates generated from this request
     */
    public function certificats(): HasMany
    {
        return $this->hasMany(Certificat::class, 'idDemande', 'idDemande');
    }

    /**
     * Get the notifications associated with this request
     */
    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class, 'idDemande', 'idDemande');
    }
}