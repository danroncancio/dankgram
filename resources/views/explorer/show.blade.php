@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-inline">
        <h3 class=" font-weight-bold">#{{ $tag }}</h3>
        <h5>{{ $numPosts }} post</h5>
    </div>
    <hr>

    <div class="row pt-4">
        @foreach($matchPosts as $post)
        <div class="col-4 pb-4">
            <a href="/p/{{ $post->id }}">
                <img src="/storage/{{ $post->image }}" class="w-100" alt="">
            </a>
        </div>
        @endforeach


    </div>
</div>
@endsection