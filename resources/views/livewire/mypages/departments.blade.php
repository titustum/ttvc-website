<?php

use App\Models\Department;
use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;

new
#[Title('Departments')]
#[Layout('layouts.guest')]
class extends Component
{

    public $departments;

    function mount() {
        $this->departments = Department::all();
    }

}; ?>

<main>

    <!-- ======================start department section ============== -->

    <section class="py-16 bg-gray-100">
        <div class="container px-4 mx-auto">
            <h1 class="mb-12 text-4xl font-bold text-center text-gray-800">Our Departments</h1>

            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">

                @foreach ($departments as $department)

                <div data-aos="fade-up" class="overflow-hidden bg-white rounded-lg shadow-md">
                    <img src="{{ asset('storage/'.$department->photo) }}" alt="{{$department->name}}"
                        class="object-cover w-full h-48">
                    <div class="p-6">
                        <h2 class="mb-2 text-2xl font-semibold text-gray-800">{{ $department->name }}</h2>
                        <p class="mb-4 text-gray-600">{{ $department->short_desc }}</p>
                        <ul class="mb-4 text-gray-600">
                            @foreach ($department->courses->take(3) as $course)
                            <li>• {{ $course->name }}</li>
                            @endforeach
                        </ul>
                        <a href="{{ route('department', $department->name) }}"
                            class="font-semibold text-orange-600 hover:text-orange-700">Explore Courses →</a>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </section>

    <section class="py-12 text-white bg-orange-600">
        <div class="container px-4 mx-auto text-center">
            <h2 class="mb-4 text-3xl font-bold">Find Your Path to Success</h2>
            <p class="mb-8 text-xl">Explore our departments and discover the perfect program for your career goals.</p>
            <a href="{{ route('admissions') }}"
                class="px-8 py-3 font-semibold text-orange-600 transition duration-300 bg-white rounded-full hover:bg-gray-200">
                Apply Now
            </a>
        </div>
    </section>



    <!-- =================end department ========================== -->

</main>