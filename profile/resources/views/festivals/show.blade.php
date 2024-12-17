<x-app-layout>
    <h1 class="mt-5 text-3xl text-center">Busreizen</h1>
    <div class="mt-5 mx-auto w-3/4 grid grid-cols-3 gap-5">
            @foreach ($buses as $bus)
                    <div class="w-auto bg-amber-50 p-4 text-center border border-dashed border-gray-900 rounded">
                        <h2 class="font-bold">Festival Naam: {{$festival?->title ?? 'Geen festival gekoppeld' }}</h2>
                        <p>Bus Vertrektijd: {{ $bus->leaves_at }}</p>
                        <p>Prijs: ${{$bus->ticket_price}}</p>
                    </div>
            @endforeach
    </div>
</x-app-layout>
