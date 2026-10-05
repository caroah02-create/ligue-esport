<?php

namespace Database\Seeders;

use App\Models\Equipe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $equipes = [
            ['nom' => 'Les Harfangs', 'tag' => 'HAR', 'ville' => 'Québec', 'description' => 'Champions en titre de la ligue.'],
            ['nom' => 'Le Blizzard', 'tag' => 'BLZ', 'ville' => 'Montréal', 'description' => 'Une équipe reconnue pour son jeu défensif.'],
            ['nom' => 'DarkZero', 'tag' => 'DAZ', 'ville' => 'Trois-Rivières', 'description' => 'Anciens champions en titre de la ligue.'],
            ['nom' => 'Fame Clan', 'tag' => 'FCL', 'ville' => 'Sherbrooke', 'description' => 'Une équipe reconnue pour son jeu support.'],
            ['nom' => 'G4 Esports', 'tag' => 'G4E', 'ville' => 'Saint-Hyacinthe', 'description' => 'Une équipe reconnue pour son jeu versatil.'],
            ['nom' => 'Top Liquid', 'tag' => 'TLQ', 'ville' => 'Shawinigan', 'description' => 'Une équipe reconnue pour son jeu attaquant.'],
        ];

        foreach ($equipes as $equipe) {
            \App\Models\Equipe::create($equipe);
        }

        Equipe::factory()->count(14)->create();
    }
}
