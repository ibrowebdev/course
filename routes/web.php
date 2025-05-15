<?php

use App\Livewire\CourseDetails;
use App\Livewire\CourseList;
use App\Livewire\Login;
use App\Livewire\Register;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('register', Register::class)->name('register');
Route::get('login', Login::class)->name('login');
Route::get('logout', function(){
    Auth::logout();
    return redirect(Route('login'));
})->name('logout');
Route::get('course-list', CourseList::class)->middleware('auth')->name('course');
Route::get('/course/{id}', CourseDetails::class)->middleware('auth');
