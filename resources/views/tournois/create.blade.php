<x-layout>
    <h1 class="text-3xl font-bold mb-6">Nouveau tournoi</h1>

    <form method="POST" action="{{ route('tournois.store') }}" class="bg-white p-6 rounded shadow">
        @csrf
        @include('tournois._formulaire')
        <button type="submit" class="bg-slate-900 text-white px-4 py-2 rounded">Créer le tournoi</button>
    </form>
</x-layout>