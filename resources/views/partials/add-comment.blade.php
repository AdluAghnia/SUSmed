<div id="comment-form">
    <form method="post" action="{{ route('comment.store', $post->id) }}" class="mb-4">
        @csrf
       <label for="comment" class="block text-gray-700 dark:text-gray-200">Comment</label>
       <input type="text" name="comment" id="comment" class="mb-2 mt-1 block w-full rounded-md bg-gray-100 dark:bg-gray-700 border-transparent focus:border-gray-500 focus:bg-white dark:focus:bg-gray-600 dark:text-gray-200">
       <x-input-error :messages="$errors->get('comment')" class="mt-2" />
       
       <div class="mt-2">
            <a href="#" 
             hx-get="{{ route('comments.index', $post->id) }}" 
             hx-target="#show-all-comments-{{ $post->id }}" 
             hx-swap="outerHTML"
             class="text-blue-500 hover:underline">
             Show all comments...
            </a>
       </div>
       
       <div class="flex justify-end">
            <button type="submit" class="btn btn-outline btn-primary">Comment</button>
       </div>

       <div id="show-all-comments-{{ $post->id }}"></div>

    </form>
</div>