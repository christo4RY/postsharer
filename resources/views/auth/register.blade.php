<x-auth-layout>
    <x-slot name="title">
        <title>Register</title>
    </x-slot>
    <div class="container">
        <div class="col-md-8 mx-auto mt-5">
            <h1 class="text-primary text-center fw-bold">PostSharer</h1>
            <div class="warp1 mt-4">
                <div class="card shadow-md p-3">

                    <div class="card-body">
                        <x-register-form />
                    </div>
                </div>
            </div>
        </div>
        <x-footer-login />
    </div>


</x-auth-layout>
