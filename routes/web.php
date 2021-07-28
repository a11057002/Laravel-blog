<?php

use \App\Models\Post;
use \App\Models\User;
use \App\Models\Category;
use App\Services\Newsletter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use \App\Http\Controllers\SessionController;
use \App\Http\Controllers\RegisterController;
use App\Http\Controllers\NewsletterController;
use Illuminate\Validation\ValidationException;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Translation\Loader\YamlFileLoader as LoaderYamlFileLoader;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// global helper functions
// base_path();   
// app_path();
// resource_path();

// 3600 -> now()->addHour() ...
// cache()->remember("post.{$test}" , 3600 , function () use ($test) {
//     var_dump("gggg");
//     return compact('test');
// });

// Route::get('/user/{user:username}',function (User $user){
//     ddd('123');
//     $posts = $user->posts->load(['category','user']);
//     return view('posts',compact('posts'));
// });

// name 指定尋找的 key
// Route::get('category/{category:name}',function (Category $category){
//     $posts = $category->posts->load(['category','user']);
//     $categories = Category::all();
//     $currentCategory = $category->name;
//     return view('posts',compact('posts','categories','currentCategory'));
// });

// Route::get('ping', function () {
//     $mailchimp = new \MailchimpMarketing\ApiClient();
    
//     $mailchimp->setConfig([
//         'apiKey' => '32220a863112fc343cb1b9c36081ca2e-us6',
//         'server' => 'us6'
//     ]);

//     $response = $mailchimp->lists->addListMember('c6fc380d74',[
//         'email_address' => 'megumi9201@gmail.com',
//         'status' => 'subscribed'
//     ]);
//     ddd($response);
// });


Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/post/create',[PostController::class, 'create'])->middleware('auth');
Route::post('/post/create',[PostController::class, 'store'])->middleware('auth');
// Route::get('/post/{post:slug}', [PostController::class, 'show'])->where('post', '[A-z\-0-9\x4DBF-\x9FFF]+');
Route::get('/post/{post:slug}', [PostController::class, 'show']);
Route::get('/post/{post:slug}/edit',[PostController::class,'edit'])->middleware('auth','isAuthor');
Route::post('/post/{post:slug}/comment', [CommentController::class, 'store']);
Route::get('/user/{user:name}', [PostController::class, 'showUser']);

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/login', [SessionController::class, 'create'])->middleware('guest')->name('login');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionController::class, 'destory'])->middleware('auth');

Route::post('newsletter',NewsletterController::class);


