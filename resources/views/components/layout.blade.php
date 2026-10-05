<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ligue e-sport</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 text-slate-800 min-h-screen flex flex-col">

    <nav class="bg-slate-900 text-black" color="blue">
        <div class="max-w-5xl mx-auto px-4 py-4 flex gap-6">
            <a href="/" class="font-bold">Ligue e-sport</a>
            <a href="/equipes"
                class="{{ request()->is('equipes*') ? 'text-yellow-400 font-bold' : 'hover:text-yellow-200' }}">
                Équipes
            </a>
            
        </div>
    </nav>

    <main class="max-w-5xl mx-auto px-4 py-8 flex-1 w-full">
        {{ $slot }}
    </main>

    <footer class="bg-slate-200 text-center text-sm py-3">
        Requêtes SQL : {{ $compteurSql->total }}
    </footer>

</body>
</html>