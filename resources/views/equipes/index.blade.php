<x-layout>
    <h1 class="text-3xl font-bold mb-6 text-center">Les équipes</h1>

    @forelse ($equipes as $equipe)
        <x-carte-equipe :equipe="$equipe" />
    @empty
        <p class="text-slate-600">Aucune équipe pour le moment.</p>
    @endforelse

    <div class="mt-6">
        {{ $equipes->links() }}
    </div>
</x-layout>