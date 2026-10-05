<x-layout>
    <h1 class="text-3xl font-bold">{{ $tournoi->nom }}</h1>
    <p class="text-slate-600 mb-6">
        {{ $tournoi->jeu }} · du {{ $tournoi->date_debut->format('d/m/Y') }} au {{ $tournoi->date_fin->format('d/m/Y') }}
        · {{ $tournoi->statut }}
    </p>
    <p class="mb-6">
        Bourse : {{ number_format($tournoi->bourse, 2, ',', ' ') }} $
        · {{ $tournoi->equipes->count() }} / {{ $tournoi->nb_equipes_max }} équipes
    </p>

    <h2 class="text-2xl font-bold mb-4">Équipes inscrites</h2>
    @forelse ($tournoi->equipes as $equipe)
        <div class="bg-white rounded p-3 mb-2 shadow">
            <a href="/equipes/{{ $equipe->id }}" class="font-bold hover:underline">{{ $equipe->nom }}</a>
            · Classement : {{ $equipe->pivot->classement ?? '—' }}
        </div>
    @empty
        <p class="text-slate-600">Aucune équipe inscrite à ce tournoi.</p>
    @endforelse

    <div class="flex gap-4 mt-8">
        <a href="{{ route('tournois.edit', $tournoi) }}" class="bg-slate-900 text-white px-4 py-2 rounded">Modifier</a>

        <form method="POST" action="{{ route('tournois.destroy', $tournoi) }}"
              onsubmit="return confirm('Supprimer définitivement ce tournoi ?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-700 text-white px-4 py-2 rounded">Supprimer</button>
        </form>
    </div>
</x-layout>