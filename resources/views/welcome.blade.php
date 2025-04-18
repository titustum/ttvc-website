@section('title') Home @endsection


<x-guest-layout>

  <x-hero-section :slideContents=$slideContents />



  <section class="w-full px-4 py-16 bg-white">
    <div class="w-full mx-auto max-w-7xl">
      <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">

        <!-- Principal's Welcome Card -->
        <div data-aos="fade-up" data-aos-duration="800" class="w-full md:col-span-2 lg:col-span-1">
          <div
            class="flex flex-col justify-between h-full p-6 transition-shadow duration-300 bg-white border rounded-lg shadow-lg hover:shadow-xl">
            <div>
              <h3 class="mb-6 text-2xl font-bold text-center text-orange-600">
                Welcome to Tetu TVC
              </h3>
              <div class="my-6 text-center">
                <div class="inline-block p-1 rounded-full bg-gradient-to-r from-orange-400 to-orange-600">
                  <img src="{{ asset('images/principal.png') }}"
                    class="object-cover w-48 h-48 border-4 border-white rounded-full shadow-inner"
                    alt="Mrs. Catherine Gikoyo">
                </div>
              </div>
              <div class="px-4 my-4 text-gray-700">
                <p class="mb-5 leading-relaxed">It's my pleasure to welcome you to Tetu Technical and Vocational
                  College. We are
                  committed to providing quality programs, activities, and services that will enhance and enrich your
                  academic and professional journey.</p>
                <div class="pt-3 font-bold text-center border-t border-gray-200">
                  <p class="text-gray-800">Mrs. Catherine Gikonyo</p>
                  <p class="text-orange-600">College Principal</p>
                </div>
              </div>
            </div>
            <div class="mt-6 text-center">
              <a href="{{ route('administration') }}"
                class="inline-block px-6 py-3 text-white transition duration-300 bg-orange-600 rounded-full shadow-md hover:bg-orange-700 hover:shadow-lg">
                Meet Our Team <i class="ml-2 fas fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- Right Side Cards -->
        <div data-aos="fade-up" data-aos-duration="800" data-aos-delay="100" class="w-full md:col-span-2 lg:col-span-2">
          <div class="grid h-full gap-6 md:grid-cols-2">
            <!-- Admissions Card -->
            <div
              class="flex flex-col justify-between text-white transition-shadow duration-300 rounded-lg shadow-lg bg-gradient-to-br from-blue-500 to-blue-700 hover:shadow-xl">
              <div class="p-6">
                <div class="flex justify-center mb-4">
                  <div class="p-3 bg-blue-400 rounded-full bg-opacity-30">
                    <img src="{{ asset('images/user-tick.svg') }}" class="w-12 h-12" alt="Admissions Icon">
                  </div>
                </div>
                <h4 class="mb-3 text-xl font-bold text-center">Admissions Ongoing!</h4>
                <p class="px-3 mb-4 text-center">Apply now for Artisan, Certificate, and Diploma programs in various
                  technical fields.</p>
              </div>
              <div class="p-6 text-center">
                <a href="{{ route('admissions') }}"
                  class="inline-block px-5 py-2 text-blue-600 transition duration-300 bg-white rounded-full shadow-md hover:bg-gray-100 hover:shadow-lg">
                  Apply Now <i class="ml-2 fas fa-arrow-right"></i>
                </a>
              </div>
            </div>

            <!-- Resources Card -->
            <div
              class="flex flex-col justify-between text-white transition-shadow duration-300 rounded-lg shadow-lg bg-gradient-to-br from-green-500 to-green-700 hover:shadow-xl">
              <div class="p-6">
                <div class="flex justify-center mb-4">
                  <div class="p-3 bg-green-400 rounded-full bg-opacity-30">
                    <img src="{{ asset('images/download-w-1.svg') }}" class="w-12 h-12" alt="Resources Icon">
                  </div>
                </div>
                <h4 class="mb-3 text-xl font-bold text-center">Resources</h4>
                <p class="px-3 mb-4 text-center">Access important documents, course outlines, and student handbooks in
                  our downloads section.</p>
              </div>
              <div class="p-6 text-center">
                <a href="{{ route('downloads') }}"
                  class="inline-block px-5 py-2 text-green-600 transition duration-300 bg-white rounded-full shadow-md hover:bg-gray-100 hover:shadow-lg">
                  Download <i class="ml-2 fas fa-download"></i>
                </a>
              </div>
            </div>

            <!-- Programs Card -->
            <div data-aos="fade-up" data-aos-duration="800" data-aos-delay="200"
              class="flex flex-col justify-center text-white transition-shadow duration-300 rounded-lg shadow-lg bg-gradient-to-br from-yellow-500 to-yellow-600 hover:shadow-xl md:col-span-2">
              <div class="p-8">
                <h4 class="mb-4 text-2xl font-bold text-center">Our Programs</h4>
                <p class="max-w-lg px-6 mx-auto mb-6 text-center">Discover our wide range of technical and vocational
                  programs designed
                  to equip you with industry-relevant skills for today's job market.</p>
                <div class="text-center">
                  <a href="{{ route('courses') }}"
                    class="inline-block px-6 py-3 text-yellow-600 transition duration-300 bg-white rounded-full shadow-md hover:bg-gray-100 hover:shadow-lg">
                    Explore Programs <i class="ml-2 fas fa-book-open"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>




  <section class="py-20 bg-gray-50">
    <div class="container px-4 mx-auto max-w-7xl">
      <div class="mb-16 text-center">
        <h2 class="mb-4 text-3xl font-bold text-gray-800 lg:text-4xl">Our Departments</h2>
        <div class="w-24 h-1 mx-auto bg-orange-500 rounded"></div>
        <p class="max-w-2xl mx-auto mt-4 text-lg text-gray-600">Explore our outstanding academic departments designed to
          provide industry-relevant skills and knowledge.</p>
      </div>

      <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($departments as $department)
        <div data-aos="fade-up" data-aos-duration="800" data-aos-delay="{{ $loop->index * 100 }}"
          class="overflow-hidden transition-all duration-300 bg-white rounded-lg shadow-lg group hover:shadow-xl">
          <div class="relative h-56 overflow-hidden">
            <img src="{{  $department->photo  }}" alt="{{ $department->name }}"
              class="object-cover w-full h-full transition-transform duration-500 ease-in-out group-hover:scale-110">
            <div
              class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/70 to-transparent group-hover:opacity-100">
            </div>
          </div>
          <div class="p-6">
            <h3 class="mb-3 text-xl font-bold text-gray-800 transition-colors duration-300 group-hover:text-orange-600">
              {{ $department->name }}</h3>
            <p class="mb-5 text-gray-600 line-clamp-3">{{ $department->short_desc }}</p>
            <div class="pt-2 border-t border-gray-100">
              <a href="{{ route('department', $department->name) }}"
                class="inline-flex items-center font-semibold text-orange-600 transition-colors duration-300 hover:text-orange-700">
                Explore Department
                <svg xmlns="http://www.w3.org/2000/svg"
                  class="w-5 h-5 ml-1 transition-transform duration-300 group-hover:translate-x-1" fill="none"
                  viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
              </a>
            </div>
          </div>
        </div>
        @endforeach

        <!-- General Programs Link -->
        <div data-aos="fade-up" data-aos-duration="800" data-aos-delay="{{ count($departments) * 100 }}"
          class="flex items-center justify-center overflow-hidden transition-all duration-300 rounded-lg shadow-lg bg-gradient-to-br from-orange-500 to-orange-600 hover:shadow-xl">
          <div class="p-8 text-center">
            <div class="flex justify-center mb-4">
              <div class="p-3 bg-white rounded-full bg-opacity-20">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24"
                  stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
              </div>
            </div>
            <h3 class="mb-4 text-2xl font-bold text-white">Explore Departments</h3>
            <p class="mb-6 text-white text-opacity-90">Discover our full range of technical and vocational programs
              designed to equip you with job-ready skills.</p>
            <a href="{{ route('departments') }}"
              class="inline-block px-6 py-3 font-semibold text-orange-600 transition duration-300 bg-white rounded-full shadow-md hover:bg-gray-100 hover:shadow-lg">
              View All Departments
              <i class="ml-2 fas fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>



  <section class="py-20 bg-white">
    <div class="container px-4 mx-auto max-w-7xl">
      <div class="mb-16 text-center">
        <h2 class="mb-4 text-3xl font-bold text-gray-800 lg:text-4xl">Student Success Stories</h2>
        <div class="w-24 h-1 mx-auto bg-orange-500 rounded"></div>
        <p class="max-w-2xl mx-auto mt-4 text-lg text-gray-600">Meet our graduates who have transformed their education
          into successful careers</p>
      </div>

      <div class="grid gap-12 md:grid-cols-2 lg:grid-cols-3">
        <!-- Success Story 1 -->
        <div data-aos="fade-up" data-aos-duration="800" class="relative">
          <div class="relative z-10 p-6 bg-white rounded-lg shadow-lg">
            <div class="absolute transform -translate-x-1/2 -top-10 left-1/2">
              <div class="w-20 h-20 p-1 rounded-full bg-gradient-to-r from-orange-400 to-orange-600">
                <img src="{{ asset('images/stories/plumbing-story.jpg') }}" alt="John Mwangi"
                  class="object-cover w-full h-full rounded-full">
              </div>
            </div>
            <div class="pt-10 text-center">
              <h3 class="text-xl font-bold text-gray-800">John Mwangi</h3>
              <p class="text-orange-600">Diploma in Electrical Engineering, 2023</p>
              <div class="flex justify-center mt-2 mb-4 text-orange-500">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <div class="mt-4 mb-6">
                <svg class="w-8 h-8 mx-auto text-gray-300" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 24 24">
                  <path
                    d="M14.017 18L14.017 10.609C14.017 4.905 17.748 1.039 23 0L23.995 2.151C21.563 3.068 20 5.789 20 8H24V18H14.017ZM0 18V10.609C0 4.905 3.748 1.039 9 0L9.996 2.151C7.563 3.068 6 5.789 6 8H9.983L9.983 18L0 18Z" />
                </svg>
                <blockquote class="mt-4 text-gray-600">
                  Tetu TVC equipped me with practical skills that employers value. Within three months of graduation, I
                  secured a position at Kenya Power as a technician. The hands-on training made all the difference.
                </blockquote>
              </div>
              <p class="font-semibold text-gray-700">Currently: <span class="text-green-600">Electrical Technician at
                  Kenya Power</span></p>
            </div>
          </div>
          <div class="absolute inset-0 transform translate-x-2 translate-y-2 bg-orange-100 rounded-lg -z-10"></div>
        </div>

        <!-- Success Story 2 -->
        <div data-aos="fade-up" data-aos-duration="800" data-aos-delay="100" class="relative">
          <div class="relative z-10 p-6 bg-white rounded-lg shadow-lg">
            <div class="absolute transform -translate-x-1/2 -top-10 left-1/2">
              <div class="w-20 h-20 p-1 rounded-full bg-gradient-to-r from-orange-400 to-orange-600">
                <img src="{{ asset('images/stories/fashion-story.jpg') }}" alt="Grace Wanjiku"
                  class="object-cover w-full h-full rounded-full">
              </div>
            </div>
            <div class="pt-10 text-center">
              <h3 class="text-xl font-bold text-gray-800">Grace Wanjiku</h3>
              <p class="text-orange-600">Certificate in Hospitality Management, 2022</p>
              <div class="flex justify-center mt-2 mb-4 text-orange-500">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <div class="mt-4 mb-6">
                <svg class="w-8 h-8 mx-auto text-gray-300" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 24 24">
                  <path
                    d="M14.017 18L14.017 10.609C14.017 4.905 17.748 1.039 23 0L23.995 2.151C21.563 3.068 20 5.789 20 8H24V18H14.017ZM0 18V10.609C0 4.905 3.748 1.039 9 0L9.996 2.151C7.563 3.068 6 5.789 6 8H9.983L9.983 18L0 18Z" />
                </svg>
                <blockquote class="mt-4 text-gray-600">
                  The industry connections at Tetu TVC opened doors for me. Through the college's placement program, I
                  interned at Serena Hotel, which led to my current role. The instructors truly care about student
                  success.
                </blockquote>
              </div>
              <p class="font-semibold text-gray-700">Currently: <span class="text-green-600">Assistant Manager at Serena
                  Hotel</span></p>
            </div>
          </div>
          <div class="absolute inset-0 transform translate-x-2 translate-y-2 bg-orange-100 rounded-lg -z-10"></div>
        </div>

        <!-- Success Story 3 -->
        <div data-aos="fade-up" data-aos-duration="800" data-aos-delay="200" class="relative">
          <div class="relative z-10 p-6 bg-white rounded-lg shadow-lg">
            <div class="absolute transform -translate-x-1/2 -top-10 left-1/2">
              <div class="w-20 h-20 p-1 rounded-full bg-gradient-to-r from-orange-400 to-orange-600">
                <img src="{{ asset('images/stories/ict-story.jpeg') }}" alt="David Kamau"
                  class="object-cover w-full h-full rounded-full">
              </div>
            </div>
            <div class="pt-10 text-center">
              <h3 class="text-xl font-bold text-gray-800">David Kamau</h3>
              <p class="text-orange-600">Diploma in ICT, 2021</p>
              <div class="flex justify-center mt-2 mb-4 text-orange-500">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
              </div>
              <div class="mt-4 mb-6">
                <svg class="w-8 h-8 mx-auto text-gray-300" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 24 24">
                  <path
                    d="M14.017 18L14.017 10.609C14.017 4.905 17.748 1.039 23 0L23.995 2.151C21.563 3.068 20 5.789 20 8H24V18H14.017ZM0 18V10.609C0 4.905 3.748 1.039 9 0L9.996 2.151C7.563 3.068 6 5.789 6 8H9.983L9.983 18L0 18Z" />
                </svg>
                <blockquote class="mt-4 text-gray-600">
                  The entrepreneurship module alongside my technical training gave me the confidence to start my own
                  business. Today, my web development company employs three other Tetu TVC graduates.
                </blockquote>
              </div>
              <p class="font-semibold text-gray-700">Currently: <span class="text-green-600">Founder, Nyota Digital
                  Solutions</span></p>
            </div>
          </div>
          <div class="absolute inset-0 transform translate-x-2 translate-y-2 bg-orange-100 rounded-lg -z-10"></div>
        </div>
      </div>

      <!-- View All Stories Button -->
      <div class="mt-16 text-center">
        <a href="#"
          class="inline-block px-8 py-3 font-semibold text-white transition duration-300 bg-orange-600 rounded-full shadow-md hover:bg-orange-700 hover:shadow-lg">
          View All Success Stories
          <i class="ml-2 fas fa-arrow-right"></i>
        </a>
      </div>

      <!-- Success Metrics -->
      <div class="grid gap-8 mt-20 md:grid-cols-2 lg:grid-cols-4">
        <div data-aos="fade-up" data-aos-duration="800" class="p-6 text-center rounded-lg bg-gray-50">
          <div class="flex justify-center">
            <div class="p-3 mb-4 text-white bg-orange-600 rounded-full">
              <i class="text-2xl fas fa-graduation-cap"></i>
            </div>
          </div>
          <h3 class="text-4xl font-bold text-gray-800"><span class="counter" data-target="92">0</span>%</h3>
          <p class="text-gray-600">Graduation Rate</p>
        </div>

        <div data-aos="fade-up" data-aos-duration="800" data-aos-delay="100"
          class="p-6 text-center rounded-lg bg-gray-50">
          <div class="flex justify-center">
            <div class="p-3 mb-4 text-white bg-orange-600 rounded-full">
              <i class="text-2xl fas fa-briefcase"></i>
            </div>
          </div>
          <h3 class="text-4xl font-bold text-gray-800"><span class="counter" data-target="85">0</span>%</h3>
          <p class="text-gray-600">Job Placement</p>
        </div>

        <div data-aos="fade-up" data-aos-duration="800" data-aos-delay="200"
          class="p-6 text-center rounded-lg bg-gray-50">
          <div class="flex justify-center">
            <div class="p-3 mb-4 text-white bg-orange-600 rounded-full">
              <i class="text-2xl fas fa-user-tie"></i>
            </div>
          </div>
          <h3 class="text-4xl font-bold text-gray-800"><span class="counter" data-target="78">0</span>%</h3>
          <p class="text-gray-600">Industry Partners</p>
        </div>

        <div data-aos="fade-up" data-aos-duration="800" data-aos-delay="300"
          class="p-6 text-center rounded-lg bg-gray-50">
          <div class="flex justify-center">
            <div class="p-3 mb-4 text-white bg-orange-600 rounded-full">
              <i class="text-2xl fas fa-award"></i>
            </div>
          </div>
          <h3 class="text-4xl font-bold text-gray-800"><span class="counter" data-target="120">0</span>+</h3>
          <p class="text-gray-600">Industry Certifications</p>
        </div>
      </div>



    </div>
  </section>





  <section class="py-16 bg-cyan-100">
    <div class="container px-4 mx-auto">
      <h2 data-aos='fade-up' class="text-3xl font-bold text-center text-gray-800">Our Partners</h2>
      <p data-aos='fade-up' class="mt-6 mb-12 text-center text-gray-600">
        Our partnerships with industry leaders and educational authorities ensure that our programs remain cutting-edge
        and our graduates are well-prepared for the workforce.
      </p>

      <div class="grid items-center grid-cols-2 gap-8 md:grid-cols-3 lg:grid-cols-6">
        <!-- Partner 1 -->
        <div data-aos='fade-up'
          class="flex items-center justify-center p-6 transition-shadow duration-300 bg-white rounded-lg shadow-md hover:shadow-lg">
          <img src="/images/partners/knec.png" alt="Kenya National Examinational Council" class="h-16 max-w-full">
        </div>

        <!-- Partner 2 -->
        <div data-aos='fade-up'
          class="flex items-center justify-center p-6 transition-shadow duration-300 bg-white rounded-lg shadow-md hover:shadow-lg">
          <img src="/images/partners/CDAAC.png" alt="CDAAC Logo" class="h-16 max-w-full">
        </div>

        <!-- Partner 3 -->
        <div data-aos='fade-up'
          class="flex items-center justify-center p-6 transition-shadow duration-300 bg-white rounded-lg shadow-md hover:shadow-lg">
          <img src="/images/partners/nita.png" alt="NITA Logo" class="h-16 max-w-full">
        </div>

        <!-- Partner 4 -->
        <div data-aos='fade-up'
          class="flex items-center justify-center p-6 transition-shadow duration-300 bg-white rounded-lg shadow-md hover:shadow-lg">
          <img src="/images/partners/Ministry-of-Education-logo.jpg" alt="Ministry of Education"
            class="max-w-full max-h-16">
        </div>

        <!-- Partner 5 -->
        <div data-aos='fade-up'
          class="flex items-center justify-center p-6 transition-shadow duration-300 bg-white rounded-lg shadow-md hover:shadow-lg">
          <img src="/images/partners/TVETA.png" alt="TVETA" class="h-16 max-w-full">
        </div>

        <!-- Partner 5 -->
        <div data-aos='fade-up' title="Kenya Association of Technical Training Institutions"
          class="flex items-center justify-center p-6 transition-shadow duration-300 bg-white rounded-lg shadow-md hover:shadow-lg">
          <img src="/images/partners/katti.png" alt="KATTI" class="h-16 max-w-full">
        </div>
      </div>

    </div>
  </section>



  <script>
    const counters = document.querySelectorAll('.counter');
  
    counters.forEach(counter => {
      const updateCount = () => {
        const target = +counter.getAttribute('data-target');
        const current = +counter.innerText;
        const increment = target / 10000; // you can adjust speed here
  
        if (current < target) {
          counter.innerText = Math.ceil(current + increment);
          requestAnimationFrame(updateCount);
        } else {
          counter.innerText = target;
        }
      };
  
      // Optional: Wait until element is in view
      const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            updateCount();
            observer.unobserve(entry.target); // Only run once
          }
        });
      }, { threshold: 0.5 });
  
      observer.observe(counter);
    });
  </script>



</x-guest-layout>