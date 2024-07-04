<div>
    @forelse($comments ?? [] as $comment)
        <div class="mb-4 comment-item">
            <p class="text-gray-700 dark:text-gray-300">{{ $comment->user->name }}: {{ $comment->comment }}</p>
        </div>
    @empty
        <p class="text-gray-500 dark:text-gray-400">No comments yet.</p>
    @endforelse
</div>
