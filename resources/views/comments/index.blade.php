<x-app-layout>
    <!-- Post Details -->
    <div class="py-12">

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <div class="container p-4 mx-auto max-w-2xl">
                <div class="p-4 mx-auto mb-6 w-full bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <div class="mb-4">
                        <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                            {{ $post->user->name }}
                        </h3>
                    </div>
                    <div class="mb-4">
                        <p class="text-gray-600 dark:text-gray-400">{{ $post->caption }}</p>
                    </div>
                    @if ($post->image)
                        <div class="mb-4">
                            <a href="{{ route('posts.show', $post) }}">
                                <img class="w-full h-auto rounded" src="{{ asset('storage/posts/' . $post->image) }}"
                                    alt="post_image">
                            </a>
                        </div>
                    @endif
                    <div id="like-button-{{ $post->id }}">
                        @include('partials.like', ['post' => $post])
                    </div>
                    <div class="btn btn-primary" id="comment-form" hx-get="{{ route('comments.create', $post_id) }}"
                        hx-swap="outerHTML" hx-target="#comment-form">
                        Add Comment
                    </div>


                    <div id="comments-list">
                        @forelse ($comments as $comment)
                            <p class="p-2"></p>
                            <div class="chat-header">
                                {{ $comment->user->name }}
                            </div>
                            <div class="chat chat-start">
                                <div class="chat-bubble chat-bubble-primary">{{ $comment->comment }}</div>
                            </div>
                        @empty
                            <span>No Comment</span>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
