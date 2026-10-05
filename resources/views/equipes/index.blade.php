<x-layout>
    <h1 class="text-3xl font-bold mb-6">Les équipes</h1>

    @forelse ($equipes as $equipe)
        <div class="bg-white rounded p-4 mb-3 shadow">
            <p class="font-bold">{{ $equipe->nom }} [{{ $equipe->tag }}]</p>
            <p class="text-sm text-slate-600">{{ $equipe->ville }} · {{ $equipe->joueurs_count }} joueurs</p>
        </div>
    @empty
        <p class="text-slate-600">Aucune équipe pour le moment.</p>
    @endforelse

    <div class="mt-6">
        {{ $equipes->links() }}
    </div>
</x-layout>