<?php

namespace App\Http\Controllers;

use App\Models\Tournoi;
use App\Models\Equipe;
use App\Http\Requests\TournoiRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class TournoiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $tournois = Tournoi::withCount('equipes')->orderByDesc('date_debut')->paginate(10);

        return view('tournois.index', ['tournois' => $tournois]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('tournois.create', [
            'tournoi' => new Tournoi(),
            'equipes' => Equipe::withCount('joueurs')->orderBy('nom')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TournoiRequest $requete): RedirectResponse
    {
        $tournoi = Tournoi::create($requete->validated());
        $tournoi->equipes()->sync($requete->input('equipes', []));

        return redirect()
            ->route('tournois.index')
            ->with('succes', "Le tournoi « {$tournoi->nom} » a été créé.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Tournoi $tournoi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tournoi $tournoi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tournoi $tournoi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tournoi $tournoi)
    {
        //
    }
}
