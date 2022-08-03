<div class="container pt-3">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div>
                        <a href="/posts/users/{{auth()->user()->username}}/profile">
                            <img src='{{"storage/".auth()->user()->avator }}' height="50px" width="50px"
                                class="rounded-circle border border-2 border-info" alt="">
                        </a>
                    </div>
                    <div class=" w-100 mt-1 ms-2">
                        <div class="d-flex">
                            <a href="/posts/users/{{auth()->user()->username}}/profile"
                                class="btn btn-warning w-100 me-1">Profile</a>
                            <a href="/post/create" class="btn btn-primary w-100">Create Post</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col my-2">
        @forelse ($posts as $post)
        <x-post-card :post="$post" />
        @empty
        <p class="alert alert-danger text-center"><b>သင်ရှာဖွေသောအကောင့်ကိုမတွေ့ပါ။</b></p>
        @endforelse
    </div>
</div>
