<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visite extends Model
{
    use HasFactory;
    protected $table = 'visites';
    protected $fillable = [
        'date_visite',
        'heure_visite',
        'bien_id',
        'client_id',
        'proprietaire_id',
    ];

    public function biens()
    {
        return $this->belongsTo(BienImmobilier::class, 'bien_id');
    }
    public function clients()
    {
        return $this->belongsTo(Clients::class, 'client_id');
    }
    public function proprietaire()
    {
        return $this->belongsTo(Proprietaire::class, 'proprietaire_id');
    }

}
