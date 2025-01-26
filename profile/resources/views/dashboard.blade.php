<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3>Total Points: {{ auth()->user()->points }}</h3>
                    <p>Here are your currently booked trips:</p>
                    @foreach ($user->buses as $bus)
                        <div class="w-auto bg-gray-500 p-4 text-center border border-dashed border-gray-900 rounded mb-4">
                            <p>Festival titel: {{ $bus->festivals_id }}</p>
                            <p>Bus Vertrektijd: {{ $bus->leaves_at }}</p>
                            <p>From: {{ $bus->departure_from }}</p>
                            <p>To: {{ $bus->destination }}</p>
                            <p>Prijs: €{{ $bus->ticket_price }}</p>
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
        </div>
    </div>
</x-app-layout>
