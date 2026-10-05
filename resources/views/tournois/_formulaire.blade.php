<div class="mb-4">
    <label class="block font-bold mb-1">Nom</label>
    <input name="nom" value="{{ old('nom', $tournoi->nom) }}"
           class="w-full border rounded p-2 @error('nom') border-red-500 @enderror">
    @error('nom') <p class="text-red-700 text-sm">{{ $message }}</p> @enderror
</div>
<div class="mb-4">
    <label class="block font-bold mb-1">Jeu</label>
    <input name="jeu" value="{{ old('jeu', $tournoi->jeu) }}"
           class="w-full border rounded p-2 @error('jeu') border-red-500 @enderror">
    @error('jeu') <p class="text-red-700 text-sm">{{ $message }}</p> @enderror
</div>
<div class="mb-4">
    <label class="block font-bold mb-1">Date de début</label>
    <input type="date" name="date_debut" value="{{ old('date_debut', $tournoi->date_debut?->format('Y-m-d')) }}"
           class="w-full border rounded p-2 @error('date_debut') border-red-500 @enderror">
    @error('date_debut') <p class="text-red-700 text-sm">{{ $message }}</p> @enderror
</div>
<div class="mb-4">
    <label class="block font-bold mb-1">Date de fin</label>
    <input type="date" name="date_fin" value="{{ old('date_fin', $tournoi->date_fin?->format('Y-m-d')) }}"
           class="w-full border rounded p-2 @error('date_fin') border-red-500 @enderror">
    @error('date_fin') <p class="text-red-700 text-sm">{{ $message }}</p> @enderror
</div>
<div class="mb-4">
    <label class="block font-bold mb-1">Bourse</label>
    <input name="bourse" type="number" step="0.01" min="0" value="{{ old('bourse', $tournoi->bourse) }}"
           class="w-full border rounded p-2 @error('bourse') border-red-500 @enderror">
    @error('bourse') <p class="text-red-700 text-sm">{{ $message }}</p> @enderror
</div>
<div class="mb-4">
    <label class="block font-bold mb-1">Nombre d'équipes maximum</label>
    <input name="nb_equipes_max" type="number" min="2" value="{{ old('nb_equipes_max', $tournoi->nb_equipes_max) }}"
           class="w-full border rounded p-2 @error('nb_equipes_max') border-red-500 @enderror">
    @error('nb_equipes_max') <p class="text-red-700 text-sm">{{ $message }}</p> @enderror
</div>
@php
    $choisies = old('equipes', $tournoi->exists ? $tournoi->equipes->pluck('id')->all() : []);
@endphp

<fieldset class="mb-4">
    <legend class="font-bold mb-2">Équipes inscrites</legend>
    @forelse ($equipes as $equipe)
        <label class="block">
            <input type="checkbox" name="equipes[]" value="{{ $equipe->id }}"
                   @checked(in_array($equipe->id, $choisies))>
            {{ $equipe->nom }} ({{ $equipe->joueurs_count }} joueurs)
        </label>
    @empty
        <p class="text-slate-600">Aucune équipe disponible.</p>
    @endforelse
    @error('equipes.*') <p class="text-red-700 text-sm">{{ $message }}</p> @enderror
</fieldset>