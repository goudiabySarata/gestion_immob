<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom', 'bien_id'
    ];

    public function biens()
    {
        return $this->belongsTo(BienImmobilier::class);
    }
}
