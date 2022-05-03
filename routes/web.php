<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\TestController;
use App\Jobs\WelcomeJob;
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
     WelcomeJob::dispatch();
    
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('send-mail', function () {
   
    $details = [
        'title' => 'for helping me more',
        'body' => 'This is for testing email using smtp'
    ];
   
    \Mail::to('aliparsa883@gmail.com')->send(new \App\Mail\NotifyMail($details));
   
    dd("Email is Sent.");
});

Route::get('test',[TestController::class,'test']);