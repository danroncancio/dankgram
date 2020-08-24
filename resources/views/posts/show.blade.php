@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row border bg-white " style="min-width: 60em; max-width: 60em;">
        <div class="col-8" style="padding-left: 0px;">
            <img src="/storage/{{ $post->image }}" class="w-100" alt="">
        </div>
        <div class="col-md-4 pt-4" style="max-width: 40em;">
            <div class="row">
                <div class="col d-flex align-items-center " >
                    <div class="pr-3">
                        <img src="{{ $post->user->profile->profileImage() }}" alt="" class="w-100 rounded-circle" style="max-width: 40px">
                    </div>
                    <div>
                        <span class="font-weight-bold">
                            <a href="/profile/{{ $post->user->username }}">
                                <span class="text-dark">{{ $post->user->username }}</span>
                            </a>

                            <svg class="pl-2 w-100" style="max-width: 12px;" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" xml:space="preserve">
                                <g>
                                    <path d="M500,10c270.6,0,490,219.4,490,490c0,270.6-219.4,490-490,490C229.4,990,10,770.7,10,500C10,229.4,229.4,10,500,10z" />
                                </g>
                            </svg>

                            <a href="#" class="pl-2">Follow</a>
                        </span>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col overflow-auto" style="max-height: 25em;">
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
                    
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col"><?php

                                    $likes = (auth()->user()) ? $post->liked->contains(auth()->user()->id) : false;

                                    ?>
                    <like-button @click="$test + 1" post-id="{{ $post->id }}" post="{{ $post }}" likes="{{ $likes }}"></like-button>

                    <div>
                        <span class="font-weight-bold">{{ $post->liked->count() }} likes</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="d-flex">
                        <span>Post</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection