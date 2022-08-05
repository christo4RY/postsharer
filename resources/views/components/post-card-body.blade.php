<div {{$attributes->merge(['class'=>'card shadow-sm'])}}>
    <div class="body p-3">
        {{$post->body}}
        {{-- <div class="image">
            @if (isset($post->thumbnail))
            <img src='{{asset("storage/$post->thumbnail")}}' class="mt-3 img" alt="">
            @endif
        </div> --}}
    </div>
</div>
