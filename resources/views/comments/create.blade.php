<form action="{{ route('comments.create', $post_id) }}">


    <textarea name="comment" id="comment" class="textarea textarea-primary textarea-lg w-full max-w-xs"
        placeholder="Type here ...."></textarea>
    <button class="btn btn-primary" type="submit"> >> </button>
</form>
