<form action="/store" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" value="{{old('name')}}" name="name" class="form-control" id="name">
    </div>
    @error('name')
        <p class="text-danger">{{ $message }}</p>
    @enderror
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" value="{{old('username')}}" name="username" class="form-control" id="username">
    </div>
    @error('username')
        <p class="text-danger">{{ $message }}</p>
    @enderror
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" name="email" value="{{old('email')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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
    <button type="submit" class="btn btn-success w-100">Sign Up</button>
    <div class="my-3">
        <hr>
    </div>
    <a href="/">
        Already have an account?</a>
</form>
