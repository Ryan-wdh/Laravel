<x-app-layout>
    <div class="container h-100 w-1/2 mt-5 bg-gray-500">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-20 col-md-8 col-lg-6">
                <h3>Update Post</h3>
                <form action="{{ route('festivals.update', $festival->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title"
                               value="{{ $festival->title }}" required>
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" id="content" name="content" rows="7" cols="50" required>{{ $festival->body }}</textarea>
                    </div>
                    <button type="submit" class="btn mt-3 btn-primary">Update Festival</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
