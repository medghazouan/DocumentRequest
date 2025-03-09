<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notification extends Model
{
    use HasFactory;

    protected $primaryKey = 'idNotification';
    
    protected $fillable = [
        'idDestinataire',
        'idDemande',
        'message',
        'dateEnvoi',
    ];

    /**
     * Get the user who receives the notification
     */
    public function destinataire(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'idDestinataire', 'idUtilisateur');
    }

    /**
     * Get the document request associated with this notification
     */
    public function demandeDocument(): BelongsTo
    {
        return $this->belongsTo(DemandeDocument::class, 'idDemande', 'idDemande');
    }
}