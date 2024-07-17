
@section('title') Home @endsection


<x-guest-layout>


<section id="hero" class="relative lg:h-[calc(100vh-150px)] bg-center bg-no-repeat bg-cover"
    style="background-image: url('./images/gate1.jpg');">
    <div class="absolute inset-0 bg-black opacity-60"></div>
    <div class="container relative flex flex-col items-start justify-center h-full px-4 mx-auto">
        <div class="max-w-3xl py-24">
            <h1 class="mb-4 text-4xl font-bold leading-tight text-white md:text-5xl lg:text-6xl">
                Explore Your Future at Tetu Technical and Vocational College
            </h1>
            <h2 class="hidden text-xl mb:-6 lg:block md:text-2xl lg:text-3xl text-cyan-300">
                We are the leading Technical and Vocational Education in Kenya
                in skill delivery and co-curricular activities.
            </h2>
            <p class="mb-8 text-lg font-semibold text-green-300">
                Join over 2,000 happy students
            </p>
            <div class="flex flex-col gap-4 sm:flex-row">
                <a href="{{ route('admissions') }}"
                    class="px-8 py-4 text-lg font-semibold text-center text-white transition-colors duration-300 bg-orange-600 rounded-full hover:bg-orange-700">
                    APPLY NOW
                    <span class="inline-block ml-2 transition-transform duration-300 transform group-hover:translate-x-1">→</span>
                </a>
                <a href="{{ route('courses') }}"
                    class="px-8 py-4 text-lg font-semibold text-center text-orange-600 transition-colors duration-300 bg-white border-2 border-orange-600 rounded-full hover:bg-orange-100">
                    CHECK COURSES
                    <span class="inline-block ml-2">🏆</span>
                </a>
            </div>
        </div>
    </div>
</section>


<section class="w-full px-4 py-16 bg-white">
    <div class="w-full mx-auto max-w-7xl">
      <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">

        <div data-aos='fade-up' class="w-full md:col-span-2 lg:col-span-1">
          <div class="flex flex-col justify-between h-full p-6 bg-white border rounded-lg shadow-md">
            <div>
              <h3 class="mb-4 text-2xl font-bold text-center text-orange-600">
                Welcome to Tetu TVC
              </h3>
              <div class="my-4 text-center">
                <img src="{{ asset('images/principal.png') }}" class="h-[200px] w-[200px] object-cover mx-auto rounded-full shadow-lg" alt="Mrs. Catherine Gikoyo">
              </div>
              <div class="px-4 my-3 text-gray-700">
                <p class="mb-4">It's my pleasure to welcome you to Tetu Technical and Vocational College. We are committed to providing quality programs, activities, and services that will enhance and enrich your academic and professional journey.</p>
                <p class="font-bold text-center">
                  Mrs. Catherine Gikoyo<br>
                  <i class="text-orange-600">College Principal</i>
                </p>
              </div>
            </div>
            <div class="mt-6 text-center">
              <a href="{{ route('administration') }}" class="inline-block px-6 py-2 text-white transition duration-300 bg-orange-600 rounded-full btn hover:bg-orange-700">
                Meet Our Team <i class="ml-2 fas fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>

        <div data-aos='fade-up' class="w-full md:col-span-2 lg:col-span-2">
          <div class="grid h-full gap-6 md:grid-cols-2">
            <div class="flex flex-col justify-between text-white bg-blue-600 rounded-lg shadow-md">
              <div class="p-6">
                <img src="{{ asset('images/user-tick.svg') }}" class="w-16 h-16 mx-auto mb-4" alt="">
                <h4 class="mb-3 text-xl font-bold text-center">Admissions Ongoing!</h4>
                <p class="px-3 mb-4 text-center">Apply now for Artisan, Certificate, and Diploma programs in various technical fields.</p>
              </div>
              <div class="p-6 text-center">
                <a href="{{ route('admissions') }}" class="inline-block px-4 py-2 text-blue-600 transition duration-300 bg-white rounded-full hover:bg-gray-200">
                  Apply Now <i class="ml-2 fas fa-arrow-right"></i>
                </a>
              </div>
            </div>

            <div class="flex flex-col justify-between text-white bg-green-600 rounded-lg shadow-md">
              <div class="p-6">
                <img src="{{ asset('images/download-w-1.svg') }}" class="w-16 h-16 mx-auto mb-4" alt="">
                <h4 class="mb-3 text-xl font-bold text-center">Resources</h4>
                <p class="px-3 mb-4 text-center">Access important documents, course outlines, and student handbooks in our downloads section.</p>
              </div>
              <div class="p-6 text-center">
                <a href="{{ route('downloads') }}" class="inline-block px-4 py-2 text-green-600 transition duration-300 bg-white rounded-full hover:bg-gray-200">
                  Download <i class="ml-2 fas fa-download"></i>
                </a>
              </div>
            </div>

            <div data-aos='fade-up' class="flex flex-col justify-center text-white bg-yellow-600 rounded-lg shadow-md md:col-span-2">
              <div class="p-6">
                <h4 class="mb-3 text-xl font-bold text-center">Our Programs</h4>
                <p class="px-3 mb-4 text-center">Discover our wide range of technical and vocational programs designed to equip you with industry-relevant skills.</p>
                <div class="text-center">
                  <a href="{{ route('courses') }}" class="inline-block px-4 py-2 text-yellow-600 transition duration-300 bg-white rounded-full hover:bg-gray-200">
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



