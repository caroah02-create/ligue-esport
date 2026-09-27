<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joueur extends Model
{
    use HasFactory;

    protected $fillable = ['equipe_id', 'pseudo', 'nom', 'date_naissance', 'role'];

    protected function casts(): array
    {
        return [
            'date_naissance' => 'date',
        ];
    }

    public function equipe()
    {
        return $this->belongsTo(Equipe::class);
    }
}
