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
            )->paginate(9)->withQueryString() // or simplePaginate()
        ]);
    }

    public function show(Post $post) {
        return view('posts.show', [
            'post' => $post
        ]);
    }
}

/*
***** What's the purpose of this file? *****

app > Http > Controllers > PostController.php = Post Controller

Post Controller:
    -returns home/index view
    -returns view with current filter selections, including:
        -search
        -category
        -author

Laravel Controllers:
    Instead of defining all of your request handling logic as closures in your route files, you may wish to organize this behavior using "controller" classes. Controllers can group related request handling logic into a single class. For example, a UserController class might handle all incoming requests related to users, including showing, creating, updating, and deleting users. By default, controllers are stored in the app/Http/Controllers directory.
*/