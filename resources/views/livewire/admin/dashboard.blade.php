<?php

use Livewire\Volt\Component;
use Livewire\Attributes\{Layout, Title};
use App\Models\Department;
use App\Models\Course;
use App\Models\TeamMember;
use App\Models\Application;
// use App\Models\GalleryItem;

new
#[Title('Dashboard')]
#[Layout('layouts.admin-portal')]
class extends Component
{
    public $showProfileMenu = false;

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function with(): array
    {
        return [
        'user' => Auth::user(),
            'departmentsCount' => Department::count(),
            'coursesCount' => Course::count(),
            'membersCount' => TeamMember::count(),
            'applicantsCount' => Application::count(),
            // 'recentGalleryItems' => GalleryItem::latest()->take(5)->get(),
            'recentApplicants' => Application::latest()->take(5)->get(),
        ];
    }
}; ?>




<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <h1 class="mb-6 text-3xl font-bold text-gray-800">Dashboard</h1>

        <!-- Stats Overview -->
        <div class="grid grid-cols-1 gap-6 mb-8 sm:grid-cols-2 lg:grid-cols-4">
            <div class="p-6 bg-white rounded-lg shadow-md">
                <h2 class="text-xl font-semibold text-gray-800">Departments</h2>
                <p class="text-3xl font-bold text-orange-600">{{ $departmentsCount }}</p>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-md">
                <h2 class="text-xl font-semibold text-gray-800">Courses</h2>
                <p class="text-3xl font-bold text-orange-600">{{ $coursesCount }}</p>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-md">
                <h2 class="text-xl font-semibold text-gray-800">Trainers</h2>
                <p class="text-3xl font-bold text-orange-600">{{ $membersCount }}</p>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-md">
                <h2 class="text-xl font-semibold text-gray-800">Applicants</h2>
                <p class="text-3xl font-bold text-orange-600">{{ $applicantsCount }}</p>
            </div>
        </div>

        <!-- Recent Updates -->
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
            <!-- Recent Gallery Updates -->
            {{-- <div class="p-6 bg-white rounded-lg shadow-md">
                <h2 class="mb-4 text-xl font-semibold text-gray-800">Recent Gallery Updates</h2>
                <ul class="space-y-2">
                    @foreach($recentGalleryItems as $item)
                    <li class="flex items-center p-2 bg-gray-100 rounded">
                        <img src="{{ asset('storage/'.$item->image_path) }}" alt="{{ $item->title }}"
                            class="w-12 h-12 mr-4 rounded">
                        <div>
                            <p class="font-semibold">{{ $item->title }}</p>
                            <p class="text-sm text-gray-600">{{ $item->created_at->diffForHumans() }}</p>
                        </div>
                    </li>
                    @endforeach
                </ul>
                <a href="{{ route('gallery.index') }}" class="inline-block mt-4 text-orange-600 hover:underline">View
                    all gallery items →</a>
            </div> --}}

            <!-- Recent Applicants -->
            <div class="p-6 bg-white rounded-lg shadow-md">
                <h2 class="mb-4 text-xl font-semibold text-gray-800">Recent Applicants</h2>
                <ul class="space-y-2">
                    @foreach($recentApplicants as $applicant)
                    <li class="flex items-center justify-between p-2 bg-gray-100 rounded">
                        <div>
                            <p class="font-semibold">{{ $applicant->name }}</p>
                            <p class="text-sm text-gray-600">{{ $applicant->course->name }}</p>
                        </div>
                        <span class="px-2 py-1 text-xs text-white bg-orange-600 rounded-full">{{ $applicant->status
                            }}</span>
                    </li>
                    @endforeach
                </ul>
                <a href="{{ route('applicants.view') }}" class="inline-block mt-4 text-orange-600 hover:underline">View
                    all applicants →</a>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="mt-8">
            <h2 class="mb-4 text-xl font-semibold text-gray-800">Quick Actions</h2>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                <a href="{{ route('department.create') }}"
                    class="p-4 text-center bg-orange-600 rounded-lg shadow-md hover:bg-orange-700">
                    <span class="text-white">Add New Department</span>
                </a>
                <a href="{{ route('course.create') }}"
                    class="p-4 text-center bg-orange-600 rounded-lg shadow-md hover:bg-orange-700">
                    <span class="text-white">Add New Course</span>
                </a>
                <a href="{{ route('team.create') }}"
                    class="p-4 text-center bg-orange-600 rounded-lg shadow-md hover:bg-orange-700">
                    <span class="text-white">Add New Trainer</span>
                </a>
                <a href="{{ route('success.story.create') }}"
                    class="p-4 text-center bg-orange-600 rounded-lg shadow-md hover:bg-orange-700">
                    <span class="text-white">Add Success Story</span>
                </a>
                <a href="{{ route('downloads.create') }}"
                    class="p-4 text-center bg-orange-600 rounded-lg shadow-md hover:bg-orange-700">
                    <span class="text-white">Add Download File</span>
                </a>
                <a href="{{  route('gallery.create') }}"
                    class="p-4 text-center bg-orange-600 rounded-lg shadow-md hover:bg-orange-700">
                    <span class="text-white">Add Gallery Item</span>
                </a>
            </div>
        </div>
    </div>
</div>