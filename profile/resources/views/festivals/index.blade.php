<x-app-layout>
    <h1 class="mt-5 mb-5 text-3xl text-center text-gray-100">Festivals</h1>
    <form class="max-w-md mx-auto md:w-full w-11/12" method="GET" action="{{route('festivals.index')}}">
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
        </div>
        <input class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="search" placeholder="Search festivals...  ">
        <x-primary-button class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</x-primary-button>
        </div>
    </form>
    <div class="mt-5 mx-auto grid w-3/4 grid-cols-1 gap-5 md:grid-cols-3">
    @foreach($festivals as $festival)
        <div class="w-auto bg-gray-600 text-gray-100 p-4 text-center border border-gray-900 rounded">
        <img class="brightness-90 rounded shadow mb-3 relative w-full h-60"  src="\images\{{$festival->title}}.jpg">
        <p class="font-bold mb-4">{{$festival->title}}</p>
        <p class="mb-4">{{$festival->content}}</p>
            <x-primary-button><a href="/{{ $festival->id }}/show">Show available buses</a></x-primary-button>
            <br>
            @if (Auth::user()->is_admin)
                <div class="flex space-x-2 mt-4 justify-center">
                    <a class="bg-blue-200 text-blue-800 p-1 w-16 rounded" href="/{{ $festival->id }}/edit">Edit</a>
                    <form method="POST" action="{{ route('festivals.destroy', $festival->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-700 text-red-100 p-1 w-16 rounded" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            @endif
        </div>
    @endforeach
</x-app-layout>
