<div id="like-button-{{ $post->id }}">
    @csrf
    @if($post->likes()->where('user_id', Auth::id())->exists())
        <button
            hx-delete="{{ route('unlike.post', $post->id) }}"
            hx-target="#like-button-{{ $post->id }}"
            hx-swap="outerHTML"
            class="btn btn-primary">
            Unlike
        </button>
    @else
        <button
            hx-post="{{ route('like.post', $post->id) }}"
            hx-target="#like-button-{{ $post->id }}"
            hx-swap="outerHTML"
            class="btn btn-outline btn-primary">
            Like
        </button>
    @endif
    <span>{{ $post->likes()->count() }} Likes</span>
</div>