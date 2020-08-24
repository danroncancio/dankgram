<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class ExplorerController extends Controller
{
    public function index()
    {

        $allPosts = Post::all();

        $posts = [];

        foreach ($allPosts as $post) {
            array_unshift($posts, $post);
        }

        return view('explorer.index', compact('posts'));
    }

    public function show($tag)
    {
        $allPosts = Post::all();

        $matchPosts = [];

        foreach ($allPosts as $post) {
            if (preg_match('/'. $tag .'/i', $post->caption) > 0) {
                array_unshift($matchPosts, $post);
            }
        }

        $numPosts = count($matchPosts);

        return view('explorer.show', compact('tag', 'matchPosts', 'numPosts'));
    }
}
