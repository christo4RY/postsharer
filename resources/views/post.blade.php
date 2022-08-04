<x-layout>
    <x-slot name="title">
        <title>{{$post->slug}}</title>
    </x-slot>
    <x-profile-layout>
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="d-flex">
                    <div>
                        <a href="/posts/users/{{ $post->user->username }}/profile">
                            <img class="profilecircle mt-2" src="{{$post->user->avator }}" alt="">

                        </a>
                    </div>
                    <div class="ms-4">
                        <h1 class="my-3">{{ $post->user->name }}</h1>
                        <p class="text-secondary">Publish at - {{ $post->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                <div class="d-flex ">
                    <div class="text-center">
                        @if (auth()->id() != $post->user->id)
                        <form action="/post/{{ $post->slug }}/subscribe" method="POST">
                            @csrf
                            @if (auth()->user()->isSubscribe($post))
                            <button class="btn border border-0"><i class="fa-solid fa-bell bell1"></i></a>
                                @else
                                <button class="btn border border-0"><i class="fa-solid fa-bell bell"></i></a>
                                    @endif
                        </form>
                        @else
                        <div class="d-sm-block d-md-flex ">
                            <a href="/post/{{$post->slug}}/edit" class="btn btn-warning mt-3">Edit</a>
                            <form action="" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger mt-3 ms-1">Delete</button>
                            </form>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
        <x-post-card-body class="mx-3 mb-4" :post="$post" />

        <div class="card shadow-sm mx-3 mb-3">
            <div class="card-body">
                <form action="" method="POST">
                    @csrf
                    <textarea class="form-control" name="body" required placeholder="မှတ်ချက်ရေးရန်" cols="10"
                        rows="5"></textarea>
                    <div class="d-flex justify-content-end mt-3">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
                @error('body')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="text-center my-2">
            <h5 class="text-secondary">Comments ({{ $post->comments->count() }})</h5>
        </div>
        @if ($post->comments->count())
        <x-comments :comments="$post
                ->comments()
                ->latest()
                ->paginate(3)" />
        @endif
    </x-profile-layout>
</x-layout>
