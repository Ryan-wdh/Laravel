<x-app-layout>
    <h1 class="mt-5 text-3xl text-center text-gray-100 font-semibold">Busreizen</h1>
    @if (session('success'))
        <div class="w-1/4 mx-auto bg-green-200 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    <div class="mt-5 mx-auto grid max-w-6xl grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($buses as $bus)
            <div class="bg-gray-700 text-gray-100 p-6 rounded-lg transition-transform transform hover:scale-105">
                <h2 class="font-semibold text-lg mb-3">Festival Naam: {{$festival?->title ?? 'Geen festival gekoppeld' }}</h2>
                <p class="text-sm mb-2">Bus Vertrektijd: {{ $bus->leaves_at }}</p>
                <p class="text-sm mb-3">Prijs: €{{$bus->ticket_price}}</p>
                <p class="text-sm mb-3">Aantal Gebruikers: {{ $bus->users->count() }}</p>
                <p class="text-sm text-gray-400 mb-4">Bus ID: {{$bus->id}}</p>
                <form method="POST" action="{{ route('book.bus', ['busId' => $bus->id]) }}">
                    @csrf
                    <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-gray-100 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">Boek nu</button>
                </form>
            </div>
        @endforeach
    </div>
</x-app-layout>
