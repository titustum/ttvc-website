<?php

use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;

new
#[Title('Donwloads')]
#[Layout('layouts.guest')]
class extends Component
{


}; ?>

<main>
<div class="container px-4 py-8 mx-auto min-h-[70vh]">
    <h1 class="mb-6 text-3xl font-bold">Downloads</h1>

    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        <!-- Download Item 1 -->
        <div class="p-6 bg-white rounded-lg shadow-md">
            <h2 class="mb-2 text-xl font-semibold">Student Handbook</h2>
            <p class="mb-4 text-gray-600">Essential information for all students</p>
            <a href="#" class="inline-block px-4 py-2 text-white transition-colors bg-orange-600 rounded-full hover:bg-orange-700">
                <i class="mr-2 fas fa-download"></i>Download PDF
            </a>
        </div>

        <!-- Download Item 2 -->
        <div class="p-6 bg-white rounded-lg shadow-md">
            <h2 class="mb-2 text-xl font-semibold">Course Catalog</h2>
            <p class="mb-4 text-gray-600">Complete list of courses offered</p>
            <a href="#" class="inline-block px-4 py-2 text-white transition-colors bg-orange-600 rounded-full hover:bg-orange-700">
                <i class="mr-2 fas fa-download"></i>Download PDF
            </a>
        </div>

        <!-- Download Item 3 -->
        <div class="p-6 bg-white rounded-lg shadow-md">
            <h2 class="mb-2 text-xl font-semibold">Academic Calendar</h2>
            <p class="mb-4 text-gray-600">Important dates for the academic year</p>
            <a href="#" class="inline-block px-4 py-2 text-white transition-colors bg-orange-600 rounded-full hover:bg-orange-700">
                <i class="mr-2 fas fa-download"></i>Download PDF
            </a>
        </div>

        <!-- Add more download items as needed -->
    </div>
</div>
</main>
