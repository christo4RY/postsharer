@foreach ($userPosts as $userPost)
<div class="card shadow-sm my-3">
    <div class="card-body">
        <div class="d-flex">
            <div>
                <img class="profilepostImg mt-2" src='{{"/storage/".$userPost->user->avator }}' alt="">

            </div>
            <div class="ms-3">
                <h6 class="my-2">{{ $userPost->user->name }}</h6>
                <small class="text-secondary">Publish at -
                    {{ $userPost->created_at->diffForHumans() }}</small>
            </div>
        </div>
    </div>
    <x-post-card-body class="mx-3" :post="$userPost" />
    <div class="d-flex justify-content-end me-3 my-2">
        <a href="/post/{{ $userPost->slug }}" class="btn btn-primary">See More</a>
    </div>
</div>
@endforeach
{{$userPosts->links()}}
