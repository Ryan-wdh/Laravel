<x-app-layout>
    <h1 class="mt-5 text-3xl text-center">Festivals</h1>
    <div class="mt-5 mx-auto w-1/2 bg-amber-50 p-4 text-center border border-gray-900 rounded">
        <form method="post" action="{{route('festivals.store')}}" >@csrf
            Title:<hr>
            <input type="text" name="title">
            <hr>
            Content:<hr>
            <textarea name="content"></textarea><br>
            <button class="bg-white p-1 text-center border border-gray-900 rounded" type="submit">Add</button>
        </form>
    </div>
<div class="mt-5 mx-auto w-3/4 grid grid-cols-3 gap-5">
    @foreach($festivals as $festival)
        <div class="w-auto bg-amber-50 p-4 text-center border border-dashed border-gray-900 rounded">
        <p>{{$festival->title}}</p>
        <p>{{$festival->content}}</p>
        <p>{{$festival->user_id}}</p>
            <a href="/{{ $festival->id }}/show">Get more information</a>
            <a href="/{{ $festival->id }}/edit">Edit</a>
            <form action="{{ route('festivals.destroy', $festival->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    @endforeach
</div>
</x-app-layout>
