@props(['equipe'])

<a href="/equipes/{{ $equipe->id }}" class="block bg-white rounded p-4 mb-3 shadow hover:bg-slate-50">
    <p class="font-bold">{{ $equipe->nom }} [{{ $equipe->tag }}]</p>
    <p class="text-sm text-slate-600">
        {{ $equipe->ville }}
        @isset($equipe->joueurs_count)
            · {{ $equipe->joueurs_count }} joueurs
        @endisset
    </p>
</a>