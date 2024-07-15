@if ($errors)
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
@endif

@include('comments.showAll', ['comments' => $comments])
