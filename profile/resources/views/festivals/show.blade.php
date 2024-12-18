<x-app-layout>
    <h1 class="mt-5 text-3xl text-center text-gray-100">Busreizen</h1>
    @if (session('success'))
        <div class="w-1/4 mx-auto bg-green-200 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    <div class="mt-5 mx-auto w-3/4 grid grid-cols-3 gap-5">
            @foreach ($buses as $bus)
                    <div class="w-auto bg-gray-600 text-gray-100 p-4 text-center border border-dashed border-gray-900 rounded">
                        <h2 class="font-bold">Festival Naam: {{$festival?->title ?? 'Geen festival gekoppeld' }}</h2>
                        <p>Bus Vertrektijd: {{ $bus->leaves_at }}</p>
                        <p>Prijs: €{{$bus->ticket_price}}</p>
                        @foreach ($bus->users as $user)
                            <li>User ID: {{ $user->id }} | Naam: {{ $user->name }}</li>
                        @endforeach
                        <p>Bus ID:{{$bus->id}}</p>
                        <form method="POST" action="{{ route('book.bus', ['busId' => $bus->id]) /*$festival->id kan je ook gebruiken*/}}">
                            @csrf
                            <button type="submit">Boek nu</button>
                        </form>
                    </div>
            @endforeach
    </div>
</x-app-layout>