<section class="py-16 bg-gray-100">
  <div class="container px-4 mx-auto">
      <h2 class="mb-12 text-3xl font-bold text-center text-gray-800">Our Featured Programs</h2>

      <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
          <!-- Program -->
          @foreach ($departments as $department)
            <div data-aos='fade-up' class="overflow-hidden transition-transform bg-white rounded-lg shadow-md hover:scale-105">
                <img src="{{ asset("storage/".$department->photo) }}" alt="{{ $department->photo }}" class="object-cover w-full h-48 lg:h-56">
                <div class="p-6">
                    <h3 class="mb-2 text-xl font-semibold text-orange-600">{{ $department->name }}</h3>
                    <p class="mb-4 text-gray-600">{{ $department->short_desc }}</p>
                    <a href="{{ route('department', $department->name) }}" class="font-semibold text-orange-600 hover:text-orange-700">Learn More →</a>
                </div>
            </div>
          @endforeach

          <!-- General Programs Link -->
          <div data-aos='fade-up' class="flex items-center justify-center overflow-hidden transition-transform bg-orange-600 rounded-lg shadow-md hover:scale-105">
              <div class="p-6 text-center">
                  <h3 class="mb-4 text-2xl font-semibold text-white">Explore All Programs</h3>
                  <p class="mb-6 text-white">Discover our full range of technical and vocational programs.</p>
                  <a href="{{ route('departments') }}" class="px-4 py-2 font-semibold text-orange-600 transition duration-300 bg-white rounded-full hover:bg-gray-100">View All Programs</a>
              </div>
          </div>
      </div>
  </div>
</section>



