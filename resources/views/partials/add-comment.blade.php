<div id="comment-form">
    <form method="post" action="{{ route('comment.store', $post->id) }}" class="mb-4">
        @csrf
       <label for="comment" class="block text-gray-700 dark:text-gray-200">Comment</label>
       <input type="text" name="comment" id="comment" class="mb-2 mt-1 block w-full rounded-md bg-gray-100 dark:bg-gray-700 border-transparent focus:border-gray-500 focus:bg-white dark:focus:bg-gray-600 dark:text-gray-200">
       <x-input-error :messages="$errors->get('comment')" class="mt-2" />
       
       <button type="submit" class="btn btn-outline btn-info">Comment</button>
    
    </form>
</div>