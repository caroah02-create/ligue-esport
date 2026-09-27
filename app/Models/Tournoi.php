<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournoi extends Model
{
    /** @use HasFactory<\Database\Factories\TournoiFactory> */
    use HasFactory;

    protected $fillable = ['nom', 'jeu', 'date_debut', 'date_fin', 'bourse', 'nb_equipes_max'];

    protected function casts(): array
    {
        return [
            'date_debut' => 'date',
            'date_fin' => 'date',
            'bourse' => 'decimal:2',
        ];
    }

    public function equipes()
    {
        return $this->belongsToMany(Equipe::class)
            ->withPivot('classement')
            ->withTimestamps();
    }
}
