<div class="container p-4 mx-auto max-w-2xl" id="post-container">
    @forelse($posts as $post)
        <div class="p-4 mx-auto mb-6 w-full bg-white rounded-lg shadow-md dark:bg-gray-800" id="post-{{ $post->id }}">
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $post->user->name }}
                </h3>
            </div>
            <div class="mb-4">
                <p class="text-gray-600 dark:text-gray-400">{{ $post->caption }}</p>
            </div>
            @if ($post->image)
                <div class="mb-4">
                    <img class="w-full h-auto rounded" src="{{ asset('storage/posts/' . $post->image) }}"
                        alt="post_image">
                </div>
            @endif
            <div class="flex space-x-2">
                <button class="py-2 px-4 text-white bg-blue-500 rounded dark:bg-blue-700"
                    hx-get="{{ route('posts.edit', $post->id) }}"
                    hx-target="#edit-form-{{ $post->id }}">Edit</button>
                <button class="py-2 px-4 text-white bg-red-500 rounded dark:bg-red-700"
                    hx-delete="{{ route('posts.destroy', $post->id) }}"
                    hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}' hx-target="#post-container"
                    hx-swap="outerHTML">Delete</button>
            </div>
            <div id="edit-form-{{ $post->id }}"></div>
        </div>
    @empty
        <div class="text-center">
            <p class="py-2 px-4 text-white bg-red-500 rounded dark:bg-red-700">POST DIDN'T EXIST</p>
        </div>
    @endforelse
</div>
