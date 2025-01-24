<x-app-layout>
    <h1 class="mt-5 mb-5 text-3xl text-center text-gray-100">Festivals</h1>
    @if (session('success'))
        <div class="w-1/4 mx-auto bg-green-200 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    <form class="max-w-sm mx-auto" method="post" action="{{route('festivals.store')}}">@csrf
        <div class="mb-5">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Festival Title</label>
            <input type="text" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Festival name" required />
        </div>
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Festival Information</label>
        <textarea name="content" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Type festival information here..."></textarea>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 mt-6 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Festival</button>
    </form>
</x-app-layout>
