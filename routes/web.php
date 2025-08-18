<?php


use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Jobs\TranslateJob;
use App\Models\Job;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\JobController;




Route::view('/', 'home');

Route::get(
  '/test',
  function () {

    $job = Job::first();
    TranslateJob::dispatch($job);

    return 'Done';

  }
);

Route::controller(JobController::class)->group(function () {
  Route::get('/jobs', 'index');
  Route::get('/jobs/create', 'create')->middleware('auth');
  Route::get('/jobs/{job}', 'show');
  Route::post('/jobs', 'store')->middleware('auth');
  Route::middleware(['auth', 'can:edit,job'])->group(function () {
    Route::get('/jobs/{job}/edit', 'edit');
    Route::patch('/jobs/{job}', 'update');
    Route::delete('/jobs/{job}', 'destroy');
  });
});

Route::controller(PostController::class)->group(function () {
  Route::get('/posts', 'index');
  Route::get('/posts/{post}', 'show');
});

Route::controller(CommentController::class)->group(function () {
  Route::post('/posts/{post}/comment', 'store');
  Route::post('/posts/{post}/comment/{comment}/reply', 'store');
});






Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

Route::view('/contact', 'contact');