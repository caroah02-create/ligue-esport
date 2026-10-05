<x-layout>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Les tournois</h1>
        <a href="{{ route('tournois.create') }}" class="bg-slate-900 text-white px-4 py-2 rounded">Nouveau tournoi</a>
    </div>

    <table class="w-full bg-white shadow rounded">
        <thead class="bg-slate-200 text-left">
            <tr>
                <th class="p-3">Tournoi</th>
                <th class="p-3">Jeu</th>
                <th class="p-3">Dates</th>
                <th class="p-3">Statut</th>
                <th class="p-3">Équipes</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tournois as $tournoi)
                <tr class="border-t">
                    <td class="p-3">
                        <a href="{{ route('tournois.show', $tournoi) }}" class="font-bold hover:underline">{{ $tournoi->nom }}</a>
                    </td>
                    <td class="p-3">{{ $tournoi->jeu }}</td>
                    <td class="p-3">{{ $tournoi->date_debut->format('d/m/Y') }} au {{ $tournoi->date_fin->format('d/m/Y') }}</td>
                    <td class="p-3">{{ $tournoi->statut }}</td>
                    <td class="p-3">{{ $tournoi->equipes_count }} / {{ $tournoi->nb_equipes_max }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="p-3 text-slate-600">Aucun tournoi pour le moment.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-6">
        {{ $tournois->links() }}
    </div>
</x-layout>