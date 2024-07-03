<form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="mb-4">
        <label for="caption" class="block text-sm font-medium text-gray-700">Caption</label>
        <input type="text" name="caption" id="caption" value="{{ $post->caption }}"
            class="block mt-1 w-full rounded-md border-gray-300 shadow-sm dark:text-gray-200 dark:bg-gray-700 dark:border-gray-600 focus:border-indigo-500 focus:ring-indigo-500">
    </div>
    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
        <input type="file" name="image" id="image"
            class="block mt-1 w-full text-sm text-gray-500 dark:text-gray-200 dark:bg-gray-700 dark:border-gray-600">
    </div>
    <button type="submit" class="py-2 px-4 text-white bg-green-500 rounded dark:bg-green-700">Update</button>
</form>
