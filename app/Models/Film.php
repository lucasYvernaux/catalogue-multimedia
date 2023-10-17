<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    protected $fillable = ['type', 'titre', 'duree', 'genres', 'rangement', 'nbreCD', 'fonctionne', 'titre_alternatif', 'remarque', 'nom_cache'];
}
