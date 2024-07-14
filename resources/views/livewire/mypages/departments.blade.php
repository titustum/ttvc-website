<?php

use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{



}; ?>

<main>

<!-- ======================start department section ============== -->

<section class="py-16 bg-gray-100">
    <div class="container px-4 mx-auto">
        <h1 class="mb-12 text-4xl font-bold text-center text-gray-800">Our Departments</h1>

        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            <!-- Cosmetology -->
            <div class="overflow-hidden bg-white rounded-lg shadow-md">
                <img src="{{ asset('images/departments/Cosmetology.jpg') }}" alt="Cosmetology" class="object-cover w-full h-48">
                <div class="p-6">
                    <h2 class="mb-2 text-2xl font-semibold text-gray-800">Cosmetology</h2>
                    <p class="mb-4 text-gray-600">Master the art of beauty and personal care with our comprehensive cosmetology programs.</p>
                    <ul class="mb-4 text-gray-600">
                        <li>• Hair Styling and Cutting</li>
                        <li>• Makeup Artistry</li>
                        <li>• Nail Technology</li>
                    </ul>
                    <a href="#" class="font-semibold text-orange-600 hover:text-orange-700">Explore Courses →</a>
                </div>
            </div>

            <!-- Building and Construction -->
            <div class="overflow-hidden bg-white rounded-lg shadow-md">
                <img src="{{ asset('images/departments/building.jpg') }}" alt="Building and Construction" class="object-cover w-full h-48">
                <div class="p-6">
                    <h2 class="mb-2 text-2xl font-semibold text-gray-800">Building and Construction</h2>
                    <p class="mb-4 text-gray-600">Develop skills in modern construction techniques and project management.</p>
                    <ul class="mb-4 text-gray-600">
                        <li>• Architectural Drafting</li>
                        <li>• Construction Management</li>
                        <li>• Sustainable Building Practices</li>
                    </ul>
                    <a href="#" class="font-semibold text-orange-600 hover:text-orange-700">Explore Courses →</a>
                </div>
            </div>

            <!-- Electrical Engineering -->
            <div class="overflow-hidden bg-white rounded-lg shadow-md">
                <img src="{{ asset('images/departments/electrical.jpg') }}" alt="Electrical Engineering" class="object-cover w-full h-48">
                <div class="p-6">
                    <h2 class="mb-2 text-2xl font-semibold text-gray-800">Electrical Engineering</h2>
                    <p class="mb-4 text-gray-600">Learn about power systems, electronics, and renewable energy technologies.</p>
                    <ul class="mb-4 text-gray-600">
                        <li>• Electrical Installation</li>
                        <li>• Power Systems Analysis</li>
                        <li>• Renewable Energy Technologies</li>
                    </ul>
                    <a href="#" class="font-semibold text-orange-600 hover:text-orange-700">Explore Courses →</a>
                </div>
            </div>

            <!-- Fashion Design and Clothing Technology -->
            <div class="overflow-hidden bg-white rounded-lg shadow-md">
                <img src="{{ asset('images/departments/Fashion.jpg') }}" alt="Fashion Design" class="object-cover w-full h-48">
                <div class="p-6">
                    <h2 class="mb-2 text-2xl font-semibold text-gray-800">Fashion Design and Clothing Technology</h2>
                    <p class="mb-4 text-gray-600">Unleash your creativity in fashion design, textile development, and garment construction.</p>
                    <ul class="mb-4 text-gray-600">
                        <li>• Pattern Making</li>
                        <li>• Textile Design</li>
                        <li>• Fashion Merchandising</li>
                    </ul>
                    <a href="#" class="font-semibold text-orange-600 hover:text-orange-700">Explore Courses →</a>
                </div>
            </div>

            <!-- Hospitality -->
            <div class="overflow-hidden bg-white rounded-lg shadow-md">
                <img src="{{ asset('images/departments/Hospitality.jpg') }}" alt="Hospitality" class="object-cover w-full h-48">
                <div class="p-6">
                    <h2 class="mb-2 text-2xl font-semibold text-gray-800">Hospitality</h2>
                    <p class="mb-4 text-gray-600">Develop skills in customer service, hotel management, and culinary arts for a thriving career.</p>
                    <ul class="mb-4 text-gray-600">
                        <li>• Hotel Management</li>
                        <li>• Culinary Arts</li>
                        <li>• Event Planning</li>
                    </ul>
                    <a href="#" class="font-semibold text-orange-600 hover:text-orange-700">Explore Courses →</a>
                </div>
            </div>

            <!-- ICT -->
            <div class="overflow-hidden bg-white rounded-lg shadow-md">
                <img src="{{ asset('images/departments/ict.jpg') }}" alt="ICT" class="object-cover w-full h-48">
                <div class="p-6">
                    <h2 class="mb-2 text-2xl font-semibold text-gray-800">ICT</h2>
                    <p class="mb-4 text-gray-600">Gain cutting-edge skills in programming, networking, and digital technologies.</p>
                    <ul class="mb-4 text-gray-600">
                        <li>• Software Development</li>
                        <li>• Network Administration</li>
                        <li>• Cybersecurity</li>
                    </ul>
                    <a href="#" class="font-semibold text-orange-600 hover:text-orange-700">Explore Courses →</a>
                </div>
            </div>

            <!-- Agriculture -->
            <div class="overflow-hidden bg-white rounded-lg shadow-md">
                <img src="{{ asset('images/departments/agricultre.jpg') }}" alt="Agriculture" class="object-cover w-full h-48">
                <div class="p-6">
                    <h2 class="mb-2 text-2xl font-semibold text-gray-800">Agriculture</h2>
                    <p class="mb-4 text-gray-600">Learn sustainable farming practices, agribusiness management, and modern agricultural technologies.</p>
                    <ul class="mb-4 text-gray-600">
                        <li>• Crop Production</li>
                        <li>• Animal Husbandry</li>
                        <li>• Agribusiness Management</li>
                    </ul>
                    <a href="#" class="font-semibold text-orange-600 hover:text-orange-700">Explore Courses →</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-12 text-white bg-orange-600">
    <div class="container px-4 mx-auto text-center">
        <h2 class="mb-4 text-3xl font-bold">Find Your Path to Success</h2>
        <p class="mb-8 text-xl">Explore our departments and discover the perfect program for your career goals.</p>
        <a href="{{ route('admissions') }}" class="px-8 py-3 font-semibold text-orange-600 transition duration-300 bg-white rounded-full hover:bg-gray-200">
            Apply Now
        </a>
    </div>
</section>



<!-- =================end department ========================== -->

</main>
