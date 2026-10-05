<x-layout>
    <h1 class="text-3xl font-bold mb-8 text-center">Bienvenue dans la ligue</h1>

    <h2 class="text-2xl font-bold mb-4">Prochains tournois</h2>
    @forelse ($tournois as $tournoi)
        <div class="bg-white rounded p-3 mb-2 shadow">
            <span class="font-bold">{{ $tournoi->nom }}</span>
            — {{ $tournoi->jeu }}, le {{ $tournoi->date_debut->format('d/m/Y') }}
            · {{ $tournoi->equipes_count }} / {{ $tournoi->nb_equipes_max }} équipes
        </div>
    @empty
        <p class="text-slate-600">Aucun tournoi à venir pour le moment.</p>
    @endforelse

    <h2 class="text-2xl font-bold mt-8 mb-4">Équipes en vedette</h2>
    @forelse ($equipes as $equipe)
        <x-carte-equipe :equipe="$equipe" />
    @empty
        <p class="text-slate-600">Aucune équipe pour le moment.</p>
    @endforelse
</x-layout>