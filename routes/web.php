<?php

use App\Http\Controllers\WelcomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

// pages
Route::get('/', WelcomeController::class)->name('welcome');

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
Volt::route('team', 'mypages.team-members')
        ->name('team');
Volt::route('departments/{deptname}', 'mypages.department')
        ->name('department');
        ///
Volt::route('test-application', 'mypages.test-admission')
        ->name('test.application');


//admin management
Route::middleware('auth')->group(function () {
    Volt::route('view-courses', 'admin.courses-view')
            ->name('courses.view');
    Volt::route('create-department', 'admin.department-create')
            ->name('department.create');
    Volt::route('create-success-story', 'admin.create-success-story')
            ->name('success.story.create');
    Volt::route('create-course', 'admin.course-create')
            ->name('course.create');
    Volt::route('create-team', 'admin.team-create')
            ->name('team.create');
    Volt::route('view-applicants', 'admin.applicants-view')
            ->name('applicants.view');

    Volt::route('dashboard', 'admin.dashboard')
        ->middleware(['auth', 'verified'])
        ->name('dashboard');

    Route::view('profile', 'profile')
        ->middleware(['auth'])
        ->name('profile');

    Route::post('logout', function (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    })->name('logout');
});

require __DIR__.'/auth.php';
