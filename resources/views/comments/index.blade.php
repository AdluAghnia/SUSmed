<x-app-layout>
    <div class="btn btn-primary" id="comment-form" hx-get="{{ route('comments.create', $post_id) }}" hx-swap="outerHTML"
        hx-target="#comment-form">
        Add Comment
    </div>

    <div id=comments-list>
        @forelse ($comments as $comment)
            <p>{{ $comment->user->name }}</p>
            <div class="p-2 mb-2 bg-white rounded shadow-md dark:bg-gray-700">
                <p>{{ $comment->comment }}</p>
            </div>
        @empty
            <span>No Comment</span>
        @endforelse
    </div>
</x-app-layout>
