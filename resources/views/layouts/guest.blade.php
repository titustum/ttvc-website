@section('title') {{ $title ?? "TTVC" }} @endsection

<x-app-layout title="Test" />

<header class="text-white bg-gray-900">
    <div class="flex items-center justify-between px-4 py-2 mx-auto text-sm lg:w-4/5">
        <nav class="items-center hidden space-x-4 md:flex">
            <a href="https://facebook.com/TetuTechnicalVocationalCollege" aria-label="Facebook"
                class="transition-colors hover:text-orange-400">
                <i class="fab fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="https://www.tiktok.com/@tetutvc019" aria-label="TikTok"
                class="transition-colors hover:text-orange-400">
                <i class="fab fa-tiktok" aria-hidden="true"></i>
            </a>
            <a href="#" aria-label="Twitter" class="transition-colors hover:text-orange-400">
                <i class="fab fa-twitter" aria-hidden="true"></i>
            </a>
            <a href="#" aria-label="YouTube" class="transition-colors hover:text-orange-400">
                <i class="fab fa-youtube" aria-hidden="true"></i>
            </a>
        </nav>
        <div class="flex items-center justify-between w-full md:w-auto">
            <div class="px-2">
                <i class="mr-1 fas fa-phone-alt"></i>
                <span>+254 758 660 300</span>
            </div>
            <div class="px-2 border-white md:border-l">
                <i class="mr-1 fas fa-envelope"></i>
                <a href="mailto:info@tetutvc.ac.ke"
                    class="transition-colors hover:text-orange-400">info@tetutvc.ac.ke</a>
            </div>
            <div class="hidden px-2 border-l border-white md:inline">
                <a href="#" class="transition-colors hover:text-orange-400">Tenders</a>
            </div>
            <div class="hidden px-2 border-l border-white md:inline">
                <a href="{{ route('downloads') }}" class="transition-colors hover:text-orange-400">Downloads</a>
            </div>
            <div class="hidden px-2 border-l border-white md:inline">
                <a href="{{ route('login') }}" class="transition-colors hover:text-orange-400">Student Portal</a>
            </div>
        </div>
    </div>
</header>

<nav id="mainNav" class="sticky top-0 z-30 w-full h-20 bg-white border-b shadow">
    <div class="flex items-center justify-between px-4 py-2 mx-auto lg:w-4/5">
        <div class="inline xl:hidden">
            <button id="mobileMenuButton"
                class="pr-4 text-2xl transition-colors fa fa-bars hover:text-orange-600"></button>
        </div>

        <a href="{{ route('welcome') }}" class="flex items-center text-orange-600 uppercase">
            <img src="{{ asset('images/logo.jpeg') }}" alt="Logo" class="h-12">
            <h1 class="font-['Righteous'] text-3xl hidden lg:inline ml-2">TETU TVC</h1>
        </a>

        <div class="items-center hidden font-semibold xl:flex">
            <a href="{{ route('welcome') }}"
                class="px-3 py-5 transition-all hover:text-orange-600 hover:border-b-2 hover:border-orange-600">HOME</a>
            <a href="{{ route('about') }}"
                class="px-3 py-5 transition-all hover:text-orange-600 hover:border-b-2 hover:border-orange-600">ABOUT
                US</a>

            <!-- Administration Dropdown -->
            <div class="relative group">
                <a href="{{ route('administration') }}"
                    class="flex items-center px-3 py-5 transition-all hover:text-orange-600 hover:border-b-2 hover:border-orange-600">
                    ADMINISTRATION
                    <i class="ml-1 text-xs fas fa-chevron-down"></i>
                </a>
                <div
                    class="absolute left-0 z-10 invisible w-56 mt-0 uppercase transition-all duration-300 bg-white shadow-lg opacity-0 group-hover:opacity-100 group-hover:visible">
                    <a href="{{ route('administration') }}#principal"
                        class="block px-4 py-3 text-gray-800 border-b border-gray-100 hover:bg-orange-100 hover:text-orange-600">Principal's
                        Office</a>
                    <a href="{{ route('administration') }}#deputy"
                        class="block px-4 py-3 text-gray-800 border-b border-gray-100 hover:bg-orange-100 hover:text-orange-600">Deputy
                        Principal</a>
                    <a href="{{ route('administration') }}#board"
                        class="block px-4 py-3 text-gray-800 border-b border-gray-100 hover:bg-orange-100 hover:text-orange-600">Board
                        of Governors</a>
                    <a href="{{ route('administration') }}#staff"
                        class="block px-4 py-3 text-gray-800 hover:bg-orange-100 hover:text-orange-600">Administrative
                        Staff</a>
                </div>
            </div>

            <!-- Departments Dropdown -->
            <div class="relative group">
                <a href="{{ route('departments') }}"
                    class="flex items-center px-3 py-5 transition-all hover:text-orange-600 hover:border-b-2 hover:border-orange-600">
                    DEPARTMENTS
                    <i class="ml-1 text-xs fas fa-chevron-down"></i>
                </a>
                <div
                    class="absolute left-0 z-10 invisible w-56 mt-0 uppercase transition-all duration-300 bg-white shadow-lg opacity-0 group-hover:opacity-100 group-hover:visible">
                    <a href="{{ route('departments') }}#engineering"
                        class="block px-4 py-3 text-gray-800 border-b border-gray-100 hover:bg-orange-100 hover:text-orange-600">Engineering</a>
                    <a href="{{ route('departments') }}#ict"
                        class="block px-4 py-3 text-gray-800 border-b border-gray-100 hover:bg-orange-100 hover:text-orange-600">ICT
                        & Computing</a>
                    <a href="{{ route('departments') }}#business"
                        class="block px-4 py-3 text-gray-800 border-b border-gray-100 hover:bg-orange-100 hover:text-orange-600">Business
                        Studies</a>
                    <a href="{{ route('departments') }}#hospitality"
                        class="block px-4 py-3 text-gray-800 border-b border-gray-100 hover:bg-orange-100 hover:text-orange-600">Hospitality
                        & Tourism</a>
                    <a href="{{ route('departments') }}#agriculture"
                        class="block px-4 py-3 text-gray-800 hover:bg-orange-100 hover:text-orange-600">Agriculture &
                        Environment</a>
                </div>
            </div>

            <a href="{{ route('courses') }}"
                class="px-3 py-5 transition-all hover:text-orange-600 hover:border-b-2 hover:border-orange-600">COURSES</a>
            <a href="{{ route('contact') }}"
                class="px-3 py-5 transition-all hover:text-orange-600 hover:border-b-2 hover:border-orange-600">CONTACT
                US</a>
        </div>

        <div class="flex items-center font-semibold">
            <a href="{{ route('admissions') }}"
                class="hidden px-5 py-2 ml-4 text-white transition-all bg-orange-600 rounded-full shadow-md lg:inline hover:bg-orange-700">
                APPLY NOW
            </a>
            <a href="{{ route('admissions') }}"
                class="px-4 py-3 transition-all md:ml-4 lg:hidden hover:text-orange-600">
                APPLY →
            </a>
        </div>
    </div>
