<?php

namespace Database\Seeders;

use App\Models\Equipe;
use App\Models\Joueur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class JoueurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Equipe::all() as $equipe) {
            Joueur::factory()->count(3, 7)->for($equipe)->create();
        }
    }
}
