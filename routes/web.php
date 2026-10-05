<?php

use App\Models\Equipe;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('accueil');
});

Route::get('/equipes', function () {
    $equipes = Equipe::withCount('joueurs')->orderBy('nom')->paginate(8);
    return view('equipes.index', compact('equipes'));
});

