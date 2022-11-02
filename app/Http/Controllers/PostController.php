<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index() {
        // return Post::latest()->filter(
        //     request(['search', 'category', 'author'])
        // )->paginate();

        return view('posts.index', [
            'posts' => Post::latest()->filter(
                        request(['search', 'category', 'author'])
            )->paginate(6)->withQueryString() // or simplePaginate()
        ]);
    }

    public function show(Post $post) {
        return view('posts.show', [
            'post' => $post
        ]);
    }
}
