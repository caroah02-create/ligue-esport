@if (session('succes'))
    <div class="bg-green-50 border border-green-300 text-green-800 rounded p-3 mb-6">
        {{ session('succes') }}
    </div>
@endif