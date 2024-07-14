<?php

use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{

}; ?>

<main>


<!-- ======================start courses section ============== -->



<section class="py-16 bg-gray-100">
    <div class="container px-4 mx-auto">
        <h1 class="mb-12 text-4xl font-bold text-center text-gray-800">
            <span class="py-3 border-b-4 border-orange-600">Our Courses</span>
        </h1>

        <!-- Search and Filter -->
        <div class="mb-8">
            <div class="flex flex-col items-center justify-between md:flex-row">
                <input type="text" placeholder="Search courses..." class="w-full px-4 py-2 mb-4 border border-gray-300 rounded-md md:w-1/3 focus:outline-none focus:ring-2 focus:ring-orange-600 md:mb-0">
                <select class="w-full px-4 py-2 border border-gray-300 rounded-md md:w-1/4 focus:outline-none focus:ring-2 focus:ring-orange-600">
                    <option value="">All Departments</option>
                    <option value="cosmetology">Cosmetology</option>
                    <option value="building">Building and Construction</option>
                    <option value="electrical">Electrical Engineering</option>
                    <option value="fashion">Fashion Design</option>
                    <option value="hospitality">Hospitality</option>
                    <option value="ict">ICT</option>
                    <option value="agriculture">Agriculture</option>
                </select>
            </div>
        </div>

        <!-- Courses Grid -->
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            <!-- Cosmetology Courses -->
            <div class="overflow-hidden bg-white rounded-lg shadow-md">
                <img src="{{ asset('images/departments/hair-styling.png') }}" alt="Hair Styling" class="object-cover w-full h-48">
                <div class="p-6">
                    <span class="text-sm font-semibold text-orange-600">Cosmetology</span>
                    <h2 class="mt-2 mb-4 text-xl font-bold text-gray-800">Certificate in Hairdressing</h2>
                    <p class="mb-4 text-gray-600">Master the art of cutting, styling, and coloring hair. Learn the latest techniques and trends in the industry.</p>
                    <a href="#" class="font-semibold text-orange-600 hover:text-orange-700">Learn More →</a>
                </div>
            </div>

            <!-- Building and Construction Courses -->
            <div class="overflow-hidden bg-white rounded-lg shadow-md">
                <img src="{{ asset('images/departments/building.jpg') }}" alt="Construction Management" class="object-cover w-full h-48">
                <div class="p-6">
                    <span class="text-sm font-semibold text-orange-600">Building and Construction</span>
                    <h2 class="mt-2 mb-4 text-xl font-bold text-gray-800">Diploma in Construction Management</h2>
                    <p class="mb-4 text-gray-600">Develop skills in project planning, budgeting, and site management for construction projects.</p>
                    <a href="#" class="font-semibold text-orange-600 hover:text-orange-700">Learn More →</a>
                </div>
            </div>

            <!-- Electrical Engineering Courses -->
            <div class="overflow-hidden bg-white rounded-lg shadow-md">
                <img src="{{ asset('images/departments/electrical.jpg') }}" alt="Electrical Installation" class="object-cover w-full h-48">
                <div class="p-6">
                    <span class="text-sm font-semibold text-orange-600">Electrical Engineering</span>
                    <h2 class="mt-2 mb-4 text-xl font-bold text-gray-800">Certificate in Electrical Installation</h2>
                    <p class="mb-4 text-gray-600">Learn the fundamentals of electrical systems, wiring, and safety procedures for residential and commercial installations.</p>
                    <a href="#" class="font-semibold text-orange-600 hover:text-orange-700">Learn More →</a>
                </div>
            </div>

            <!-- Fashion Design Courses -->
            <div class="overflow-hidden bg-white rounded-lg shadow-md">
                <img src="{{ asset('images/departments/Fashion.jpg') }}" alt="Fashion Design" class="object-cover w-full h-48">
                <div class="p-6">
                    <span class="text-sm font-semibold text-orange-600">Fashion Design</span>
                    <h2 class="mt-2 mb-4 text-xl font-bold text-gray-800">Diploma in Fashion Design and Garment Making</h2>
                    <p class="mb-4 text-gray-600">Explore the world of fashion design, pattern making, and garment construction techniques.</p>
                    <a href="#" class="font-semibold text-orange-600 hover:text-orange-700">Learn More →</a>
                </div>
            </div>

            <!-- Hospitality Courses -->
            <div class="overflow-hidden bg-white rounded-lg shadow-md">
                <img src="{{ asset('images/departments/Hospitality.jpg') }}" alt="Culinary Arts" class="object-cover w-full h-48">
                <div class="p-6">
                    <span class="text-sm font-semibold text-orange-600">Hospitality</span>
                    <h2 class="mt-2 mb-4 text-xl font-bold text-gray-800">Certificate in Culinary Arts</h2>
                    <p class="mb-4 text-gray-600">Develop your culinary skills and learn about food preparation, kitchen management, and international cuisines.</p>
                    <a href="#" class="font-semibold text-orange-600 hover:text-orange-700">Learn More →</a>
                </div>
            </div>

            <!-- ICT Courses -->
            <div class="overflow-hidden bg-white rounded-lg shadow-md">
                <img src="{{ asset('images/departments/ict-ab2.jpg') }}" alt="Software Development" class="object-cover w-full h-48">
                <div class="p-6">
                    <span class="text-sm font-semibold text-orange-600">ICT</span>
                    <h2 class="mt-2 mb-4 text-xl font-bold text-gray-800">Diploma in ICT</h2>
                    <p class="mb-4 text-gray-600">Learn programming languages, software design principles, and other methodologies.</p>
                    <a href="#" class="font-semibold text-orange-600 hover:text-orange-700">Learn More →</a>
                </div>
            </div>

            <!-- Agriculture Courses -->
            <div class="overflow-hidden bg-white rounded-lg shadow-md">
                <img src="{{ asset('images/departments/agrics-maize.jpg') }}" alt="Agriculture" class="object-cover w-full h-48">
                <div class="p-6">
                    <span class="text-sm font-semibold text-orange-600">Agriculture</span>
                    <h2 class="mt-2 mb-4 text-xl font-bold text-gray-800">Certificate in Modern Agricultural Practices</h2>
                    <p class="mb-4 text-gray-600">Study sustainable farming techniques, crop management, and agricultural technology.</p>
                    <a href="#" class="font-semibold text-orange-600 hover:text-orange-700">Learn More →</a>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="flex justify-center mt-12">
            <nav class="inline-flex rounded-md shadow">
                <a href="#" class="px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50">
                    Previous
                </a>
                <a href="#" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border-t border-b border-gray-300 hover:bg-gray-50">
                    1
                </a>
                <a href="#" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50">
                    2
                </a>
                <a href="#" class="px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50">
                    Next
                </a>
            </nav>
        </div>
    </div>
</section>

<!-- =================end courses ========================== -->


</main>
