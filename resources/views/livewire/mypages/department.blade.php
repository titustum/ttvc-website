<?php

use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    //
}; ?>



<main>


    <!-- ======================start dept section ============== -->

    <section class="py-16 bg-gray-100">
        <div class="container px-4 mx-auto">
            <h1 class="mb-8 text-4xl font-bold text-center text-gray-800">Department of Information and Communication
                Technology (ICT)</h1>
            <h1 class="mb-8 text-4xl font-bold text-center text-gray-800">Department of Information and Communication
                {{ $deptname }}</h1>

            <div class="mb-12 overflow-hidden bg-white rounded-lg shadow-md">
                <img src="./images/departments/ict-banner.jpg" alt="ICT Department" class="object-cover w-full h-64">
                <div class="p-8">
                    <p class="mb-6 text-gray-700">
                        The ICT Department at Tetu TVC offers a wide range of programs to suit various educational needs
                        and
                        career aspirations. Our courses are designed to equip students with the latest skills and
                        knowledge
                        in information and communication technology.
                    </p>
                </div>
            </div>

            <h2 class="mb-6 text-3xl font-bold text-gray-800">Courses Offered</h2>
            <div class="mb-12 overflow-x-auto">
                <table class="w-full overflow-hidden bg-white rounded-lg shadow-md">
                    <thead class="text-white bg-orange-600">
                        <tr>
                            <th class="px-4 py-3 text-left">Course</th>
                            <th class="px-4 py-3 text-left">Requirements</th>
                            <th class="px-4 py-3 text-left">Duration</th>
                            <th class="px-4 py-3 text-left">Examining Body</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="px-4 py-3">Diploma in Information Communication Technology</td>
                            <td class="px-4 py-3">C (plain)</td>
                            <td class="px-4 py-3">3 Years</td>
                            <td class="px-4 py-3">KNEC</td>
                        </tr>
                        <tr class="border-b bg-gray-50">
                            <td class="px-4 py-3">Certificate in Information Communication Technology</td>
                            <td class="px-4 py-3">D (plain)</td>
                            <td class="px-4 py-3">2 Years</td>
                            <td class="px-4 py-3">KNEC</td>
                        </tr>
                        <tr class="border-b">
                            <td class="px-4 py-3">ICT Technician Level 4</td>
                            <td class="px-4 py-3">D (minus)</td>
                            <td class="px-4 py-3">6 Months</td>
                            <td class="px-4 py-3">TVET CDACC</td>
                        </tr>
                        <tr class="border-b bg-gray-50">
                            <td class="px-4 py-3">ICT Technician Level 5</td>
                            <td class="px-4 py-3">D (plain)</td>
                            <td class="px-4 py-3">1 Year</td>
                            <td class="px-4 py-3">TVET CDACC</td>
                        </tr>
                        <tr class="border-b">
                            <td class="px-4 py-3">ICT Technician Level 6</td>
                            <td class="px-4 py-3">C (plain)</td>
                            <td class="px-4 py-3">2 Years</td>
                            <td class="px-4 py-3">TVET CDACC</td>
                        </tr>
                        <tr class="border-b bg-gray-50">
                            <td class="px-4 py-3">Computer Operator</td>
                            <td class="px-4 py-3">KCSE or KCPE</td>
                            <td class="px-4 py-3">6 Months</td>
                            <td class="px-4 py-3">NITA</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3">Web Designer</td>
                            <td class="px-4 py-3">KCSE or KCPE</td>
                            <td class="px-4 py-3">6 Months</td>
                            <td class="px-4 py-3">NITA</td>
                        </tr>
                    </tbody>
                </table>
            </div>




            <h2 class="mb-6 text-3xl font-bold text-gray-800">Our Team</h2>
            <div class="relative mb-12">
                <div id="teamContainer" class="flex overflow-x-auto snap-x snap-mandatory scrollbar-hide">
                    <div class="flex-shrink-0 w-64 p-6 mx-2 text-center bg-white rounded-lg shadow-md snap-start">
                        <img data-src="./images/team/DEPUTY-ACADEMICS-JAMES-KIHARA.jpeg" alt="HOD ICT"
                            class="object-cover w-32 h-32 mx-auto mb-4 rounded-full lazy">
                        <h3 class="mb-2 text-xl font-semibold text-orange-600">Mr. John Doe</h3>
                        <p class="mb-2 text-gray-700">Head of Department</p>
                        <p class="text-sm text-gray-600">MSc. Computer Science, 15+ years experience</p>
                    </div>
                    <div class="flex-shrink-0 w-64 p-6 mx-2 text-center bg-white rounded-lg shadow-md snap-start">
                        <img data-src="./images/team/LYDIA-NDIRANGU-DP-ADMIN.jpeg" alt="ICT Trainer 1"
                            class="object-cover w-32 h-32 mx-auto mb-4 rounded-full lazy">
                        <h3 class="mb-2 text-xl font-semibold text-orange-600">Ms. Jane Smith</h3>
                        <p class="mb-2 text-gray-700">Senior Lecturer</p>
                        <p class="text-sm text-gray-600">BSc. Information Technology, 8 years experience</p>
                    </div>
                    <div class="flex-shrink-0 w-64 p-6 mx-2 text-center bg-white rounded-lg shadow-md snap-start">
                        <img data-src="./images/principal.png" alt="ICT Trainer 2"
                            class="object-cover w-32 h-32 mx-auto mb-4 rounded-full lazy">
                        <h3 class="mb-2 text-xl font-semibold text-orange-600">Mr. David Johnson</h3>
                        <p class="mb-2 text-gray-700">Lecturer</p>
                        <p class="text-sm text-gray-600">BSc. Computer Science, 5 years experience</p>
                    </div>
                    <!-- Add more team members as needed -->
                </div>
                <button id="scrollLeft"
                    class="absolute left-0 p-2 transform -translate-y-1/2 bg-white rounded-full shadow-md top-1/2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button id="scrollRight"
                    class="absolute right-0 p-2 transform -translate-y-1/2 bg-white rounded-full shadow-md top-1/2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>



            {{-- =================end team ========================= --}}

            <h2 class="mb-6 text-3xl font-bold text-gray-800">Our Facilities</h2>
            <div class="grid grid-cols-1 gap-8 mb-12 md:grid-cols-2">
                <img src="./images/ict-lab1.jpg" alt="ICT Lab 1" class="object-cover w-full h-64 rounded-lg shadow-md">
                <img src="./images/ict-lab2.jpg" alt="ICT Lab 2" class="object-cover w-full h-64 rounded-lg shadow-md">
            </div>
            <p class="mb-6 text-gray-700">Our department boasts modern computer labs equipped with the latest hardware
                and
                software, providing students with an optimal learning environment for practical skills development.</p>
        </div>
    </section>

    <section class="py-12 text-white bg-orange-600">
        <div class="container px-4 mx-auto text-center">
            <h2 class="mb-4 text-3xl font-bold">Ready to Start Your ICT Career?</h2>
            <p class="mb-8 text-xl">Join our ICT department and unlock a world of opportunities in the digital realm.
            </p>
            <a href="#"
                class="px-8 py-3 font-semibold text-orange-600 transition duration-300 bg-white rounded-full hover:bg-gray-200">
                Apply Now
            </a>
        </div>
    </section>



    <!-- =================end department ========================== -->

</main>
