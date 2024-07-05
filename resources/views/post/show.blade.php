<x-app-layout>
    <div class="p-4 mx-auto mb-6 w-full bg-white rounded-lg shadow-md dark:bg-gray-800">
        <div class="mb-4">
            <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $post->user->name }}
            </h3>
        </div>
        <div class="mb-4">
            <p class="text-gray-600 dark:text-gray-400">{{ $post->caption }}</p>
        </div>
        @if ($post->image)
            <div class="mb-4">
                <img class="w-full h-auto rounded" src="{{ asset('storage/posts/' . $post->image) }}" alt="post_image">
            </div>
        @endif
        <div id="like-button-{{ $post->id }}">
            @include('partials.like', ['post' => $post])
        </div>
        <div id="comment-form">
            @include('partials.add-comment', ['post' => $post])
        </div>
    </div>
</x-app-layout>
