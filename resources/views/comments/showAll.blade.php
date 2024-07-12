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
