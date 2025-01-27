<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg text-center">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-semibold mb-2">Your BusPoints</h2>
                    <p class="text-gray-400">Here you can view your total points and explore the products you can redeem with them.</p>
                </div>
                @if (session('success'))
                    <div class="max-w-44 bg-green-200 text-green-800 p-3 rounded mx-auto">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-xl font-bold mb-1">Total Points:</h3>
                    <p class="text-lg text-green-200 font-semibold">{{ auth()->user()->points }}</p>
                    <p class="text-gray-400 mt-2">Below are the products you can buy with your BusPoints:</p>
                </div>
            </div>

        <div class="mt-5 mx-auto grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 max-w-5xl">
            <div class="bg-gray-700 text-gray-100 p-5 text-center border border-dashed border-gray-900 rounded-lg shadow-md">
                <img class="rounded-lg shadow mb-4 mx-auto w-full h-40 object-cover" src="/images/gold.jpg" alt="Gold Membership">
                <h3 class="font-semibold text-lg">30-day VIP</h3>
                <div class="relative mt-3 h-5 bg-gray-600 rounded-3xl border border-gray-500">
                    <div style="width: {{ min(auth()->user()->points / 2, 100) }}%;" class="absolute h-full bg-green-600 rounded-3xl"></div>
                    <p class="absolute top-0 left-2 text-sm text-gray-200">
                        {{ auth()->user()->points }}/200
                    </p>
                </div>
                @if (auth()->user()->points >= 200)
                    <form method="POST" action="{{ route('buy.points') }}">
                        @csrf
                        {{--user heeft genoeg punten en de knop kan gebruikt worden--}}
                        <input type="hidden" name="points" value="200">
                        <button type="submit" class="mt-4 bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-lg">Buy now</button>
                    </form>
                @else
                    {{-- user heeft te weinig punten en de knop kan niet worden gebruikt--}}
                    <button class="mt-4 bg-red-600 text-white py-2 px-4 rounded-lg cursor-not-allowed" disabled>Not Enough Points</button>
                @endif
            </div>
            <div class="bg-gray-700 text-gray-100 p-5 text-center border border-dashed border-gray-900 rounded-lg shadow-md">
                <img class="rounded-lg shadow mb-4 mx-auto w-full h-40 object-cover" src="/images/discount.jpg" alt="Discount">
                <h3 class="font-semibold text-lg">25% Discount on Next Booking</h3>
                <div class="relative mt-3 h-5 bg-gray-600 rounded-3xl border border-gray-500">
                    <div style="width: {{ min(auth()->user()->points * 2, 100) }}%;" class="absolute h-full bg-green-600 rounded-3xl"></div>
                    <p class="absolute top-0 left-2 text-sm text-gray-200">
                        {{ auth()->user()->points }}/50
                    </p>
                </div>
                @if (auth()->user()->points >= 50)
                    <form method="POST" action="{{ route('buy.points') }}">
                        @csrf
                        <input type="hidden" name="points" value="50">
                        <button type="submit" class="mt-4 bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-lg">Buy now</button>
                    </form>
                @else
                    <button class="mt-4 bg-red-600 text-white py-2 px-4 rounded-lg cursor-not-allowed" disabled>Not Enough Points</button>
                @endif
            </div>
            <div class="bg-gray-700 text-gray-100 p-5 text-center border border-dashed border-gray-900 rounded-lg shadow-md">
                <img class="rounded-lg shadow mb-4 mx-auto w-full h-40 object-cover" src="/images/discount2.jpg" alt="Discount">
                <h3 class="font-semibold text-lg">50% Discount on Next Booking</h3>
                <div class="relative mt-3 h-5 bg-gray-600 rounded-3xl border border-gray-500">
                    <div style="width: {{ min(auth()->user()->points, 100) }}%;" class="absolute h-full bg-green-600 rounded-3xl"></div>
                    <p class="absolute top-0 left-2 text-sm text-gray-200">
                        {{ auth()->user()->points }}/100
                    </p>
                </div>
                @if (auth()->user()->points >= 100)
                    <form method="POST" action="{{ route('buy.points') }}">
                        @csrf
                        {{--user heeft genoeg punten en de knop kan gebruikt worden--}}
                        <input type="hidden" name="points" value="100">
                        <button type="submit" class="mt-4 bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-lg">Buy now</button>
                    </form>
                @else
                    {{-- user heeft te weinig punten en de knop kan niet worden gebruikt--}}
                    <button class="mt-4 bg-red-600 text-white py-2 px-4 rounded-lg cursor-not-allowed" disabled>Not Enough Points</button>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