<section class="py-16 bg-white">
  <div class="container px-4 mx-auto">
      <h2 data-aos='fade-up' class="mb-12 text-3xl font-bold text-center text-gray-800">Student Success Stories</h2>

      <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
          <!-- Success Story 1 -->
          <div data-aos='fade-up' class="p-6 bg-gray-100 rounded-lg shadow-md">
              <img src="{{ asset('images/stories/plumbing-story.jpg') }}" alt="Jane Doe" class="object-cover w-24 h-24 mx-auto mb-4 rounded-full">
              <h3 class="mb-2 text-xl font-semibold text-center text-orange-600">Rashid A.</h3>
              <p class="mb-4 text-center text-gray-600">Welding & Fabrication Graduate</p>
              <p class="text-gray-700">"Thanks to Tetu TVC, I now run my own successful welding store. The hands-on training I received was invaluable."</p>
          </div>

          <!-- Success Story 2 -->
          <div data-aos='fade-up' class="p-6 bg-gray-100 rounded-lg shadow-md">
              <img src="{{ asset('images/stories/fashion-story.jpg') }}" alt="John Smith" class="object-cover w-24 h-24 mx-auto mb-4 rounded-full">
              <h3 class="mb-2 text-xl font-semibold text-center text-orange-600">Sheilla Wangechi</h3>
              <p class="mb-4 text-center text-gray-600"> Fashion Design Graduate</p>
              <p class="text-gray-700">"I can now make my own high quality garments and excel in my modelling journey. Thanks Tetu TVC."</p>
          </div>

          <!-- Success Story 3 -->
          <div data-aos='fade-up' class="p-6 bg-gray-100 rounded-lg shadow-md">
              <img src="{{ asset('images/stories/ict-story.jpeg') }}" alt="Mary Johnson" class="object-cover w-24 h-24 mx-auto mb-4 rounded-full">
              <h3 class="mb-2 text-xl font-semibold text-center text-orange-600">James Kiragu</h3>
              <p class="mb-4 text-center text-gray-600">ICT Graduate</p>
              <p class="text-gray-700">"The skills I learned at Tetu TVC helped me secure a job at a leading tech company. I'm grateful for the practical education I received."</p>
          </div>
      </div>

      {{-- <div class="mt-12 text-center">
          <a href="/success-stories" class="inline-block px-6 py-3 font-semibold text-white transition duration-300 bg-orange-600 rounded-full hover:bg-orange-700">Read More Success Stories</a>
      </div> --}}
  </div>
</section>



<section class="py-16 bg-cyan-100">
  <div class="container px-4 mx-auto">
      <h2 data-aos='fade-up' class="text-3xl font-bold text-center text-gray-800">Our Partners</h2>
      <p data-aos='fade-up' class="mt-6 mb-12 text-center text-gray-600">
        Our partnerships with industry leaders and educational authorities ensure that our programs remain cutting-edge and our graduates are well-prepared for the workforce.
    </p>

      <div class="grid items-center grid-cols-2 gap-8 md:grid-cols-3 lg:grid-cols-6">
          <!-- Partner 1 -->
          <div data-aos='fade-up' class="flex items-center justify-center p-6 transition-shadow duration-300 bg-white rounded-lg shadow-md hover:shadow-lg">
              <img src="/images/partners/knec.png" alt="Kenya National Examinational Council" class="h-16 max-w-full">
          </div>

          <!-- Partner 2 -->
          <div data-aos='fade-up' class="flex items-center justify-center p-6 transition-shadow duration-300 bg-white rounded-lg shadow-md hover:shadow-lg">
              <img src="/images/partners/CDAAC.png" alt="CDAAC Logo" class="h-16 max-w-full">
          </div>

          <!-- Partner 3 -->
          <div data-aos='fade-up' class="flex items-center justify-center p-6 transition-shadow duration-300 bg-white rounded-lg shadow-md hover:shadow-lg">
              <img src="/images/partners/nita.png" alt="NITA Logo" class="h-16 max-w-full">
          </div>

          <!-- Partner 4 -->
          <div data-aos='fade-up' class="flex items-center justify-center p-6 transition-shadow duration-300 bg-white rounded-lg shadow-md hover:shadow-lg">
              <img src="/images/partners/Ministry-of-Education-logo.jpg" alt="Ministry of Education" class="max-w-full max-h-16">
          </div>

          <!-- Partner 5 -->
          <div data-aos='fade-up' class="flex items-center justify-center p-6 transition-shadow duration-300 bg-white rounded-lg shadow-md hover:shadow-lg">
              <img src="/images/partners/TVETA.png" alt="TVETA" class="h-16 max-w-full">
          </div>

          <!-- Partner 5 -->
          <div data-aos='fade-up' title="Kenya Association of Technical Training Institutions" class="flex items-center justify-center p-6 transition-shadow duration-300 bg-white rounded-lg shadow-md hover:shadow-lg">
              <img src="/images/partners/katti.png" alt="KATTI" class="h-16 max-w-full">
          </div>
      </div>

      {{-- <div data-aos='fade-up' class="mt-12 text-center">
          <a href="/our-partners" class="inline-block px-6 py-3 font-semibold text-white transition duration-300 bg-orange-600 rounded-full hover:bg-orange-700">
              Learn More About Our Partnerships
          </a>
      </div> --}}
  </div>
</section>


</x-guest-layout>
