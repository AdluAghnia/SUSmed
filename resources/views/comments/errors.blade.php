@if ($errors)
    @foreach ($errors->all() as $error)
        <p class="text-red-300">{{ $error }}</p>
    @endforeach
@endif

@include('comments.showAll', ['comments' => $comments])
