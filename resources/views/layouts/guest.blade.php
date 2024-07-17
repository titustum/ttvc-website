@section('title') {{ $title ?? "TTVC" }} @endsection

<x-app-layout title="Test"/>

    <header class="text-white bg-black">
        <div class="px-3 py-2 lg:w-[90%] mx-auto flex items-center justify-between text-sm lg:px-0">
            <nav class="items-center hidden md:flex">
                <a href="#" aria-label="Facebook"> <i class="fab fa-facebook" aria-hidden="true"></i> </a>
                <a href="#" aria-label="Twitter" class="ml-4"> <i class="fab fa-twitter" aria-hidden="true"></i> </a>
                <a href="#" aria-label="YouTube" class="ml-4"> <i class="fab fa-youtube" aria-hidden="true"></i> </a>
                <a href="#" aria-label="TikTok" class="ml-4"> <i class="fab fa-tiktok" aria-hidden="true"></i> </a>
            </nav>
            <div class="flex items-center justify-between w-full md:w-auto">
                <div class="px-2">
                    <span>+254 758 660 300</span>
                </div>
                <div class="px-2 border-white md:border-l">
                    <a href="mailto:info@tetutvc.ac.ke">info@tetutvc.ac.ke</a>
                </div>
                <div class="hidden px-2 border-l border-white md:inline">
                    <a href="#">Tenders</a>
                </div>
                <div class="hidden px-2 border-l border-white md:inline">
                    <a href="{{ route('downloads') }}">Downloads</a>
                </div>
                @auth
                <div class="hidden px-2 text-orange-600 border-l border-white md:inline">
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                </div>
                @else
                <div class="hidden px-2 border-l border-white md:inline">
                    <a href="{{ route('login') }}">Signin</a>
                </div>
                @endauth

            </div>
        </div>
      </header>


        <nav id="mainNav" class="bg-white border-b shadow h-[70px] top-0 sticky w-full z-30">
            <div class="flex justify-between items-center px-3 py-2 lg:w-[90%] mt-2 lg:px-0 mx-auto">
                <div class="inline xl:hidden">
                    <button id="mobileMenuButton" class="text-2xl fa fa-bars"></button>
                </div>

                <a href="{{ route('welcome') }}" class="flex items-center text-orange-600 uppercase">
                    <img src="{{ asset('images/logo.jpeg') }}" alt="Logo" class="h-10">
                    <h1 class="font-['Righteous'] text-3xl hidden lg:inline">TETU TVC</h1>
                </a>
                <div class="items-center hidden font-semibold xl:flex">
                    <a href="{{ route('welcome') }}" class="transition-all hover:text-orange-600">HOME</a>
                    <a href="{{ route('about') }}" class="ml-4 transition-all hover:text-orange-600">ABOUT US</a>
                    <a href="{{ route('administration') }}" class="ml-4 transition-all hover:text-orange-600">ADMINISTRATION</a>
                    <a href="{{ route('departments') }}" class="ml-4 transition-all hover:text-orange-600">DEPARTMENTS</a>
                    <a href="{{ route('courses') }}" class="ml-4 transition-all hover:text-orange-600">COURSES</a>
                    <a href="{{ route('contact') }}" class="ml-4 transition-all hover:text-orange-600">CONTACT US</a>
                </div>

                <div class="flex items-center font-semibold">
                    <a href="{{ route('admissions') }}"
                        class="hidden px-4 py-3 ml-4 text-white transition-all bg-orange-600 rounded-full lg:inline hover:opacity-80">
                        APPLY NOW
                    </a>
                    <a href="{{ route('admissions') }}" class="px-4 py-3 ml-4 transition-all lg:hidden hover:text-orange-600 focus:orange-600">
                        {{-- <i class="text-2xl fas fa-envelope-open"></i> --}}
                        APPLY →
                    </a>
                </div>
            </div>
        </nav>

      <!-- Mobile Menu -->
      <div id="mobileMenu" class="fixed top-0 left-0 z-40 w-64 h-full transition-transform duration-300 ease-in-out transform -translate-x-full bg-white shadow-lg xl:hidden">
          <div class="p-4">
              <button id="closeMobileMenu" class="float-right text-2xl fa fa-times"></button>
              <div class="mt-8 space-y-4">
                  <a href="{{ route('welcome') }}" class="block transition-all hover:text-orange-600">HOME</a>
                  <a href="{{ route('about') }}" class="block transition-all hover:text-orange-600">ABOUT US</a>
                  <a href="{{ route('administration') }}" class="block transition-all hover:text-orange-600">ADMINISTRATION</a>
                  <a href="{{ route('departments') }}" class="block transition-all hover:text-orange-600">DEPARTMENTS</a>
                  <a href="#" class="block transition-all hover:text-orange-600">ACADEMICS</a>
                  <a href="{{ route('contact') }}" class="block transition-all hover:text-orange-600">CONTACT US</a>
                  <a href="{{ route('downloads') }}" class="block transition-all hover:text-orange-600">DOWNLOADS</a>
                  <a href="#" class="block transition-all hover:text-orange-600">TENDERS</a>
                  <a href="{{ route('login') }}" class="block transition-all hover:text-orange-600">SIGNIN</a>
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
                    <p class="mb-4 text-gray-400">Tetu Technical and Vocational College is committed to providing quality education and training to empower students for successful careers.</p>
                    <a href="/about" class="text-orange-400 hover:text-orange-300">Learn More</a>
                </div>

                <!-- Quick Links -->
                <div data-aos='fade-up'>
                    <h3 class="mb-4 text-xl font-semibold">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="/programs" class="text-gray-400 hover:text-white">Programs</a></li>
                        <li><a href="/admissions" class="text-gray-400 hover:text-white">Admissions</a></li>
                        <li><a href="/student-life" class="text-gray-400 hover:text-white">Student Life</a></li>
                        <li><a href="/events" class="text-gray-400 hover:text-white">Events</a></li>
                        <li><a href="/careers" class="text-gray-400 hover:text-white">Careers</a></li>
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
                        <input type="email" placeholder="Enter your email" class="w-full px-3 py-2 text-gray-800 rounded-l-md focus:outline-none focus:ring-2 focus:ring-orange-400">
                        <button type="submit" class="px-4 py-2 transition duration-300 bg-orange-600 hover:bg-orange-700 rounded-r-md">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>

            <!-- Social Media Links -->
            <div class="flex flex-col items-center justify-between pt-8 mt-8 border-t border-gray-700 md:flex-row">
                <div class="mb-4 md:mb-0">
                    <a href="#" class="mr-4 text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="mr-4 text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="mr-4 text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="text-sm text-gray-400">
                    © 2024 Tetu Technical and Vocational College. All rights reserved.
                </div>
            </div>
        </div>
      </footer>



</x-app-layout/>
