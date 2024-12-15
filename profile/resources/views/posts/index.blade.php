<x-app-layout>
    <h1 class="mt-5 text-3xl text-center">Festivals</h1>
    <div class="mt-5 mx-auto w-1/2 bg-amber-50 p-4 text-center border border-gray-900 rounded">
        <form method="post" action="{{route('posts.store')}}" >@csrf
            Title:<hr>
            <input type="text" name="title">
            <hr>
            Content:<hr>
            <textarea name="content"></textarea><br>
            <button class="bg-white p-1 text-center border border-gray-900 rounded" type="submit">Add</button>
        </form>
    </div>
<div class="mt-5 mx-auto w-3/4 grid grid-cols-3 gap-5">
    @foreach($posts as $post)
        <div class="w-auto bg-amber-50 p-4 text-center border border-dashed border-gray-900 rounded">
        <p>{{$post->title}}</p>
        <p>{{$post->content}}</p>
        <p>{{$post->user_id}}</p>
            <a href="/{{ $post->id }}/more">Get more information</a>
            <a href="/{{ $post->id }}/edit">Edit</a>
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    @endforeach
</div>
</x-app-layout>
