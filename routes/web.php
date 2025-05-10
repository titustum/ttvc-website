<?php

use App\Http\Controllers\WelcomeController;
use App\Models\Partner;
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

    Volt::route('admin-create-department', 'admin.create-department')
            ->name('admin.departments.create');
    Volt::route('admin-create-success-story', 'admin.create-success-story')
            ->name('admin.success.stories.create');
    Volt::route('admin-create-downloads', 'admin.create-downloads')
            ->name('admin.downloads.create');
    Volt::route('admin-create-gallery', 'admin.create-gallery')
            ->name('admin.galleries.create'); 
    Volt::route('admin-create-gallery-item', 'admin.create-gallery-item')
            ->name('admin.gallery.items.create'); 
    Volt::route('admin-create-partner', 'admin.create-partner')
            ->name('admin.partners.create'); 
    Volt::route('admin-create-course', 'admin.create-course')
            ->name('admin.courses.create');
    Volt::route('admin-create-team', 'admin.create-team')
            ->name('admin.teams.create');
    Volt::route('admin-create-slide-item', 'admin.create-slide-item')
            ->name('admin.slide.items.create');
    

//View routes
    Volt::route('view-departments', 'admin.view-departments')
        ->name('admin.departments.view'); 
    Volt::route('admin-view-courses', 'admin.view-courses')
        ->name('admin.courses.view'); 
     Volt::route('admin-view-applicants', 'admin.view-applicants')
                ->name('admin.applicants.view');
     Volt::route('admin-view-teams', 'admin.view-teams')
                ->name('admin.teams.view');
     Volt::route('admin-view-slide-items', 'admin.view-slide-items')
                ->name('admin.slide.items.view'); 
Volt::route('admin-view-downloads', 'admin.view-downloads')
        ->name('admin.downloads.view'); 
Volt::route('admin-view-partners', 'admin.view-partners')
        ->name('admin.partners.view');
Volt::route('admin-view-success-stories', 'admin.view-success-stories')
        ->name('admin.success.stories.view');
Volt::route('admin-manage-gallery', 'admin.view-galleries')
        ->name('admin.galleries.view');
Volt::route('admin-view-gallery-items', 'admin.view-gallery-items')
        ->name('admin.gallery.items.view');
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
