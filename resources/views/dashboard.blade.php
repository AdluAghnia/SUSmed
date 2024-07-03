<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
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
                                <img class="w-full h-auto rounded" src="{{ asset('storage/posts/' . $post->image) }}"
                                    alt="post_image">
                            </div>
                        @endif

                        <button hx-get="{{ route('posts.edit', $post->id) }}"
                            hx-target="#edit-form-{{ $post->id }}">
                            edit
                        </button>

                        <button hx-delete="{{ route('post.delete') }}" hx-target="closest div"
                            hx-swap="outerHTML">Delete</button>
                        <div id="edit-form-{{ $post->id }}">

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
