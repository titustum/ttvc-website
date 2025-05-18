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
Volt::route('staff-members', 'mypages.staff-members')
        ->name('staff.members');
Volt::route('principal-office', 'mypages.principal-office')
        ->name('principal.office');
Volt::route('downloads', 'mypages.downloads')
        ->name('downloads');
Volt::route('courses', 'mypages.courses')
        ->name('courses');
Volt::route('administration', 'mypages.administration')
        ->name('administration');
Volt::route('team', 'mypages.team-members')
        ->name('team');
Volt::route('departments/{slug}', 'mypages.department')
        ->name('department');
        ///
Volt::route('test-application', 'mypages.test-admission')
        ->name('test.application');


//admin management
Route::middleware('auth')->group(function () {

        //View routes
        Volt::route('view-manage-departments', 'admin.manage-departments')
                ->name('admin.departments.manage'); 
        Volt::route('admin-manage-courses', 'admin.manage-courses')
                ->name('admin.courses.manage'); 
        Volt::route('admin-view-applicants', 'admin.manage-applicants')
                        ->name('admin.applicants.manage');
        Volt::route('admin-manage-teams', 'admin.manage-teams')
                        ->name('admin.teams.manage');
        Volt::route('admin-manage-slide-items', 'admin.manage-slide-items')
                ->name('admin.slide.items.manage'); 
        Volt::route('admin-manage-downloads', 'admin.manage-downloads')
                ->name('admin.downloads.manage'); 
        Volt::route('admin-manage-partners', 'admin.manage-partners')
                ->name('admin.partners.manage');
        Volt::route('admin-manage-success-stories', 'admin.manage-success-stories')
                ->name('admin.success.stories.manage');
        Volt::route('admin-manage-gallery', 'admin.manage-galleries')
                ->name('admin.galleries.manage');
        Volt::route('admin-manage-gallery-items', 'admin.manage-gallery-items')
                ->name('admin.gallery.items.manage');
                
        //roles
        Volt::route('admin-manage-roles', 'admin.manage-roles')
                ->name('admin.roles.manage');

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
