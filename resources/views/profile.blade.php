<x-layout>
    <div class="container">
        <div class="col-md-10 mx-auto">
            <div class="card my-3">
                <div class="card-body">
                    <div class="col-md-8 mx-auto my-3">
                        <div class="card shadow-md">
                            <div class="card-body">
                                <div>
                                    <div class="mainProfile">
                                        <div>
                                            <img class="mainImg"
                                                src="https://c4.wallpaperflare.com/wallpaper/312/851/784/dolomiti-italy-autumn-lago-antorno-landscape-photography-desktop-hd-wallpaper-for-pc-tablet-and-mobile-3840%C3%972400-wallpaper-preview.jpg"
                                                width="100%" height="175px" alt="">
                                        </div>
                                        <div class="userProfile ">
                                            <img class="profileImg mt-2" src="{{ $user->avator }}" alt="">
                                        </div>
                                    </div>
                                    <div class="text-end me-2">
                                        <div class="d-flex justify-content-end">
                                            <span>
                                                <h3 class="my-3">{{ $user->name }}</h3>
                                            </span>
                                            <div class="ms-2 my-auto">
                                                {{-- <a href=""><i class="fa-solid fa-bell bell"></i></a> --}}
                                            </div>
                                        </div>
                                        <p class="text-secondary">Created at - {{ $user->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h1 class="text-center text-warning posts badge bg-primary">
                            Posts Of {{ $user->name }}
                        </h1>
                    </div>
                    <div class="col mx-auto">
                        @if ($user->posts->count())
                            <x-profiles :userPosts="$user
                                ->posts()
                                ->latest()
                                ->paginate(3)" />
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
