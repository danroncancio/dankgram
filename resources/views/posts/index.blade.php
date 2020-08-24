@extends('layouts.app')

@section('content')
<div class="container">
    @if (count($posts) > 0)
    @foreach($posts as $post)
    <div class="row pt-2 pb-4 justify-content-center">
        <div class="border rounded-sm bg-white" style="max-width: 40em;">
            <div class="py-3 pl-3">
                <img src="{{ $post->user->profile->profileImage() }}" alt="" class="w-100 rounded-circle" style="max-width: 40px">
                <a class="pl-2" href="/profile/{{ $post->user->username }}">
                    <span class="text-dark">{{ $post->user->username }}</span>
                </a>
            </div>
            <div>
                <img src="/storage/{{ $post->image }}" class="w-100" alt="">
            </div>
            <div class="pl-3 pt-3">
                <div>
                    <?php

                    $likes = (auth()->user()) ? $post->liked->contains(auth()->user()->id) : false;

                    ?>
                    <like-button @click="$test + 1" post-id="{{ $post->id }}" post="{{ $post }}" likes="{{ $likes }}"></like-button>
                </div>
                <div>
                    <span class="font-weight-bold">{{ $post->liked->count() }} likes</span>
                </div>
                <div>
                    <p>
                        <span class="font-weight-bold">
                            <a href="/profile/{{ $post->user->username }}">
                                <span class="text-dark">{{ $post->user->username }}</span>
                            </a>
                        </span>
                        <?php
                        $rawCaption = $post->caption;
                        $url_pattern = '/#(\w+)/';
                        $pre_caption = preg_replace($url_pattern, '<a href="/explorer/tags/$1/">$0</a> ', $rawCaption);

                        $at_pattern = '/@(\w+)/';
                        $caption = preg_replace($at_pattern, '<a href="/profile/$1/">$0</a> ', $pre_caption);

                        $caption = strtolower($caption);
                        echo (ucfirst($caption));
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @else
    <h3 class="row font-weight-bold justify-content-center">You're not following anyone! 😢</h3>
    <h5 class="row justify-content-center">Some Recomendations</h5>
    <hr>
    <div class="row pb-2 ml-5 pl-5">
        @foreach ($allUsers as $users)
        <div class="col-4"></div>
        <div class="pt-3 d-flex col-7">
            <img src="{{ $users->profile->profileImage() }}" alt="" class="w-100 rounded-circle" style="max-width: 40px">
            <a href="/profile/{{ $users->id }}">
                <span class="pl-3">{{ $users->username }}</span>
            </a>
        </div>
        @endforeach
    </div>
    @endif

    <div class="row clo-12 d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
</div>
@endsection