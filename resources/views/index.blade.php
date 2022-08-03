@auth
<x-layout>
    <x-posts :posts="$posts" />
</x-layout>
@else
<x-auth-layout>
    <div class="container">
        <div class="col-md-8 mx-auto mt-5">
            <h1 class="text-primary text-center fw-bold">PostSharer</h1>
            <p class="text-secondary text-center mx-auto w-75">PostSharer helps you connect and share with the people in
                your life.</p>
            <div class="warp mt-4">
                <div class="card shadow-md p-3">

                    <div class="card-body">
                        @error('login_fail')
                        <p class="alert alert-warning">{{ $message }}</p>
                        @enderror
                        <form action="/login" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                    id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            @error('email')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            @error('password')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                            <div class="my-4">
                                <hr>
                            </div>
                            <a href="/register" class=" btn btn-success w-100">Create Account</a>
                        </form>

                    </div>
                </div>
                <x-footer-login />
            </div>
        </div>
    </div>
</x-auth-layout>
@endauth
