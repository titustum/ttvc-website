<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

// pages
Route::view('/', 'welcome')->name('welcome');

Volt::route('about', 'mypages.about')
        ->name('about');
Volt::route('contact', 'mypages.contact')
        ->name('contact');
Volt::route('admissions', 'mypages.admissions')
        ->name('admissions');
Volt::route('departments', 'mypages.departments')
        ->name('departments');
Volt::route('administration', 'mypages.administration')
        ->name('administration');
Volt::route('downloads', 'mypages.downloads')
        ->name('downloads');
Volt::route('courses', 'mypages.courses')
        ->name('courses');
Volt::route('departments/{deptname}', 'mypages.department')
        ->name('department');
Volt::route('department-manager/', 'mypages.department-manager')
        ->name('department.manager');




Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
