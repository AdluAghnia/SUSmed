<x-app-layout>
    <x-slot name="header">
        <div class="flex mb-4" id="new-post-form">
            <a href="#" hx-get="{{ route('posts.create') }}" hx-target="#new-post-form" hx-swap="outerHTML"
                class="btn btn-primary">
                NEW POST
            </a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="container p-4 mx-auto max-w-2xl" id="post-container">
                @forelse($posts as $post)
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
                                <a href="{{ route('posts.show', $post) }}">
                                    <img class="w-full h-auto rounded"
                                        src="{{ asset('storage/posts/' . $post->image) }}" alt="post_image">
                                </a>

                            </div>
                        @endif
                        <div id="like-button-{{ $post->id }}">
                            @include('partials.like', ['post' => $post])
                        </div>
                        <div class="btn btn-primary" id="comment-button">
                            <a class="btn btn-primary" href="{{ route('comments.index', $post->id) }}">
                                Comment
                            </a>

                        </div>
                    </div>
                @empty
                    <div class="text-center">
                        <p class="py-2 px-4 text-white bg-red-500 rounded dark:bg-red-700">POST DIDN'T EXIST</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
