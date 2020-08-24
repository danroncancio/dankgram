@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="row font-weight-bold justify-content-center">Explorer</h3>
    <h5 class="row justify-content-center">You can watch all the post on the site here.</h5>

    <hr>

    <div class="row pt-4">
        @foreach($posts as $post)
        <div class="col-4 pb-4">
            <a href="/p/{{ $post->id }}">
                <img src="/storage/{{ $post->image }}" class="w-100" alt="">
            </a>
        </div>
        @endforeach


    </div>
</div>
@endsection