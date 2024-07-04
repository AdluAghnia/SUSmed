<div id="comment-section-{{ $post->id }}">
    <form method="post" hx-post="{{ route('comment.store', $post->id) }}"
        hx-target="#show-all-comments-{{ $post->id }}" hx-swap="beforeend" class="mb-4">
        @csrf
        <label for="comment" class="block text-gray-700 dark:text-gray-200">Comment</label>
        <input type="text" name="comment" id="comment"
            class="block mt-1 mb-2 w-full bg-gray-100 rounded-md border-transparent dark:text-gray-200 dark:bg-gray-700 focus:bg-white focus:border-gray-500 dark:focus:bg-gray-600">
        <x-input-error :messages="$errors->get('comment')" class="mt-2" />

        <div class="flex justify-end">
            <button type="submit" class="btn btn-outline btn-primary">Comment</button>
        </div>
    </form>

    <div id="show-all-comments-{{ $post->id }}" class="mt-2">
        <a href="#" hx-get="{{ route('comments.index', $post->id) }}"
            hx-target="#show-all-comments-{{ $post->id }}" hx-swap="innerHTML"
            class="text-blue-500 hover:underline">
            Show all comments...
        </a>
    </div>
</div>

<!-- This is the container for all comments -->
<div id="comments-container-{{ $post->id }}">
    @include('partials.comments', ['comments' => $post->comments])
</div>
