    <div class="container pt-3">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                            <a href="/posts/users/{{auth()->user()->username}}/profile">
                                <img src="{{ auth()->user()->avator }}" height="40px" width="40px" class="rounded-circle border border-2 border-info"
                                alt="">
                            </a>
                        </div>
                        <div class=" w-100 ms-2">
                            <form action="/postupload" method="POST">
                                @csrf
                                <input type="text" name="body" class="form-control border border-0"
                                    style="border-radius: 30px;background-color:rgb(239, 241, 247)"
                                    placeholder="What's on your mind?">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col my-2">
            @foreach ($posts as $post)
                <x-post-card :post="$post" />
            @endforeach
        </div>
    </div>
