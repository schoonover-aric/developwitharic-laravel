<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
//use App\Models\Category;
//use App\Models\Post;
use App\Models\User;
use App\Services\Newsletter;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::post('newsletter', NewsletterController::class);

Route::get('authors/{author:username}', function(User $author) {
    return view('posts.index', [
        'posts' => $author->posts
    ]);
});

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

// Admin
// Route::post('admin/posts', [AdminPostController::class, 'store'])->middleware('admin');
Route::post('admin/posts', [AdminPostController::class, 'store']);
// Route::get('admin/posts/create', [AdminPostController::class, 'create'])->middleware('admin');
Route::get('admin/posts/create', [AdminPostController::class, 'create']);
// Route::get('admin/posts', [AdminPostController::class, 'index'])->middleware('admin');
Route::get('admin/posts', [AdminPostController::class, 'index']);
// Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->middleware('admin');
Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit']);
// Route::patch('admin/posts/{post}', [AdminPostController::class, 'update'])->middleware('admin');
Route::patch('admin/posts/{post}', [AdminPostController::class, 'update']);
// Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy'])->middleware('admin');
Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy']);

// Admin Section *** admin must be admin <secured) ***
// Route::middleware('can:admin')->group(function () {
//     Route::resource('admin/posts', AdminPostController::class)->except('show');
// });

// Route::get('admin/posts', [AdminPostController::class, 'index'])->middleware('admin')->name('admin');
// Route::get('admin/posts/create', [PostController::class, 'create'])->middleware('admin')->name('admin');
// Route::post('admin/posts', [PostController::class, 'store'])->middleware('admin');

//Route Model Binding / using $post->id
// Route::get('posts/{post}', function(Post $post) {
//     return view('post', [
//         'post' => $post
//     ]);
// });

//***** Same as above *****
// Route::get('posts/{post}', function($id) {
//     return view('post', [
//         'post' => Post::findOrFail($id)
//     ]);
// });

// Route::get('categories/{category:slug}', function(Category $category) {
//     return view('posts', [
//         'posts' => $category->posts,
//         'currentCategory' => $category,
//         'categories' => Category::all()
//     ]);
// })->name('category');