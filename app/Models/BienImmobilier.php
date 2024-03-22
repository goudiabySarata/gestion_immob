<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Psy\Util\Str;

class BienImmobilier extends Model
{
    use HasFactory;
    protected $table = 'biens';
    protected $fillable = [
        'titre',
        'type_bien',
        'adresse',
        'ville',
        'description',
        'prix',
        'photo',
        'statut',
       'superficie',
        'nombre_pieces',
        'proprietaire_id'
    ];

    public function options()
    {
        return $this->belongsToMany(Option::class, 'option_bien', 'bien_id', 'option_id');
    }
    public function images()
    {
        return $this->hasMany(Image::class, 'bien_id');
    }

    public function proprietaire()
    {
        return $this->belongsTo(Proprietaire::class);
    }

    public function visite()
    {
        return $this->hasMany(Visite::class, 'bien_id');
    }

    public function getSlug(): string
    {
        return \Illuminate\Support\Str::slug($this->titre);
    }



}
