<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'tag', 'ville', 'description'];

    public function joueurs()
    {
        return $this->hasMany(Joueur::class);
    }

    public function tournois()
    {
        return $this->belongsToMany(Tournoi::class)
            ->withPivot('classement')
            ->withTimestamps();
    }
}
