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
                @if (session('success'))
                    <div class="mt-4 mx-auto bg-green-200 text-green-800 p-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3>Total Points: {{ auth()->user()->points }}</h3>
                    <p>Here are the products you can buy with BusPoints:</p>
                </div>
            </div>
        </div>
        <div class="mt-5 mx-auto grid h-60 w-3/4 grid-cols-1 gap-5 md:grid-cols-3">
                <div class="w-auto bg-gray-600 text-gray-100 p-4 text-center border border-dashed border-gray-900 rounded">
                    <p>Here are the products you can buy with BusPoints:</p>
                    <div class="h-11.5 bg-gray-600 rounded-3xl border-2 border-gray-300 overflow-hidden">
                        <div style="width: {{ auth()->user()->points/2}}%; height: 50px; border-radius: 22px" class="bg-green-600">
                            <p class="pt-3 pl-3 text-left">{{ auth()->user()->points}}/200</p>
                        </div>
                    </div>
                    @if (Auth::user()->points >= 200)
                        {{--user heeft genoeg punten en de knop kan gebruikt worden--}}
                        <form method="POST" action="{{ route('buy.points') /*$festival->id kan je ook gebruiken*/}}">
                            @csrf
                            <input type="hidden" name="points" value="200">
                            <button type="submit" class="mt-4 mx-auto bg-green-200 text-green-800 p-3 rounded mb-4">Buy now</button>
                        </form>
                    @else
                        {{-- user heeft te weinig punten en de knop kan niet worden gebruikt--}}
                        <button class="mt-4 mx-auto bg-red-700 text-red-100 p-3 rounded mb-4 cursor-not-allowed" disabled>Not Enough Points</button>
                    @endif
                </div>
            <div class="w-auto bg-gray-600 text-gray-100 p-4 text-center border border-dashed border-gray-900 rounded">
                <p>Here are the products you can buy with BusPoints:</p>
                <div class="h-11.5 bg-gray-600 rounded-3xl border-2 border-gray-300 overflow-hidden">
                    <div style="width: {{ auth()->user()->points*2}}%; height: 50px; border-radius: 22px" class="bg-green-600">
                        <p class="pt-3 pl-3 text-left">{{ auth()->user()->points}}/50</p>
                    </div>
                </div>
                @if (Auth::user()->points >= 50)
                    {{--user heeft genoeg punten en de knop kan gebruikt worden--}}
                    <form method="POST" action="{{ route('buy.points') /*$festival->id kan je ook gebruiken*/}}">
                        @csrf
                        <input type="hidden" name="points" value="50">
                        <button type="submit" class="mt-4 mx-auto bg-green-200 text-green-800 p-3 rounded mb-4">Buy now</button>
                    </form>
                @else
                    {{-- user heeft te weinig punten en de knop kan niet worden gebruikt--}}
                    <button class="mt-4 mx-auto bg-red-700 text-red-100 p-3 rounded mb-4 cursor-not-allowed" disabled>Not Enough Points</button>
                @endif
            </div>
            <div class="w-auto bg-gray-600 text-gray-100 p-4 text-center border border-dashed border-gray-900 rounded">
                <p>Here are the products you can buy with BusPoints:</p>
                <div class="h-11.5 bg-gray-600 rounded-3xl border-2 border-gray-300 overflow-hidden">
                    <div style="width: {{ auth()->user()->points}}%; height: 50px; border-radius: 22px" class="bg-green-600">
                        <p class="pt-3 pl-3 text-left">{{ auth()->user()->points}}/100</p>
                    </div>
                </div>
                @if (Auth::user()->points >= 100)
                {{--user heeft genoeg punten en de knop kan gebruikt worden--}}
                    <form method="POST" action="{{ route('buy.points') /*$festival->id kan je ook gebruiken*/}}">
                        @csrf
                        <input type="hidden" name="points" value="100">
                        <button type="submit" class="mt-4 mx-auto bg-green-200 text-green-800 p-3 rounded mb-4">Buy now</button>
                    </form>
                @else
                {{-- user heeft te weinig punten en de knop kan niet worden gebruikt--}}
                    <button class="mt-4 mx-auto bg-red-700 text-red-100 p-3 rounded mb-4 cursor-not-allowed" disabled>Not Enough Points</button>
                @endif
            </div>
</x-app-layout>
