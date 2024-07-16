<?php

use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    //
}; ?>


<main>

<!-- ======================start about section ============== -->

<section class="py-16 bg-gray-100">
    <div class="container px-4 mx-auto">
        <h2 class="mb-8 text-4xl font-bold text-center text-gray-800">About Tetu TVC</h2>

        <div class="grid items-center grid-cols-1 gap-12 md:grid-cols-2">
            <div>
                <img src="./images/gate.jpg" alt="Tetu TVC Campus" class="rounded-lg shadow-lg">
            </div>
            <div>
                <h3 class="mb-4 text-2xl font-semibold text-orange-600">Our Vision</h3>
                <p class="mb-6 text-gray-700">
                    To be the leading institution in offering technical skills in Kenya and beyond.
                </p>
                <h3 class="mb-4 text-2xl font-semibold text-orange-600">Our Mission</h3>
                <p class="mb-6 text-gray-700">
                    To provide TVET skills using the most appropriate technology to empower trainees for global competitiveness.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="container px-4 mx-auto">
        <h2 data-aos="fade-up" class="mb-8 text-3xl font-bold text-center text-gray-800">Our Journey</h2>

        <div data-aos="fade-up" class="p-8 bg-gray-100 rounded-lg shadow-md">
            <p class="mb-4 text-gray-700">
                Established in March 2019, Tetu Technical & Vocational College emerged from a collaboration between the National Government and Tetu NG CDF. Located in Nyeri County, our institution has grown from an initial enrollment of 89 students to become a beacon of technical education in the region.
            </p>
            <p class="mb-4 text-gray-700">
                Our Strategic Plan (2020-2025) guides our expansion, focusing on infrastructure development, industry-focused programs, and increased student enrollment. Launched in February 2022, it aligns with MoE and TVETA strategic objectives.
            </p>
            <p class="text-gray-700">
                We actively engage with the local community through employment opportunities, sourcing local produce, and encouraging the development of student accommodations. Our environmental initiatives include providing tree seedlings and promoting avocado farming for economic prosperity.
            </p>
        </div>
    </div>
</section>

<section class="py-16 text-white bg-orange-600">
    <div class="container px-4 mx-auto text-center">
        <h2 data-aos="fade-up" class="mb-8 text-3xl font-bold">Our Commitment</h2>
        <p data-aos="fade-up" class="mb-8 text-xl">
            Tetu TVC is dedicated to providing equitable access to technical education, fostering innovation, and producing socially responsible graduates with the skills and entrepreneurial spirit necessary for Kenya's development and global competitiveness.
        </p>
        <a data-aos="fade-up" href="{{ route('admissions') }}" class="px-8 py-3 font-semibold text-orange-600 transition duration-300 bg-white rounded-full hover:bg-gray-200">
            Join Us Today
        </a>
    </div>
</section>

<!-- =================end about ========================== -->

</main>
