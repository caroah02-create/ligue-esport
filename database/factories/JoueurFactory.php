<?php

namespace Database\Factories;

use App\Models\Equipe;
use App\Models\Joueur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Joueur>
 */
class JoueurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'equipe_id' => Equipe::factory(),
            'pseudo' => fake()->unique()->userName(),
            'nom' => fake()->name(),
            'date_naissance' => fake()->dateTimeBetween('-30 years', '-16 years'),
            'role' => fake()->randomElement(['Attaquant', 'Défenseur', 'Support']),
        ];
    }
}
