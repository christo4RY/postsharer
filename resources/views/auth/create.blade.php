<x-layout>
    <x-slot name="title">
        <title>Create Post</title>
    </x-slot>
    <x-profile-layout>
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="d-flex">
                    <div>
                        <a href="/posts/users/{{ auth()->user()->username }}/profile">
                            <img class="profilecircle mt-2" src="{{auth()->user()->avator }}" alt="">

                        </a>
                    </div>
                    <div class="ms-4">
                        <h1 class="my-3">{{ auth()->user()->name }}</h1>
                        <p class="text-secondary">Publish at - {{ auth()->user()->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class='card shadow-sm mx-2'>

            <div class="body m-3">
                <form action="" enctype="multipart/form-data" method="POST">
                    @csrf
                    <textarea name="body" cols="10" rows="5" placeholder="ပို့စ်ကို ကြိုက်သလို ရေးလို့ရပါတယ်။"
                        class="border border-0 form-control" value="{{old('body')}}"></textarea>
                    @error('body')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                    <input type="file" class="form-control my-2" name="thumbnail">
                    <button class="btn mt-2 w-100 btn-primary" type="submit">Create Post</button>
                </form>
            </div>
        </div>
    </x-profile-layout>

</x-layout>
