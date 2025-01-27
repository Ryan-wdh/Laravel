<x-app-layout>
    <div class="py-12">
        <h1 class="mt-5 mb-5 text-3xl text-center text-gray-100 font-bold">Festival Travel System</h1>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-xl font-bold mb-3">Total Points: {{ auth()->user()->points }}</h3>
                    <p class="text-gray-400">Earn more points by booking trips to festivals! Points can be redeemed for discounts and VIP perks.</p>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8">
            <h2 class="text-2xl text-gray-100 font-semibold mb-6">Your Currently Booked Trips</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                @foreach ($user->buses as $bus)
                    <div class="bg-gray-700 text-gray-100 p-6 rounded-lg transition-transform transform hover:scale-105">
                        <img class="brightness-90 rounded shadow mb-3 relative w-full h-60" src="\images\bus.jpg">
                        <h2 class="font-semibold text-lg mb-3">Festival Naam: {{ $bus->destination ?? 'Geen festival gekoppeld' }}</h2>
                        <p><strong>Bus Vertrektijd:</strong> {{ $bus->leaves_at }}</p>
                        <p><strong>From:</strong> {{ $bus->departure_from }}</p>
                        <p><strong>To:</strong> {{ $bus->destination }}</p>
                        <p><strong>Prijs:</strong> €{{ $bus->ticket_price }}</p>
                        <p class="text-sm mb-3"><strong>Aantal Gebruikers:</strong> {{ $bus->users->count() }}</p>
                        <form action="{{ route('buses.destroy', $bus->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="mt-4 mx-auto bg-red-700 text-red-100 p-3 rounded mb-4">Cancel booking</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>

