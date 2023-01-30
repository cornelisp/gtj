<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Announcement;



Route::get('/', [AnnouncementController::class, 'index']);


Route::get('/announcements/create', [AnnouncementController::class, 'create'])->middleware('auth');


Route::post('/announcements', [AnnouncementController::class, 'store'])->middleware('auth');


Route::get('/announcements/{Announcement}/edit', [AnnouncementController::class, 'edit'])->middleware('auth');

Route::put('/announcements/{Announcement}', [AnnouncementController::class, 'update'])->middleware('auth');

Route::delete('/announcements/{Announcement}', [AnnouncementController::class, 'destroy'])->middleware('auth');

Route::get('/announcements/manage', [AnnouncementController::class, 'manage'])->middleware('auth');

Route::get('/announcements/{Announcement}', [AnnouncementController::class, 'show']);


Route::get('/register', [UserController::class, 'create'])->middleware('guest');


Route::post('/users', [UserController::class, 'store']);


Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');


Route::post('/users/authenticate', [UserController::class, 'authenticate']);