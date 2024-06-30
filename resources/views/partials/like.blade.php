<div id="like-button-{{ $post->id }}">
    @csrf
    @if($post->likes()->where('user_id', Auth::id())->exists())
        <button
            hx-delete="{{ route('unlike.post', $post->id) }}"
            hx-target="#like-button-{{ $post->id }}"
            hx-swap="outerHTML"
            class="py-2 px-4 rounded bg-red-500 text-white">
            Unlike
        </button>
    @else
        <button
            hx-post="{{ route('like.post', $post->id) }}"
            hx-target="#like-button-{{ $post->id }}"
            hx-swap="outerHTML"
            class="py-2 px-4 rounded bg-gray-500 text-white">
            Like
        </button>
    @endif
    <span>{{ $post->likes()->count() }} Likes</span>
</div>