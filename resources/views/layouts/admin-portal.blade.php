@section('title') {{ $title ?? "TTVC" }} @endsection

<x-app-layout title="Admin Portal">
    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar Navigation -->
        <div
            class="fixed left-0 z-30 hidden w-64 min-h-screen transition duration-300 transform bg-white shadow-lg inset-0-y-0 md:block">
            <!-- Logo -->
            <div class="flex items-center justify-center h-16 px-6 border-b border-gray-200">
                <img class="w-auto h-10" src="{{ asset('images/logo.jpeg') }}" alt="Tetu College Logo">
            </div>

            <!-- Navigation Links -->
            <nav class="px-4 mt-6 space-y-1">
                <a href="{{ route('dashboard') }}"
                    class="flex items-center px-4 py-3 text-sm font-medium {{ request()->routeIs('dashboard') ? 'text-orange-600 bg-orange-50 rounded-lg' : 'text-gray-700 hover:text-orange-600 hover:bg-orange-50 rounded-lg' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Dashboard
                </a>

                <a href="#"
                    class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 rounded-lg hover:text-orange-600 hover:bg-orange-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    Departments
                </a>

                <a href="{{ route('courses.view') }}"
                    class="flex items-center px-4 py-3 text-sm font-medium {{ request()->routeIs('courses.*') ? 'text-orange-600 bg-orange-50 rounded-lg' : 'text-gray-700 hover:text-orange-600 hover:bg-orange-50 rounded-lg' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    Courses
                </a>

                <a href="{{ route('applicants.view') }}"
                    class="flex items-center px-4 py-3 text-sm font-medium {{ request()->routeIs('applicants.*') ? 'text-orange-600 bg-orange-50 rounded-lg' : 'text-gray-700 hover:text-orange-600 hover:bg-orange-50 rounded-lg' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Trainers
                </a>
                <a href="{{ route('applicants.view') }}"
                    class="flex items-center px-4 py-3 text-sm font-medium {{ request()->routeIs('applicants.*') ? 'text-orange-600 bg-orange-50 rounded-lg' : 'text-gray-700 hover:text-orange-600 hover:bg-orange-50 rounded-lg' }}">
                    <i class="mr-3 fas fa-briefcase"></i>
                    Partners
                </a>
                <a href="{{ route('applicants.view') }}"
                    class="flex items-center px-4 py-3 text-sm font-medium {{ request()->routeIs('applicants.*') ? 'text-orange-600 bg-orange-50 rounded-lg' : 'text-gray-700 hover:text-orange-600 hover:bg-orange-50 rounded-lg' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Applicants
                </a>

                <div class="pt-4 mt-6 border-t border-gray-200">
                    <a href="{{ route('profile') }}"
                        class="flex items-center px-4 py-3 text-sm font-medium {{ request()->routeIs('profile') ? 'text-orange-600 bg-orange-50 rounded-lg' : 'text-gray-700 hover:text-orange-600 hover:bg-orange-50 rounded-lg' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Profile
                    </a>

                    <a href="#"
                        class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 rounded-lg hover:text-orange-600 hover:bg-orange-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Settings
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="flex items-center w-full px-4 py-3 text-sm font-medium text-gray-700 rounded-lg hover:text-orange-600 hover:bg-orange-50">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Sign out
                        </button>
                    </form>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex flex-col flex-1 md:ml-64">
            <!-- Top Header -->
            <header class="flex items-center justify-between h-16 px-6 bg-white shadow-sm">
                <div class="flex items-center space-x-4">
                    <h1 class="text-xl font-semibold text-gray-800">{{ $title ?? 'Dashboard' }}</h1>
                </div>

                <!-- User Profile Dropdown -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open"
                        class="flex items-center text-sm transition duration-150 ease-in-out border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300">
                        <img class="object-cover w-8 h-8 rounded-full" src="{{ asset('images/avatar.jpg') }}"
                            alt="User avatar">
                        <span class="hidden ml-2 text-sm font-medium text-gray-700 md:block">{{ Auth::user()->name
                            }}</span>
                        <svg class="w-4 h-4 ml-1 text-gray-400 fill-current" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>

                    <div x-show="open" @click.away="open = false"
                        class="absolute right-0 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                        <a href="{{ route('profile') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Your Profile</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100">
                                Sign out
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 p-6 overflow-y-auto">
                {{ $slot }}
            </main>
        </div>
    </div>
</x-app-layout>