<div>
    @forelse ($comments as $comment)
        <p>{{ $comment->user->name }}</p>
        <div class="p-2 mb-2 bg-white rounded shadow-md dark:bg-gray-700">
            <p>{{ $comment->comment }}</p>
        </div>
    @empty
        <span>No Commnent</span>
    @endforelse
</div>
