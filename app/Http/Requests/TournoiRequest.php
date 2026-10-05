<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TournoiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nom' => ['required', 'string', 'max:120'],
            'jeu' => ['required', 'string', 'max:60'],
            'date_debut' => ['required', 'date'],
            'date_fin' => ['required', 'date', 'after_or_equal:date_debut'],
            'bourse' => ['required', 'numeric', 'min:0', 'decimal:0,2'],
            'nb_equipes_max' => ['required', 'integer', 'min:2', 'max:64'],
            'equipes' => ['nullable', 'array'],
            'equipes.*' => ['integer', 'exists:equipes,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'nom.required' => 'Donnez un nom au tournoi.',
            'jeu.required' => 'Indiquez le jeu du tournoi, par exemple Valorant.',
            'date_debut.required' => 'Choisissez la date de début.',
            'date_fin.required' => 'Choisissez la date de fin.',
            'date_fin.after_or_equal' => 'Le tournoi ne peut pas finir avant de commencer.',
            'bourse.required' => 'Indiquez la bourse. Mettez 0 s\'il n\'y en a pas.',
            'bourse.decimal' => 'La bourse peut avoir au plus deux décimales.',
            'nb_equipes_max.required' => 'Indiquez le nombre maximal d\'équipes.',
            'nb_equipes_max.min' => 'Un tournoi doit accueillir au moins 2 équipes.',
            'equipes.*.exists' => 'Une des équipes choisies n\'existe pas.',
        ];
    }
}
