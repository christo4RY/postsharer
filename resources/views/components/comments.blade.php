@foreach ($comments as $comment)
    <x-comment :comment="$comment" />
@endforeach
{{$comments->links()}}
