<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Proprietaire extends Model
{
    use HasFactory;
    protected $fillable = [
        'prenom', 'nom', 'adresse', 'email', 'telephone', 'date_naissance', 'password'
    ];

    public function biens()
    {
        return $this->hasMany(BienImmobilier::class);
    }
    public function visite()
    {
        return $this->hasMany(Visite::class, 'proprietaire_id');
    }
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];

}