</nav>

<!-- Mobile Menu -->
<div id="mobileMenu"
    class="fixed top-0 left-0 z-40 h-full overflow-y-auto transition-transform duration-300 ease-in-out transform -translate-x-full bg-white shadow-lg w-72 xl:hidden">
    <div class="p-6">
        <div class="flex items-center justify-between mb-8">
            <img src="{{ asset('images/logo.jpeg') }}" alt="Logo" class="h-10">
            <button id="closeMobileMenu" class="text-2xl fa fa-times hover:text-orange-600"></button>
        </div>
        <div class="space-y-1">
            <a href="{{ route('welcome') }}"
                class="block px-2 py-3 transition-all rounded hover:bg-orange-100 hover:text-orange-600">HOME</a>
            <a href="{{ route('about') }}"
                class="block px-2 py-3 transition-all rounded hover:bg-orange-100 hover:text-orange-600">ABOUT US</a>

            <!-- Mobile Administration Dropdown -->
            <div class="mobile-dropdown">
                <button
                    class="flex items-center justify-between w-full px-2 py-3 transition-all rounded hover:bg-orange-100 hover:text-orange-600">
                    ADMINISTRATION
                    <i class="text-xs fas fa-chevron-down"></i>
                </button>
                <div class="hidden pl-4 mt-1 space-y-1">
                    <a href="{{ route('administration') }}#principal"
                        class="block px-2 py-2 transition-all rounded hover:bg-orange-100 hover:text-orange-600">Principal's
                        Office</a>
                    <a href="{{ route('administration') }}#deputy"
                        class="block px-2 py-2 transition-all rounded hover:bg-orange-100 hover:text-orange-600">Deputy
                        Principal</a>
                    <a href="{{ route('administration') }}#board"
                        class="block px-2 py-2 transition-all rounded hover:bg-orange-100 hover:text-orange-600">Board
                        of Governors</a>
                    <a href="{{ route('administration') }}#staff"
                        class="block px-2 py-2 transition-all rounded hover:bg-orange-100 hover:text-orange-600">Administrative
                        Staff</a>
                </div>
            </div>

            <!-- Mobile Departments Dropdown -->
            <div class="mobile-dropdown">
                <button
                    class="flex items-center justify-between w-full px-2 py-3 transition-all rounded hover:bg-orange-100 hover:text-orange-600">
                    DEPARTMENTS
                    <i class="text-xs fas fa-chevron-down"></i>
                </button>
                <div class="hidden pl-4 mt-1 space-y-1">
                    <a href="{{ route('departments') }}#engineering"
                        class="block px-2 py-2 transition-all rounded hover:bg-orange-100 hover:text-orange-600">Engineering</a>
                    <a href="{{ route('departments') }}#ict"
                        class="block px-2 py-2 transition-all rounded hover:bg-orange-100 hover:text-orange-600">ICT &
                        Computing</a>
                    <a href="{{ route('departments') }}#business"
                        class="block px-2 py-2 transition-all rounded hover:bg-orange-100 hover:text-orange-600">Business
                        Studies</a>
                    <a href="{{ route('departments') }}#hospitality"
                        class="block px-2 py-2 transition-all rounded hover:bg-orange-100 hover:text-orange-600">Hospitality
                        & Tourism</a>
                    <a href="{{ route('departments') }}#agriculture"
                        class="block px-2 py-2 transition-all rounded hover:bg-orange-100 hover:text-orange-600">Agriculture
                        & Environment</a>
                </div>
            </div>

            <a href="{{ route('courses') }}"
                class="block px-2 py-3 transition-all rounded hover:bg-orange-100 hover:text-orange-600">COURSES</a>
            <a href="{{ route('contact') }}"
                class="block px-2 py-3 transition-all rounded hover:bg-orange-100 hover:text-orange-600">CONTACT US</a>
            <div class="pt-4 mt-4 border-t border-gray-200">
                <a href="{{ route('downloads') }}"
                    class="block px-2 py-3 transition-all rounded hover:bg-orange-100 hover:text-orange-600">DOWNLOADS</a>
                <a href="#"
                    class="block px-2 py-3 transition-all rounded hover:bg-orange-100 hover:text-orange-600">TENDERS</a>
                <a href="{{ route('login') }}"
                    class="block px-2 py-3 transition-all rounded hover:bg-orange-100 hover:text-orange-600">STUDENT
                    PORTAL</a>
                <a href="{{ route('admissions') }}"
                    class="block px-2 py-3 mt-4 text-center text-white transition-all bg-orange-600 rounded hover:bg-orange-700">APPLY
                    NOW</a>
            </div>
        </div>

    </div>
