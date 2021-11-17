<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\BackController;
use App\Http\Controllers\UserController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', [PagesController::class, 'index'])->name('homepage');
Route::post('/', [PagesController::class, 'feedback'])->name('feedback');

Auth::routes(['register' => false]);
/*Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
*/


Route::get('/user/register', [PagesController::class, 'user_register'])->name('registration');
Route::post('/user', [PagesController::class, 'user_post'])->name('register');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'handleAdmin'])->middleware('admin')->name('admin.route');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'handleAdmin']);
    //Manage Admins
    Route::get('/user/admins', [BackController::class, 'admin_index'])->name('admin.admin_index');
    Route::get('/user/admin/create', [BackController::class, 'admin_create'])->name('admin.admin_create');
    Route::post('/user/admins', [BackController::class, 'admin_store'])->name('admin.admin_store');
    Route::get('/user/admins/{id}/edit', [BackController::class, 'admin_edit'])->name('admin.admin_edit');
    Route::put('/user/admins/{id}', [BackController::class, 'admin_update'])->name('admin.admin_update');
    Route::delete('/user/admins/{id}', [BackController::class, 'admin_destroy'])->name('admin.admin_destroy');
    //manage users
    Route::get('/users', [BackController::class, 'user_index'])->name('admin.user_index');
    Route::get('/users/{id}/edit', [BackController::class, 'user_edit'])->name('admin.user_edit');
    Route::put('/users/{id}', [BackController::class, 'user_update'])->name('admin.user_update');
    Route::delete('/users/{id}', [BackController::class, 'user_destroy'])->name('admin.user_destroy');
    //see books request
    //University CRUD
    Route::get('/varsity', [BackController::class, 'varsity_index'])->name('admin.varsity_index');
    Route::get('/varsity/create', [BackController::class, 'varsity_create'])->name('admin.varsity_create');
    Route::post('/varsity', [BackCOntroller::class, 'varsity_store'])->name('admin.varsity_store');
    Route::get('/varsity/{id}/edit', [BackController::class, 'varsity_edit'])->name('admin.varsity_edit');
    Route::put('/varsity/{id}', [BackController::class, 'varsity_update'])->name('admin.varsity_update');
    Route::delete('/varsity/{id}', [BackController::class, 'varsity_destroy'])->name('admin.varsity_destroy');
    //Feedback
    Route::get('/feedback', [BackController::class, 'feedback_index'])->name('admin.feedback');
    Route::delete('/feedback/{id}', [BackController::class, 'feedback_destroy'])->name('admin.feedback_destroy');
    Route::get('/feedback/{id}', [BackController::class, 'feedback_show'])->name('admin.feedback_show');
    //Book Category
    Route::get('/book/type', [BackController::class, 'book_type'])->name('admin.book_type');
    Route::get('/book/type/create', [BackController::class, 'type_create'])->name('admin.type_create');
    Route::post('/book/type', [BackController::class, 'type_store'])->name('admin.type_store');
    Route::delete('/book/type/{id}', [BackController::class, 'type_destroy'])->name('admin.type_destroy');
    //Book CRUD
    Route::get('/book', [BackController::class, 'book_index'])->name('admin.book_index');
    Route::get('/book/create', [BackController::class, 'book_create'])->name('admin.book_create');
    Route::post('/book', [BackController::class, 'book_store'])->name('admin.book_store');
    Route::delete('/book/{id}', [BackController::class, 'book_destroy'])->name('admin.book_destroy');
    Route::get('/book/{id}/edit', [BackController::class, 'book_edit'])->name('admin.book_edit');
    Route::put('/book/{id}', [BackController::class, 'book_update'])->name('admin.book_update');
    Route::get('/book/{id}', [BackController::class, 'book_show'])->name('admin.book_show');

    //Post Crud
    Route::get('/post', [BackController::class, 'post_index'])->name('admin.post_index');
    Route::get('/post/{id}', [BackController::class, 'post_show'])->name('admin.post_show');
    Route::delete('/post/{id}', [BackController::class, 'post_destroy'])->name('admin.post_destroy');
});

//User Route
Route::prefix('user')->group(function(){
    //Available books
    Route::get('/books', [UserController::class, 'books_index'])->name('user.books_index');
    //Book Published
    Route::get('/book', [UserController::class, 'book_index'])->name('user.book_index');
    Route::get('/book/create', [UserController::class, 'book_create'])->name('user.book_create');
    Route::post('/book', [UserController::class, 'book_store'])->name('user.book_store');
    Route::get('/book/{id}', [UserController::class, 'book_show'])->name('user.book_show');
    Route::get('/book/{id}/edit', [UserController::class, 'book_edit'])->name('user.book_edit');
    Route::put('/book/{id}', [UserController::class, 'book_update'])->name('user.book_update');
    Route::delete('/book/{id}', [UserController::class, 'book_destroy'])->name('user.book_destroy');

    Route::get('/post', [UserController::class, 'post_index'])->name('user.post_index');
    Route::get('/post/create', [UserController::class, 'post_create'])->name('user.post_create');
    Route::post('post', [UserController::class, 'post_store'])->name('user.post_store');
    Route::get('/post/{id}', [UserController::class, 'post_show'])->name('user.post_show');
    Route::delete('/post/{id}', [UserController::class, 'post_destroy'])->name('user.post_destroy');
    Route::get('/post/{id}/edit', [UserController::class, 'post_edit'])->name('user.post_edit');
    Route::put('/post/{id}', [UserController::class, 'post_update'])->name('user.post_update');
    
});



//Visitor Route
Route::get('/book/{id}', [PagesController::class, 'book_show']);
Route::get('/books', [PagesController::class, 'book_index'])->name('visitor.book_index');
Route::get('/posts', [PagesController::class, 'post_index'])->name('visitor.book_index');
Route::get('/post/{id}', [PagesController::class, 'post_show'])->name('visitor.post_index');
//search the post
Route::post('/posts', [PagesController::class, 'post_search'])->name('post.search');
//search the book
Route::post('/book', [PagesController::class, 'book_find'])->name('book.filter');
//search
Route::post('/books', [PagesController::class, 'book_search'])->name('book.search');
//contact
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');