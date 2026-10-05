<x-layout>
    <h1 class="text-3xl font-bold">{{ $equipe->nom }} [{{ $equipe->tag }}]</h1>
    <p class="text-slate-600 mb-2">{{ $equipe->ville }}</p>
    <p class="mb-8">{{ $equipe->description }}</p>

    <h2 class="text-2xl font-bold mb-4">Joueurs</h2>
    @forelse ($equipe->joueurs as $joueur)
        <div class="bg-white rounded p-3 mb-2 shadow">
            <span class="font-bold">{{ $joueur->pseudo }}</span>
            — {{ $joueur->nom }}, {{ $joueur->role }}, {{ $joueur->age }} ans
        </div>
    @empty
        <p class="text-slate-600">Cette équipe n'a aucun joueur.</p>
    @endforelse

    <h2 class="text-2xl font-bold mt-8 mb-4">Tournois</h2>
    @forelse ($equipe->tournois as $tournoi)
        <div class="bg-white rounded p-3 mb-2 shadow">
            <span class="font-bold">{{ $tournoi->nom }}</span>
            — {{ $tournoi->jeu }}, {{ $tournoi->statut }}
            · Classement : {{ $tournoi->pivot->classement ?? '—' }}
        </div>
    @empty
        <p class="text-slate-600">Cette équipe n'a participé à aucun tournoi.</p>
    @endforelse
</x-layout>