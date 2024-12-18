<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
                <div class="p-6 text-gray-900">
                    <p>Here are your currently booked trips:</p>
                    @foreach ($buses as $bus)
                        <div class="w-auto bg-amber-50 p-4 text-center border border-dashed border-gray-900 rounded mb-4">
                            <p>Bus Vertrektijd: {{ $bus->leaves_at }}</p>
                            <p>Prijs: €{{ $bus->ticket_price }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
