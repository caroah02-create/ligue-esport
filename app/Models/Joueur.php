<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

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

    protected function age(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->date_naissance->age;
            }
        );
    }

    public function equipe()
    {
        return $this->belongsTo(Equipe::class);
    }
}
