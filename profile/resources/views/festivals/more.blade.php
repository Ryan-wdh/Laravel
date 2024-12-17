<x-app-layout>
    <h1 class="mt-5 text-3xl text-center">{{$festivals->title}}</h1>
    <div class="mt-5">
            <div class="mt-5 mx-auto w-1/2 bg-amber-50 p-4 text-center border border-gray-900 rounded">
                <p>{{$buses->id}}</p>
                <form method="post" action="{{route('festivals.store')}}" >@csrf
                    Title:<hr>
                    <input type="text" name="title" value="<p>booking 1</p>">
                    <hr>
                    <button class="bg-white p-1 text-center border border-gray-900 rounded" type="submit">Add</button>
                </form>
            </div>
    </div>
</x-app-layout>
