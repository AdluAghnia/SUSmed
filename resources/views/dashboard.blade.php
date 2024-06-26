<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container mx-auto p-4 max-w-2xl" id="post-container">
                @forelse($posts as $post)
                <div class="bg-white shadow-md rounded-lg p-4 mb-6 dark:bg-gray-800 w-full mx-auto">
                    <div class="mb-4">
                        <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $post->user->name }}</h3>
                    </div>
                    <div class="mb-4">
                        <p class="text-gray-600 dark:text-gray-400">{{ $post->caption }}</p>
                    </div>
                @if ($post->image)
                    <div class="mb-4">
                        <img class="w-full h-auto rounded" src="{{ asset('storage/posts/' . $post->image) }}" alt="post_image" >
                    </div>
                @endif
                <button type="button" class="btn btn-info">Edit</button>
                <button type="button" class="btn btn-error">Delete</button>
                </div>
                @empty
                    <div class="text-center">
                        <p class="text-white bg-red-500 py-2 px-4 rounded dark:bg-red-700">POST DIDN'T EXIST</p>
                    </div>
                @endforelse
            </div> 
        </div>
    </div>
</x-app-layout>