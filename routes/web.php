<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home', [
        "title" => "Ini Halaman Home",
        "active" => "Home",
    ]);
});


Route::get('/post', function () {
    $post = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "penulis" => "Penulis 1",
            "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequuntur porro corporis nihil earum consequatur ad cupiditate harum aperiam quam quasi neque consectetur fugiat voluptate illo, possimus incidunt amet omnis velit?"
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "penulis" => "Penulis 2",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum aliquam voluptatibus minus totam placeat, quidem eius saepe similique quae sequi voluptates natus numquam in molestias esse tenetur obcaecati quasi corrupti?"
        ]
    ];
    return view('post', [
        "title" => "Ini Halaman Post",
        "active" => "Post",
        "posts" => $post
    ]);
});

Route::get('/post/{slug}', function ($slug) {
    $post = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "penulis" => "Penulis 1",
            "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequuntur porro corporis nihil earum consequatur ad cupiditate harum aperiam quam quasi neque consectetur fugiat voluptate illo, possimus incidunt amet omnis velit?"
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "penulis" => "Penulis 2",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum aliquam voluptatibus minus totam placeat, quidem eius saepe similique quae sequi voluptates natus numquam in molestias esse tenetur obcaecati quasi corrupti?"
        ]
    ];

    $getPost = [];

    foreach ($post as $data) {
        if ($data['slug'] === $slug) {
            $getPost = $data;
        }
    }

    return view('single-post', [
        "title" => "Single Post",
        "active" => "Home",
        "post" => $getPost
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
