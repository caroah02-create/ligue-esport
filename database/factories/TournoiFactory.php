<?php

namespace Database\Factories;

use App\Models\Tournoi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Tournoi>
 */
class TournoiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $debut = fake()->dateTimeBetween('-2 months', '+2 months');

        return [
            'nom' => 'Tournois' . fake()->unique()->city(),
            'jeu' => fake()->randomElement(['League of Legends',  'Rainbow Six Siege', 'Valorant']),
            'date_debut' => $debut,
            'date_fin' => (clone $debut)->modify('+') . fake()->numberBetween(1, 7) . ' days',
            'bourse' => fake()->randomFloat(2, 1000, 10000),
            'nb_equipes' => fake()->numberBetween(4, 8, 12),
        ];
    }
}
