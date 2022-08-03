<div class="card shadow-sm mx-3 mb-3">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <div class="d-flex">
                <div>
                    <img src="{{ $comment->user->avator }}" height="50" width="50"
                        class="rounded-circle border border-2 border-secondary" alt="">
                </div>
                <div class="ms-3">
                    <h6>{{ $comment->user->name }}</h6>
                    <p class="text-secondary">{{ $comment->created_at->diffForHumans() }}</p>
                </div>
            </div>
            <div>
                @if (auth()->id() == $comment->user->id)
                <form action="/post/{{$comment->post->slug}}/comments/delete/comment/{{auth()->user()->username}}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn border border-0"><i class="fa-solid fa-trash-can bell"></i></button>
                </form>
                @endif

            </div>
        </div>
        <p>{{$comment->body}}</p>
    </div>
</div>
