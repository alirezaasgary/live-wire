<?php

use App\Livewire\ContactUs;
use App\Livewire\Message;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect('contact-us'));

Route::get('/contact-us', ContactUs::class);
Route::get('/messages', Message::class);

