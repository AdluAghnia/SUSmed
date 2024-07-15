<div id="comments-list" class="max-h-24 overflow-auto">
    @forelse ($comments as $comment)
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
