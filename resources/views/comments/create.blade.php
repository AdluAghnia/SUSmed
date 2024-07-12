<form hx-post="{{ route('comments.store', $post_id) }}" hx-swap="outerHTML" hx-target="#comments-list">
    <textarea name="comment" id="comment" class="textarea textarea-primary textarea-lg w-full max-w-xs"
        placeholder="Comment Here  ...."></textarea>
    <x-input-error :messages="$errors->get('comment')" class="mt-2" />
    <button class="btn btn-primary text-lg" type="submit"> >> </button>
</form>
