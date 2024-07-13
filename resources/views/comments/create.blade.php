<form class="flex" hx-post="{{ route('comments.store', $post_id) }}" hx-swap="outerHTML" hx-target="#comments-list">
    <input name="comment" id="comment" type="text" placeholder="Type here"
        class="input input-bordered input-primary w-full max-w-lg dark:bg-gray-700 mb-3 rounded border-2 border-indigo-500" />
    <x-input-error :messages="$errors->get('comment')" class="mt-2" />
    <button class="justify-end ml-4 btn btn-primary text-lg" type="submit"> >> </button>
</form>
