<x-layout>
    <h1 class="text-3xl font-bold mb-6">Modifier « {{ $tournoi->nom }} »</h1>

    <form method="POST" action="{{ route('tournois.update', $tournoi) }}" class="bg-white p-6 rounded shadow">
        @csrf
        @method('PATCH')
        @include('tournois._formulaire')
        <button type="submit" class="bg-slate-900 text-white px-4 py-2 rounded">Enregistrer</button>
    </form>
</x-layout>