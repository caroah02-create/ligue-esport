<?php

use App\Models\Equipe;
use App\Models\Tournoi;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('accueil');
});

Route::get('/', function () {
    $equipes = Equipe::withCount('joueurs')->inRandomOrder()->take(3)->get();

    $tournois = Tournoi::withCount('equipes')
        ->where('date_debut', '>', today())
        ->orderBy('date_debut')
        ->take(5)
        ->get();

    return view('accueil', [
    'equipes' => $equipes,
    'tournois' => $tournois,
    ]);
});

Route::get('/equipes', function () {
    $equipes = Equipe::withCount('joueurs')->orderBy('nom')->paginate(8);
    return view('equipes.index', ['equipes' => $equipes]);
});

Route::get('/equipes/{equipe}', function (Equipe $equipe) {
    $equipe->load(['joueurs', 'tournois']);
    return view('equipes.show', ['equipe' => $equipe]);
});

