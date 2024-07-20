<x-app-layout>

    <div class="min-h-screen bg-gray-100">
        <!-- Navigation -->
        <nav class="bg-white shadow-md">
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="flex items-center flex-shrink-0">
                            <img class="w-auto h-8" src="{{ asset('images/logo.jpeg') }}" alt="Tetu College Logo">
                        </div>
                        <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                            <a href="{{ route('dashboard') }}"
                                class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-900 border-b-2 border-orange-600">Dashboard</a>
                            <a href="#"
                                class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500 hover:text-gray-900 hover:border-gray-300">Departments</a>
                            <a href="{{ route('courses.view') }}"
                                class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500 hover:text-gray-900 hover:border-gray-300">Courses</a>
                            <a href="{{ route('applicants.view') }}"
                                class="inline-flex items-center px-1 pt-1 text-sm font-medium text-gray-500 hover:text-gray-900 hover:border-gray-300">Applicants</a>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="relative ml-3" x-data="{ open: false }">
                            <div>
                                <button @click="open = !open"
                                    class="flex text-sm bg-white rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-600"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="w-8 h-8 rounded-full" src="{{ asset('images/avatar.jpg') }}" alt="">
                                </button>
                            </div>
                            <div x-show="open" @click.away="open = false"
                                class="absolute right-0 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                tabindex="-1">
                                <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem">Your Profile</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem">Settings</a>

                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit"
                                                class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100"
                                                role="menuitem">Sign out
                                        </button>
                                    </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->

        {{ $slot }}


    </div>


</x-app-layout>
