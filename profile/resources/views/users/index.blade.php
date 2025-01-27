<x-app-layout>
    <h1 class="mt-5 mb-5 text-3xl text-center text-gray-100">User Information</h1>
{{--code dat wordt gebruikt voor grotere schermen--}}
    <div class="overflow-x-auto mt-10 px-4 py-6 rounded-lg bg-gray-700 max-w-7xl mx-auto">
        <table class="min-w-full text-sm text-left text-gray-400 hidden sm:table">
            <thead class="bg-gray-600 text-gray-300">
            <tr>
                <th scope="col" class="px-6 py-3">ID</th>
                <th scope="col" class="px-6 py-3">Name</th>
                <th scope="col" class="px-6 py-3">Email</th>
                <th scope="col" class="px-6 py-3">Created at</th>
                <th scope="col" class="px-6 py-3">Points</th>
                <th scope="col" class="px-6 py-3">Booked Buses</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr class="bg-gray-800 border-b border-gray-700 hover:bg-gray-600">
                    <td class="px-6 py-4">{{ $user->id }}</td>
                    <td class="px-6 py-4">{{ $user->name }}</td>
                    <td class="px-6 py-4">{{ $user->email }}</td>
                    <td class="px-6 py-4">{{ $user->created_at->format('Y-m-d H:i:s') }}</td>
                    <td class="px-6 py-4">{{ $user->points }}</td>
                    <td class="px-6 py-4">
                        @if ($user->buses->isEmpty())
                            <span class="text-gray-500">No booked buses</span>
                        @else
                            <ul class="list-disc list-inside space-y-2">
                                @foreach ($user->buses as $bus)
                                    <li>
                                        <strong>Bus ID:</strong> {{ $bus->id }} <br>
                                        <strong>Departure:</strong> {{ $bus->departure_from }} <br>
                                        <strong>Destination:</strong> {{ $bus->destination }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

{{--als het scherm klein is wordt deze code gebruikt om het responsive te maken--}}
        <div class="sm:hidden">
            @foreach($users as $user)
                <div class="bg-gray-800 p-4 mb-4 rounded-lg shadow-md text-gray-300">
                    <p><strong>ID:</strong> {{ $user->id }}</p>
                    <p><strong>Name:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Created At:</strong> {{ $user->created_at->format('Y-m-d H:i:s') }}</p>
                    <p><strong>Points:</strong> {{ $user->points }}</p>
                    <div class="mt-2 space-y-2">
                        <strong class="text-gray-300">Booked Buses:</strong>
                        @if ($user->buses->isEmpty())
                            <p class="text-gray-500">No booked buses</p>
                        @else
                            <ul class="list-disc list-inside text-gray-300 space-y-2">
                                @foreach ($user->buses as $bus)
                                    <li>
                                        <strong>Bus ID:</strong> {{ $bus->id }} <br>
                                        <strong>Departure:</strong> {{ $bus->departure_from }} <br>
                                        <strong>Destination:</strong> {{ $bus->destination }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
