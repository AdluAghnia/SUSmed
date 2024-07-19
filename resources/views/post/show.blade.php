<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Post Details') }}
        </h2>
    </x-slot>
    <div>
        <h3>{{ $post->user->name }}</h3>
        <p>{{ $post->caption }}</p>
        @if ($post->image)
            <img src="{{ asset('storage/posts/' . $post->image) }}" alt="post_image">
        @endif
    </div>

    <div>
        @include('comments.showAll', ['comments' => $comments])
    </div>
</x-app-layout>
