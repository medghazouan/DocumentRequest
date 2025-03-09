<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Utilisateur extends Model
{
    use HasFactory;

    protected $primaryKey = 'idUtilisateur';
    
    protected $fillable = [
        'nom',
        'email',
        'fonction',
        'societe',
        'direction',
        'service',
        'role',
    ];

    /**
     * Get the document requests made by this user
     */
    public function demandeDocuments(): HasMany
    {
        return $this->hasMany(DemandeDocument::class, 'idUtilisateur', 'idUtilisateur');
    }

    /**
     * Get the certificates associated with this user
     */
    public function certificats(): HasMany
    {
        return $this->hasMany(Certificat::class, 'idUtilisateur', 'idUtilisateur');
    }

    /**
     * Get the notifications received by this user
     */
    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class, 'idDestinataire', 'idUtilisateur');
    }
}


