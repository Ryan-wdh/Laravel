<x-app-layout>
    <div class="container mx-auto mt-10 p-8 bg-gray-800 shadow-lg rounded-lg w-full max-w-xl">
        <div class="text-center mb-6">
            <h3 class="text-2xl font-semibold text-gray-100">Update Festival</h3>
        </div>
        <form action="{{ route('festivals.update', $festival->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-100">Festival Title</label>
                <input type="text" name="title" value="{{ $festival->title }}" class="w-full p-2 rounded-lg bg-gray-700 text-gray-100 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter festival name" required />
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-100">Festival Information</label>
                <textarea name="content" rows="4" class="w-full p-2 rounded-lg bg-gray-700 text-gray-100 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Type festival information here..." required>{{ $festival->content }}</textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="w-full sm:w-auto px-6 py-2 bg-blue-600 text-gray-100 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Update Festival</button>
            </div>
        </form>
    </div>
</x-app-layout>
