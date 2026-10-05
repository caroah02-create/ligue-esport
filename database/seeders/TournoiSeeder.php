<?php

namespace Database\Seeders;

use App\Models\Equipe;
use App\Models\Tournoi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TournoiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $equipes = Equipe::has('joueurs', '>=', 5)->get();

        Tournoi::factory()->count(12)->create()->each(function ($tournoi) use ($equipes) {
            $nombre = rand(2, min($tournoi->nb_equipes_max, $equipes->count()));
            $inscrites = $equipes->random($nombre)->shuffle();

            $position = 1;
            foreach ($inscrites as $equipe) {
                $tournoi->equipes()->attach($equipe->id, [
                    'classement' => $tournoi->statut === 'Terminé' ? $position++ : null,
                ]);
            }
        });
    }
}
