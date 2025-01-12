<section class="w-full bg-gray-100 min-h-[600px] px-3">
    <div class="container mx-auto">
        <div class="flex flex-col lg:flex-row gap-8 py-8">
            <!-- Slideshow Section - Takes up 2/3 of the space on desktop -->
            <div class="lg:w-2/3 relative">
                <div class="owl-carousel owl-theme">
                    <!-- Slides will be dynamically populated here -->
                    <div class="item">
                        <img src="{{ asset('images/january inatke.jpg') }}" alt="Drama festival" class="w-full h-[400px] object-cover">
                        <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-4">
                            <p class="text-lg font-medium">Tetu TVC Students showing their exemplary skills in modelling</p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="{{ asset('images/412904169_1120509982657389_1257637250141827548_n (1).jpg') }}" alt="Drama festival" class="w-full h-full object-cover">
                        <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-4">
                            <p class="text-lg font-medium">Tetu Technical and Vocational College students performing music at Dedan Kimathi University</p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="{{ asset('images/modelling.jpg') }}" alt="Academic Excellence" class="w-full h-[400px] object-cover">
                        <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-4">
                            <p class="text-lg font-medium">Pursue academic excellence</p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="{{ asset('images/welcomeing studnets.jpg') }}" alt="Research Facilities" class="w-full h-[400px] object-cover">
                        <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-4">
                            <p class="text-lg font-medium">State-of-the-art research facilities</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Section - Takes up 1/3 of the space on desktop -->
            <div class="lg:w-1/3 flex flex-col justify-center gap-6">
                <div class="space-y-6">
                    <h1 class="text-4xl font-bold text-gray-900">
                        Welcome to Tetu TVC
                    </h1>
                    <p class="text-lg text-gray-600">
                        Discover your potential and shape your future with us.
                    </p>
                </div>

                <div class="space-y-4">
                    <a href="https://tetutvc.ac.ke/admissions"
                    class="block w-full bg-orange-600 hover:bg-orange-700 text-white text-lg font-semibold py-6 px-4 rounded-lg text-center transition-all duration-300 shadow-md hover:shadow-lg">
                        Apply Now
                        <span class="inline-block ml-2">→</span>
                    </a>
                    <a href="https://tetutvc.ac.ke/visit"
                    class="block w-full bg-white hover:bg-gray-50 text-orange-600 text-lg font-semibold py-6 px-4 rounded-lg text-center transition-all duration-300 border-2 border-orange-600 shadow-md hover:shadow-lg">
                        Schedule a Visit
                    </a>
                    <a href="https://tetutvc.ac.ke/courses"
                    class="block w-full bg-gray-300 hover:bg-gray-400 text-gray-900 text-lg font-semibold py-6 px-4 rounded-lg text-center transition-all duration-300 shadow-md hover:shadow-lg">
                        View Programs
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>



