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
                        <div class="d-sm-block d-md-flex ">
                            <form action="" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger mt-3 ">Delete</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class='card shadow-sm mx-2'>

            <div class="body m-3">
                <form action="/post/{{ $post->slug }}/edit" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PATCH')
                    <textarea name="body" cols="10" rows="5" class="border border-0 form-control"
                        value="{{ old('body') }}"
                        placeholder="သင့်ပို့စ်ကို ပြင်ဆင်ရေးသားရန်">{{ $post->body }}</textarea>
                    @error('body')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input type="file" class="form-control my-2" name="thumbnail">
                    @if (isset($post->thumbnail))
                    <img src="/storage/{{$post->thumbnail}}" style="border-radius: 8px" width="200px" height="100px" />
                    @endif
                    <button class="btn mt-2 w-100 btn-primary" type="submit">Update</button>
                </form>
            </div>
        </div>
    </x-profile-layout>

</x-layout>