</div>

</div>




{{ $slot }}


<footer class="py-12 text-white bg-gray-800">
    <div class="container px-4 mx-auto">
        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-4">
            <!-- About Tetu TVC -->
            <div data-aos='fade-up'>
                <h3 class="mb-4 text-xl font-semibold">About Tetu TVC</h3>
                <p class="mb-4 text-gray-400">Tetu Technical and Vocational College is committed to providing quality
                    education and training to empower students for successful careers.</p>
                <a href="/about" class="text-orange-400 hover:text-orange-300">Learn More</a>
            </div>

            <!-- Quick Links -->
            <div data-aos='fade-up'>
                <h3 class="mb-4 text-xl font-semibold">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('courses')  }}" class="text-gray-400 hover:text-white">Programs</a></li>
                    <li><a href="{{ route('admissions') }}" class="text-gray-400 hover:text-white">Admissions</a></li>
                    <li><a href="{{ route('departments') }}" class="text-gray-400 hover:text-white">Departments</a></li>
                    <li><a href="{{ route('administration') }}"
                            class="text-gray-400 hover:text-white">Administration</a></li>
                    <li><a href="{{ route('downloads') }}" class="text-gray-400 hover:text-white">Downloads</a></li>
                </ul>
            </div>

            <!-- Contact Information -->
            <div data-aos='fade-up'>
                <h3 class="mb-4 text-xl font-semibold">Contact Us</h3>
                <ul class="space-y-2 text-gray-400">
                    <li>
                        <i class="mr-2 text-orange-400 fas fa-map-marker-alt"></i>
                        P.O. Box 1716-10100, Nyeri, Kenya
                    </li>
                    <li>
                        <i class="mr-2 text-orange-400 fas fa-phone"></i>
                        +254 758 660 300
                    </li>
                    <li>
                        <i class="mr-2 text-orange-400 fas fa-envelope"></i>
                        info@tetutvc.ac.ke
                    </li>
                </ul>
            </div>

            <!-- Newsletter Signup -->
            <div data-aos='fade-up'>
                <h3 class="mb-4 text-xl font-semibold">Stay Connected</h3>
                <p class="mb-4 text-gray-400">Subscribe to our newsletter for updates and news.</p>
                <form class="flex">
                    <input type="email" placeholder="Enter your email"
                        class="w-full px-3 py-2 text-gray-800 rounded-l-md focus:outline-none focus:ring-2 focus:ring-orange-400">
                    <button type="submit"
                        class="px-4 py-2 transition duration-300 bg-orange-600 hover:bg-orange-700 rounded-r-md">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>

        <!-- Social Media Links -->
        <div class="flex flex-col items-center justify-between pt-8 mt-8 border-t border-gray-700 md:flex-row">
            <div class="mb-4 md:mb-0">
                <a href="#" class="mr-4 text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="mr-4 text-gray-400 hover:text-white"><i class="fab fa-tiktok"></i></a>
                <a href="#" class="mr-4 text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                <a href="#" class="mr-4 text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="text-sm text-gray-400">
                © 2024 Tetu Technical and Vocational College. All rights reserved.
            </div>
        </div>
    </div>
</footer>



</x-app-layout />