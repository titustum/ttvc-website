<?php

use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;
use App\Models\Department;

new
#[Title('Department')]
#[Layout('layouts.guest')]
class extends Component
{
    public $department;

    public function mount($deptname)
    {
        $this->department = Department::where('name', $deptname)->firstOrFail();
    }

};
?>

<section class="min-h-screen text-gray-800 bg-gray-50">

    <header class="relative">
        <!-- Banner Image -->
        <div class="h-96 md:h-[500px] w-full overflow-hidden">
            <img src="{{  asset('storage/'.$department->banner_pic)  }}" alt="{{ $department->name }} Banner"
                class="object-cover w-full h-full">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
        </div>

        <!-- Department Title Overlay -->
        <div class="absolute bottom-0 left-0 right-0 p-6 md:p-12">
            <div class="container mx-auto">
                <div class="inline-block px-4 py-1 mb-3 text-sm font-semibold text-white bg-orange-500 rounded-full">
                    Department
                </div>
                <h1 class="mb-2 text-3xl font-bold text-white md:text-5xl">{{ $department->name }}</h1>
                <p class="max-w-3xl text-lg md:text-xl text-white/90">{{ $department->short_desc }}</p>
            </div>
        </div>
    </header>

    <main>
        <!-- Department Overview Section -->
        <section class="py-16 bg-white">
            <div class="container px-4 mx-auto">
                <div class="flex flex-col gap-12 md:flex-row">
                    <!-- Main Content -->
                    <div class="w-full md:w-2/3">
                        <div class="prose prose-lg max-w-none" data-aos="fade-up">
                            <h2 class="mb-6 text-3xl font-bold">Department Overview</h2>

                            <!-- Department full description -->
                            <div class="mb-8">
                                {!! $department->full_desc !!}
                            </div>

                            <!-- Department stats -->
                            <div class="grid grid-cols-1 gap-6 my-12 md:grid-cols-3">
                                <div class="p-6 text-center rounded-lg bg-orange-50">
                                    <span class="block mb-2 text-3xl font-bold text-orange-600">{{
                                        count($department->courses) ?? 8
                                        }}</span>
                                    <span class="text-gray-600">Courses Offered</span>
                                </div>
                                <div class="p-6 text-center rounded-lg bg-blue-50">
                                    <span class="block mb-2 text-3xl font-bold text-blue-600">{{
                                        count($department->teamMembers) ?? 8
                                        }}</span>
                                    <span class="text-gray-600">Expert Trainers</span>
                                </div>
                                <div class="p-6 text-center rounded-lg bg-green-50">
                                    <span class="block mb-2 text-3xl font-bold text-green-600">{{ $graduationRate ??
                                        '95%' }}</span>
                                    <span class="text-gray-600">Graduation Rate</span>
                                </div>
                            </div>

                            <!-- Facilities and Resources -->
                            <h3 class="mb-4 text-2xl font-bold">Our Facilities</h3>
                            <div class="mb-8">
                                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                                    <div class="overflow-hidden rounded-lg shadow-md">
                                        <img src="/images/departments/{{ strtolower($department->name) }}/facility-1.jpg"
                                            alt="{{ $department->name }} Facility" class="object-cover w-full h-48">
                                    </div>
                                    <div class="overflow-hidden rounded-lg shadow-md">
                                        <img src="/images/departments/{{ strtolower($department->name) }}/facility-2.jpg"
                                            alt="{{ $department->name }} Facility" class="object-cover w-full h-48">
                                    </div>
                                </div>
                                <p class="mt-4">Our {{ $department->name }} department features state-of-the-art
                                    facilities designed to provide hands-on training in real-world environments.
                                    Students gain practical experience using industry-standard equipment and technology.
                                </p>
                            </div>

                            <!-- Industry connections -->
                            <h3 class="mb-4 text-2xl font-bold">Industry Connections</h3>
                            <p>Our program maintains strong relationships with industry leaders, providing students with
                                internship opportunities, job placement assistance, and insights into current industry
                                trends and practices.</p>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="w-full md:w-1/3">
                        <div class="sticky p-6 shadow-sm bg-gray-50 rounded-xl top-8" data-aos="fade-left">
                            <h3 class="pb-3 mb-4 text-xl font-bold border-b border-gray-200">Program Information</h3>

                            <ul class="mb-6 space-y-4">
                                <li class="flex items-start">
                                    <div class="mt-1 mr-3 text-orange-500">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                    <div>
                                        <span class="block font-medium">Duration</span>
                                        <span class="text-gray-600">2 Years (4 Semesters)</span>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <div class="mt-1 mr-3 text-orange-500">
                                        <i class="fas fa-user-graduate"></i>
                                    </div>
                                    <div>
                                        <span class="block font-medium">Qualification</span>
                                        <span class="text-gray-600">Diploma in {{ $department->name }}</span>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <div class="mt-1 mr-3 text-orange-500">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <div>
                                        <span class="block font-medium">Mode of Study</span>
                                        <span class="text-gray-600">Full-time / Part-time</span>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <div class="mt-1 mr-3 text-orange-500">
                                        <i class="fas fa-dollar-sign"></i>
                                    </div>
                                    <div>
                                        <span class="block font-medium">Tuition Fee</span>
                                        <span class="text-gray-600">$X,XXX per semester</span>
                                    </div>
                                </li>
                            </ul>

                            <a href="{{ route('admissions') }}"
                                class="block px-4 py-3 mb-4 font-semibold text-center text-white transition duration-300 bg-orange-500 rounded-lg hover:bg-orange-600">
                                Apply Now
                            </a>

                            <a href="#"
                                class="block px-4 py-3 font-semibold text-center text-orange-500 transition duration-300 border border-orange-500 rounded-lg hover:bg-orange-50">
                                Download Brochure
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Courses Section -->
        <section class="py-16 bg-gray-50">
            <div class="container px-4 mx-auto">
                <div class="mb-12 text-center" data-aos="fade-up">
                    <h2 class="text-3xl font-bold">Our Courses</h2>
                    <div class="w-24 h-1 mx-auto mt-4 bg-orange-500 rounded"></div>
                    <p class="max-w-3xl mx-auto mt-4 text-lg text-gray-600">
                        Explore our comprehensive range of courses designed to develop industry-relevant skills and
                        knowledge.
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                    @foreach($department->courses as $course)
                    <div class="overflow-hidden transition-all duration-300 bg-white rounded-lg shadow-md hover:shadow-lg"
                        data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="h-48 overflow-hidden">
                            <img src="{{ $course->image }}" alt="{{ $course->name }}"
                                class="object-cover w-full h-full">
                        </div>
                        <div class="p-6">
                            <h3 class="mb-2 text-xl font-bold">{{ $course->name }}</h3>
                            <p class="mb-4 text-gray-600 line-clamp-3">{{ $course->description }}</p>

                            <div class="flex items-center mb-4 text-sm text-gray-500">
                                <div class="flex items-center mr-4">
                                    <i class="mr-2 text-orange-500 fas fa-clock"></i>
                                    {{ $course->duration }}
                                </div>
                                <div class="flex items-center">
                                    <i class="mr-2 text-orange-500 fas fa-book"></i>
                                    {{ $course->modules }} Modules
                                </div>
                            </div>

                            <a href="{{ route('courses') }}"
                                class="inline-flex items-center font-semibold text-orange-500 hover:text-orange-600">
                                View Course Details
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>

                @if(count($department->courses) > 6)
                <div class="mt-12 text-center">
                    <a href="{{ route('courses') }}"
                        class="inline-block px-6 py-3 font-semibold text-white transition duration-300 bg-orange-500 rounded-lg hover:bg-orange-600">
                        View All Courses
                    </a>
                </div>
                @endif
            </div>
        </section>

        <!-- Trainers Section -->
        <section class="py-16 bg-white">
            <div class="container px-4 mx-auto">
                <div class="mb-12 text-center" data-aos="fade-up">
                    <h2 class="text-3xl font-bold">Meet Our Trainers</h2>
                    <div class="w-24 h-1 mx-auto mt-4 bg-orange-500 rounded"></div>
                    <p class="max-w-3xl mx-auto mt-4 text-lg text-gray-600">
                        Learn from industry experts with extensive professional experience and a passion for teaching.
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
                    @foreach($department->teamMembers as $trainer)
                    <div class="text-center" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="relative inline-block mb-4">
                            <div class="w-48 h-48 mx-auto overflow-hidden rounded-full shadow-md">
                                <img src="{{ $trainer->photo }}" alt="{{ $trainer->name }}"
                                    class="object-cover w-full h-full">
                            </div>
                            <div
                                class="absolute px-3 py-1 text-xs font-semibold text-white transform -translate-x-1/2 bg-orange-500 rounded-full -bottom-2 left-1/2">
                                {{ $trainer->years_experience }}+ Years Exp.
                            </div>
                        </div>
                        <h3 class="text-xl font-bold">{{ $trainer->name }}</h3>
                        <p class="mb-2 text-orange-500">{{ $trainer->position }}</p>
                        <p class="mb-3 text-sm text-gray-600">{{ $trainer->specialization }}</p>
                        <div class="flex justify-center space-x-3">
                            @if($trainer->linkedin)
                            <a href="{{ $trainer->linkedin ?? '' }}" class="text-blue-600 hover:text-blue-800"
                                aria-label="LinkedIn">
                                <i class="fab fa-linkedin"></i>
                            </a>
                            @endif
                            @if($trainer->email)
                            <a href="mailto:{{ $trainer->email }}" class="text-gray-600 hover:text-gray-800"
                                aria-label="Email">
                                <i class="fas fa-envelope"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Student Success Stories Carousel -->
        <section class="py-16 bg-gray-50">
            <div class="container px-4 mx-auto">
                <div class="mb-12 text-center" data-aos="fade-up">
                    <h2 class="text-3xl font-bold">Student Success Stories</h2>
                    <div class="w-24 h-1 mx-auto mt-4 bg-orange-500 rounded"></div>
                    <p class="max-w-3xl mx-auto mt-4 text-lg text-gray-600">
                        See how our graduates have transformed their careers after completing our programs.
                    </p>
                </div>

                <div class="testimonial-slider" data-aos="fade-up">
                    <!-- Slider will be initialized with JavaScript -->
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <!-- Sample testimonials - in production, these would come from your database -->
                            <div class="swiper-slide">
                                <div class="p-6 bg-white rounded-lg shadow-md">
                                    <div class="flex items-center mb-4">
                                        <div class="w-16 h-16 mr-4 overflow-hidden rounded-full">
                                            <img src="/images/testimonials/student1.jpg" alt="Student"
                                                class="object-cover w-full h-full">
                                        </div>
                                        <div>
                                            <h4 class="font-bold">Jane Doe</h4>
                                            <p class="text-sm text-gray-600">Class of 2023, Now at Tech Solutions Inc.
                                            </p>
                                        </div>
                                    </div>
                                    <p class="italic text-gray-600">"The hands-on training I received in the {{
                                        $department->name }} department was invaluable. The skills I learned directly
                                        translated to my current role, allowing me to hit the ground running from day
                                        one."</p>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="p-6 bg-white rounded-lg shadow-md">
                                    <div class="flex items-center mb-4">
                                        <div class="w-16 h-16 mr-4 overflow-hidden rounded-full">
                                            <img src="/images/testimonials/student2.jpg" alt="Student"
                                                class="object-cover w-full h-full">
                                        </div>
                                        <div>
                                            <h4 class="font-bold">John Smith</h4>
                                            <p class="text-sm text-gray-600">Class of 2022, Now at Industry Leaders Ltd
                                            </p>
                                        </div>
                                    </div>
                                    <p class="italic text-gray-600">"The instructors in the {{ $department->name }}
                                        department bring real-world experience into the classroom. Their connections in
                                        the industry helped me secure an internship that led to my current full-time
                                        position."</p>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="p-6 bg-white rounded-lg shadow-md">
                                    <div class="flex items-center mb-4">
                                        <div class="w-16 h-16 mr-4 overflow-hidden rounded-full">
                                            <img src="/images/testimonials/student3.jpg" alt="Student"
                                                class="object-cover w-full h-full">
                                        </div>
                                        <div>
                                            <h4 class="font-bold">Sarah Johnson</h4>
                                            <p class="text-sm text-gray-600">Class of 2021, Now at Global Innovations
                                            </p>
                                        </div>
                                    </div>
                                    <p class="italic text-gray-600">"The {{ $department->name }} program gave me both
                                        technical skills and professional development opportunities. The curriculum
                                        stays current with industry trends, which made me highly marketable to
                                        employers."</p>
                                </div>
                            </div>
                        </div>

                        <!-- Slider controls -->
                        <div class="mt-6 swiper-pagination"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-16 text-white bg-gradient-to-r from-orange-600 to-orange-500">
            <div class="container px-4 mx-auto">
                <div class="flex flex-col items-center justify-between md:flex-row">
                    <div class="mb-8 text-center md:mb-0 md:text-left" data-aos="fade-right">
                        <h2 class="mb-4 text-3xl font-bold">Ready to Start Your Career in {{ $department->name }}?</h2>
                        <p class="max-w-xl text-white/90">Take the first step toward your future career. Apply now for
                            our upcoming intake and join our community of successful graduates.</p>
                    </div>
                    <div class="flex flex-col gap-4 sm:flex-row" data-aos="fade-left">
                        <a href="{{ route('admissions') }}"
                            class="px-6 py-3 font-bold text-center text-orange-600 transition duration-300 bg-white rounded-lg hover:bg-gray-100">
                            Apply Now
                        </a>
                        <a href="{{ route('contact') }}"
                            class="px-6 py-3 font-bold text-center text-white transition duration-300 border-2 border-white rounded-lg hover:bg-white/10">
                            Contact Us
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- JavaScript for interactive elements -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.js"></script>
    <script>
        // Initialize AOS animation library
    AOS.init({
      once: true,
      duration: 800,
      offset: 100,
    });
    
    // Initialize testimonial slider
    document.addEventListener('DOMContentLoaded', function() {
      new Swiper('.swiper-container', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        autoplay: {
          delay: 5000,
        },
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        breakpoints: {
          768: {
            slidesPerView: 2,
          },
          1024: {
            slidesPerView: 3,
          }
        }
      });
    });
    
    // FAQ accordion functionality
    document.addEventListener('DOMContentLoaded', function() {
      const accordionHeaders = document.querySelectorAll('.accordion-header');
      
      accordionHeaders.forEach(header => {
        header.addEventListener('click', function() {
          const content = this.nextElementSibling;
          const icon = this.querySelector('.accordion-icon');
          
          // Toggle content visibility
          content.classList.toggle('hidden');
          
          // Rotate icon
          if (content.classList.contains('hidden')) {
            icon.style.transform = 'rotate(0deg)';
          } else {
            icon.style.transform = 'rotate(180deg)';
          }
          
          // Close other open accordions (optional)
          accordionHeaders.forEach(otherHeader => {
            if (otherHeader !== this) {
              const otherContent = otherHeader.nextElementSibling;
              const otherIcon = otherHeader.querySelector('.accordion-icon');
              
              if (!otherContent.classList.contains('hidden')) {
                otherContent.classList.add('hidden');
                otherIcon.style.transform = 'rotate(0deg)';
              }
            }
          });
        });
      });
    });
    </script>

</section>