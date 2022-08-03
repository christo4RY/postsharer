<div {{$attributes->merge(['class'=>'card shadow-md mb-4'])}}>
    <div class="card-body">
        <div class="flex-div">
            <div>
                <a href="/posts/users/{{$post->user->username}}/profile">
                    <img src='{{"/storage/".$post->user->avator }}' height="45" width="45"
                        class="rounded-circle border border-info border-2" alt="">
                </a>

            </div>
            <div class="ms-3">
                <h6 style="text-decoration: none" class="text-dark">{{ $post->user->name }}</h6>
                <p class="secondary">{{ $post->created_at->diffForHumans() }}</p>
            </div>
        </div>
        <x-post-card-body :post="$post" />
        <div class="d-flex justify-content-end mt-3">
            <a href="/post/{{ $post->slug }}" class="btn btn-primary">See More</a>
        </div>
    </div>
</div>
