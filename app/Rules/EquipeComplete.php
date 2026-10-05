<?php

namespace App\Rules;

use App\Models\Equipe;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class EquipeComplete implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  Closure(string, ?string=): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $equipe = Equipe::withCount('joueurs')->find($value);

        if ($equipe && $equipe->joueurs_count < 5) {
            $fail("L'équipe « {$equipe->nom} » n'a que {$equipe->joueurs_count} joueurs. Il en faut au moins 5 pour l'inscrire.");
        }
    }
}
