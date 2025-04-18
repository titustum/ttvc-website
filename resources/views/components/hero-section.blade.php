@props(['slideContents'=>[]])

<section id="hero" class="relative lg:h-[calc(100vh-150px)]">
    <div class="h-full swiper heroSwiper">
        <div class="swiper-wrapper">

            @foreach ($slideContents as $index => $content)
            <!-- Slides -->
            <div class="relative h-full bg-center bg-no-repeat bg-cover swiper-slide"
                style="background-image: url('{{  asset('storage/'. $content->image)  }}');">
                <div class="absolute inset-0 bg-black/60"></div>
                <div class="container relative flex flex-col items-start justify-center h-full px-4 mx-auto">
                    <div class="max-w-3xl py-24">
                        <h1 class="mb-4 text-4xl font-bold leading-tight text-white opacity-0 md:text-5xl lg:text-6xl animate__animated" data-swiper-animation="animate__fadeInLeft"
                            data-animation-delay="0.3s">
                            {{ $content->title }}
                        </h1>
                        <h2 class="hidden text-xl opacity-0 lg:block md:text-2xl lg:text-3xl text-cyan-300 animate__animated" data-swiper-animation="animate__fadeInUp"
                            data-animation-delay="0.6s">
                            {{ $content->subtitle }}
                        </h2>
                        <p class="mb-8 text-lg font-semibold text-green-300 opacity-0 animate__animated"
                            data-swiper-animation="animate__fadeInUp" data-animation-delay="0.9s">
                            {{ $content->slogan }}
                        </p>
                        <a href="{{ route('admissions') }}"
                            class="px-6 py-3 mt-6 text-lg font-semibold text-white transition-colors bg-orange-600 rounded-full opacity-0 hover:bg-orange-500 animate__animated"
                            data-swiper-animation="animate__zoomIn" data-animation-delay="1.2s">
                            {{ $content->button_text }} <i class="ml-2 fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <!-- Navigation -->
        <div class="swiper-pagination"></div>
        <div class="hidden md:block swiper-button-prev"></div>
        <div class="hidden md:block swiper-button-next"></div>
    </div>
</section>