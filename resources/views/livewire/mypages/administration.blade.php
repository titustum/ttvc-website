<?php

use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    //
}; ?>

<main>



<!-- ======================start team section ============== -->

<section class="py-16 bg-gray-100">
    <div class="container px-4 mx-auto">
        <h1 class="mb-12 text-4xl font-bold text-center text-gray-800">Our Team</h1>

        <!-- Principal -->
        <div class="mb-16">
            <h2 class="mb-8 text-3xl font-semibold text-center text-gray-800">Principal</h2>
            <div class="flex justify-center">
                <div class="w-64 text-center">
                    <img src="./images/principal.png" alt="Principal's Name" class="object-cover w-48 h-48 mx-auto mb-4 rounded-full">
                    <h3 class="text-xl font-semibold text-gray-800">Mrs. Catherine Gikonyo</h3>
                    <p class="text-gray-600">Principal</p>
                </div>
            </div>
        </div>

        <!-- Deputy Principals -->
        <div class="mb-16">
            <h2 class="mb-8 text-3xl font-semibold text-center text-gray-800">Deputy Principals</h2>
            <div class="flex flex-wrap justify-center gap-8">
                <div class="w-64 text-center">
                    <img src="./images/team/DEPUTY-ACADEMICS-JAMES-KIHARA.jpeg" alt="Deputy Principal's Name" class="object-cover w-40 h-40 mx-auto mb-4 rounded-full">
                    <h3 class="text-lg font-semibold text-gray-800">Mr. Joshua</h3>
                    <p class="text-gray-600">Deputy Principal, Academics</p>
                </div>
                <div class="w-64 text-center">
                    <img src="./images/team/LYDIA-NDIRANGU-DP-ADMIN.jpeg" alt="Deputy Principal's Name" class="object-cover w-40 h-40 mx-auto mb-4 rounded-full">
                    <h3 class="text-lg font-semibold text-gray-800">Mrs. Lydia Ndirangu</h3>
                    <p class="text-gray-600">Deputy Principal, Administration</p>
                </div>
            </div>
        </div>

        <!-- Section Heads -->
        <div class="mb-16">
            <h2 class="mb-8 text-3xl font-semibold text-center text-gray-800">Section Heads</h2>
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                <!-- HODs -->
                <div class="text-center">
                    <img src="./images/hod1.jpg" alt="HOD's Name" class="object-cover w-32 h-32 mx-auto mb-4 rounded-full">
                    <h3 class="text-lg font-semibold text-gray-800">Alice Brown</h3>
                    <p class="text-gray-600">HOD, Cosmetology</p>
                </div>
                <div class="text-center">
                    <img src="./images/hod2.jpg" alt="HOD's Name" class="object-cover w-32 h-32 mx-auto mb-4 rounded-full">
                    <h3 class="text-lg font-semibold text-gray-800">Robert Green</h3>
                    <p class="text-gray-600">HOD, Building and Construction</p>
                </div>
                <div class="text-center">
                    <img src="./images/hod3.jpg" alt="HOD's Name" class="object-cover w-32 h-32 mx-auto mb-4 rounded-full">
                    <h3 class="text-lg font-semibold text-gray-800">Emily White</h3>
                    <p class="text-gray-600">HOD, Electrical Engineering</p>
                </div>
                <div class="text-center">
                    <img src="./images/hod4.jpg" alt="HOD's Name" class="object-cover w-32 h-32 mx-auto mb-4 rounded-full">
                    <h3 class="text-lg font-semibold text-gray-800">Michael Black</h3>
                    <p class="text-gray-600">HOD, Fashion Design</p>
                </div>
                <div class="text-center">
                    <img src="./images/hod5.jpg" alt="HOD's Name" class="object-cover w-32 h-32 mx-auto mb-4 rounded-full">
                    <h3 class="text-lg font-semibold text-gray-800">Sarah Gray</h3>
                    <p class="text-gray-600">HOD, Hospitality</p>
                </div>
                <div class="text-center">
                    <img src="./images/hod6.jpg" alt="HOD's Name" class="object-cover w-32 h-32 mx-auto mb-4 rounded-full">
                    <h3 class="text-lg font-semibold text-gray-800">David Blue</h3>
                    <p class="text-gray-600">HOD, ICT</p>
                </div>
                <div class="text-center">
                    <img src="./images/hod7.jpg" alt="HOD's Name" class="object-cover w-32 h-32 mx-auto mb-4 rounded-full">
                    <h3 class="text-lg font-semibold text-gray-800">Linda Green</h3>
                    <p class="text-gray-600">HOD, Agriculture</p>
                </div>
                <!-- Other Section Heads -->
                <div class="text-center">
                    <img src="./images/registrar.jpg" alt="Registrar's Name" class="object-cover w-32 h-32 mx-auto mb-4 rounded-full">
                    <h3 class="text-lg font-semibold text-gray-800">Paul Brown</h3>
                    <p class="text-gray-600">Registrar</p>
                </div>
                <div class="text-center">
                    <img src="./images/dean.jpg" alt="Dean's Name" class="object-cover w-32 h-32 mx-auto mb-4 rounded-full">
                    <h3 class="text-lg font-semibold text-gray-800">Grace Wilson</h3>
                    <p class="text-gray-600">Dean of Students</p>
                </div>
                <div class="text-center">
                    <img src="./images/academic.jpg" alt="Academic Officer's Name" class="object-cover w-32 h-32 mx-auto mb-4 rounded-full">
                    <h3 class="text-lg font-semibold text-gray-800">Thomas Lee</h3>
                    <p class="text-gray-600">Academics Officer</p>
                </div>
                <div class="text-center">
                    <img src="./images/research.jpg" alt="Research Officer's Name" class="object-cover w-32 h-32 mx-auto mb-4 rounded-full">
                    <h3 class="text-lg font-semibold text-gray-800">Olivia Clark</h3>
                    <p class="text-gray-600">Innovations and Research Officer</p>
                </div>
            </div>
        </div>

        <!-- Other Trainers -->
        <div>
            <h2 class="mb-8 text-3xl font-semibold text-center text-gray-800">Our Trainers</h2>
            <div class="grid grid-cols-2 gap-6 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
                <!-- Repeat this block for each trainer -->
                <div class="text-center">
                    <img src="./images/trainer1.jpg" alt="Trainer's Name" class="object-cover w-24 h-24 mx-auto mb-2 rounded-full">
                    <h3 class="font-semibold text-gray-800 text-md">Trainer Name</h3>
                    <p class="text-sm text-gray-600">Department</p>
                </div>
                <!-- Add more trainer blocks as needed -->
            </div>
        </div>
    </div>
</section>



<!-- =================end team ========================== -->


</main>
