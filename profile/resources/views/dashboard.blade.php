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
                    @foreach ($buses as $bus)
                        <div class="w-auto bg-gray-500 p-4 text-center border border-dashed border-gray-900 rounded mb-4">
                            <p>Festival titel: {{ $bus->title }}</p>
                            <p>Bus Vertrektijd: {{ $bus->leaves_at }}</p>
                            <p>Prijs: €{{ $bus->ticket_price }}</p>
                            {{$bus->festivals_id}}
                        </div>
                    @endforeach
                    <form class="max-w-sm mx-auto" method="post" action="{{route('users.store')}}">@csrf
                    <div class="mt-4">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_admin" value="1" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <span class="ml-2 text-sm text-gray-600">{{ __('I am a festival owner (Admin)') }}</span>
                        </label>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 mt-6 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Festival</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
