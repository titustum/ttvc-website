<?php

use Livewire\Volt\Component;
use Livewire\Attributes\{Layout, Title};
use App\Models\Department;
use App\Models\Course;
use App\Models\TeamMember; //Trainers and non teaching staff i.e. Cooks, Store
use App\Models\Application; //Applicant students to college
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
            'recentApplicants' => Application::latest()->take(5)->get(),
        ];
    }
}; ?>

<div>
    <!-- Overview Statistics -->
    <div class="grid grid-cols-1 gap-5 mb-4 sm:grid-cols-2 lg:grid-cols-4">
        <div class="overflow-hidden transition-shadow duration-300 bg-white rounded-lg shadow hover:shadow-md">
            <div class="p-5">
                <div class="flex items-center">
                    <div
                        class="flex items-center justify-center flex-shrink-0 w-12 h-12 mr-4 text-orange-600 bg-orange-100 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Departments</p>
                        <p class="text-2xl font-semibold text-gray-800">{{ $departmentsCount }}</p>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('admin.departments.manage') }}"
                        class="text-sm font-medium text-orange-600 hover:underline">Manage Departments &rarr;</a>
                </div>
            </div>
        </div>

        <div class="overflow-hidden transition-shadow duration-300 bg-white rounded-lg shadow hover:shadow-md">
            <div class="p-5">
                <div class="flex items-center">
                    <div
                        class="flex items-center justify-center flex-shrink-0 w-12 h-12 mr-4 text-blue-600 bg-blue-100 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Courses</p>
                        <p class="text-2xl font-semibold text-gray-800">{{ $coursesCount }}</p>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('admin.courses.manage') }}"
                        class="text-sm font-medium text-blue-600 hover:underline">Manage Courses &rarr;</a>
                </div>
            </div>
        </div>

        <div class="overflow-hidden transition-shadow duration-300 bg-white rounded-lg shadow hover:shadow-md">
            <div class="p-5">
                <div class="flex items-center">
                    <div
                        class="flex items-center justify-center flex-shrink-0 w-12 h-12 mr-4 text-green-600 bg-green-100 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Trainers</p>
                        <p class="text-2xl font-semibold text-gray-800">{{ $membersCount }}</p>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('admin.teams.manage') }}"
                        class="text-sm font-medium text-green-600 hover:underline">Manage Trainers &rarr;</a>
                </div>
            </div>
        </div>

        <div class="overflow-hidden transition-shadow duration-300 bg-white rounded-lg shadow hover:shadow-md">
            <div class="p-5">
                <div class="flex items-center">
                    <div
                        class="flex items-center justify-center flex-shrink-0 w-12 h-12 mr-4 text-purple-600 bg-purple-100 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Applicants</p>
                        <p class="text-2xl font-semibold text-gray-800">{{ $applicantsCount }}</p>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('admin.applicants.manage') }}"
                        class="text-sm font-medium text-purple-600 hover:underline">View Applicants &rarr;</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Quick Actions Grid -->
    <div class="mb-8">
        <div class="grid grid-cols-2 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">

            <a href="{{ route('admin.slide.items.manage') }}"
                class="flex flex-col items-center p-4 transition-all duration-300 bg-white rounded-lg shadow hover:shadow-md hover:translate-y-[-2px]">
                <div class="flex items-center justify-center w-12 h-12 mb-3 text-pink-600 bg-pink-100 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <span class="text-xs font-medium text-gray-700 md:text-sm">Manage Slides</span>
            </a>

            <a href="{{ route('admin.downloads.manage') }}"
                class="flex flex-col items-center p-4 transition-all duration-300 bg-white rounded-lg shadow hover:shadow-md hover:translate-y-[-2px]">
                <div class="flex items-center justify-center w-12 h-12 mb-3 text-indigo-600 bg-indigo-100 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                </div>
                <span class="text-xs font-medium text-gray-700 md:text-sm">Manage Downloads</span>
            </a>

            <a href="{{ route('admin.galleries.manage') }}"
                class="flex flex-col items-center p-4 transition-all duration-300 bg-white rounded-lg shadow hover:shadow-md hover:translate-y-[-2px]">
                <div class="flex items-center justify-center w-12 h-12 mb-3 rounded-lg text-cyan-600 bg-cyan-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <span class="hidden text-sm font-medium text-gray-700 md:inline">Manage Gallery</span>
            </a>

            <a href="{{ route('admin.gallery.items.manage') }}"
                class="flex flex-col items-center p-4 transition-all duration-300 bg-white rounded-lg shadow hover:shadow-md hover:translate-y-[-2px]">
                <div class="flex items-center justify-center w-12 h-12 mb-3 text-teal-600 bg-teal-100 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                </div>
                <span class="text-xs font-medium text-gray-700 md:text-sm">Gallery Item</span>
            </a>

            <a href="{{ route('admin.partners.manage') }}"
                class="flex flex-col items-center p-4 transition-all duration-300 bg-white rounded-lg shadow hover:shadow-md hover:translate-y-[-2px]">
                <div class="flex items-center justify-center w-12 h-12 mb-3 text-yellow-600 bg-yellow-100 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <span class="text-xs font-medium text-gray-700 md:text-sm">Manage Partners</span>
            </a>
            <a href="{{ route('admin.success.stories.manage') }}"
                class="flex flex-col items-center p-4 transition-all duration-300 bg-white rounded-lg shadow hover:shadow-md hover:translate-y-[-2px]">
                <div class="flex items-center justify-center w-12 h-12 mb-3 text-purple-600 bg-purple-100 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                    </svg>
                </div>
                <span class="text-xs font-medium text-gray-700 md:text-sm">Success Stores</span>
            </a>
            <!-- manage roles route -->
            <a href="{{ route('admin.roles.manage') }}"
                class="flex flex-col items-center p-4 transition-all duration-300 bg-white rounded-lg shadow hover:shadow-md hover:translate-y-[-2px]">
                <div class="flex items-center justify-center w-12 h-12 mb-3 text-red-600 bg-red-100 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V7m-8 4h4m-4 4h4m-4 4h4m-8-8h4m-4 4h4m-4 4h4" />
                    </svg>
                </div>
                <span class="text-xs font-medium text-gray-700 md:text-sm">Manage Roles</span>
            </a>

        </div>
    </div>
    <!-- Recent Applicants -->
    <div class="overflow-hidden bg-white rounded-lg shadow">
        <div class="px-4 py-3 border-b">
            <h2 class="text-lg font-semibold text-gray-800">Recent Applicants</h2>
        </div>
        <div class="p-4">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">
                            Phone
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($recentApplicants as $applicant)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $applicant->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $applicant->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $applicant->phone }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $applicant->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>