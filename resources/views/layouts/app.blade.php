<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>@yield('title') - Tetu Technical and Vocational College</title>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="description" content="Tetu Technical and Vocational College offers quality education in Cosmetology, Hospitality, Fashion, ICT, and Agriculture. Join us for a brighter future!">
      <link rel="canonical" href="https://www.tetutvc.ac.ke" />
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Righteous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
      <link rel="shortcut icon" href="{{ asset('images/logo.jpeg') }}" type="image/jpeg">
      {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

      <!-- Open Graph / Facebook -->
      <meta property="og:type" content="website">
      <meta property="og:url" content="https://www.tetutvc.ac.ke/">
      <meta property="og:title" content="Tetu Technical and Vocational College | Quality Education in Kenya">
      <meta property="og:description" content="Tetu TVC offers quality education in Cosmetology, Hospitality, Fashion, ICT, and Agriculture. Join us for a brighter future!">
      <meta property="og:image" content="{{ asset('images/logo.jpeg') }}">

      <!-- Twitter -->
      <meta property="twitter:card" content="summary_large_image">
      <meta property="twitter:url" content="https://www.tetutvc.ac.ke/">
      <meta property="twitter:title" content="Tetu Technical and Vocational College | Quality Education in Kenya">
      <meta property="twitter:description" content="Tetu TVC offers quality education in Cosmetology, Hospitality, Fashion, ICT, and Agriculture. Join us for a brighter future!">
      <meta property="twitter:image" content="{{ asset('images/logo.jpeg') }}">


      <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        .owl-carousel .item img {
            width: 100%; /* Make sure images fill the container horizontally */
            height: 500px !important; /* Ensure images fill the container vertically */
            object-fit: cover; /* Ensure images cover the entire area without distorting */
        }
        /* .owl-stage-outer {
            height: 500px;
        } */


    </style>


    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
 


      <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('build/assets/app-CHZNvl4T.css') }}">

      {{-- <script src="{{ asset('build/assets/app-C1-XIpUa.js') }}"></script> --}}


      @vite(['resources/css/app.css', 'resources/js/app.js'])




  </head>
<body class="font-sans antialiased">




    {{ $slot }}


    <script>
        window.addEventListener("DOMContentLoaded", (event) => {
            const mobileMenuButton = document.getElementById('mobileMenuButton');
            const mobileMenu = document.getElementById('mobileMenu');
            const closeMobileMenu = document.getElementById('closeMobileMenu');
            const mobileDepartmentsDropdown = document.getElementById('mobileDepartmentsDropdown');
            const mobileDepartmentsMenu = document.getElementById('mobileDepartmentsMenu');

            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.remove('-translate-x-full');
            });

            closeMobileMenu.addEventListener('click', () => {
                mobileMenu.classList.add('-translate-x-full');
            });
        })
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const lazyImages = document.querySelectorAll('img.lazy');
            const teamContainer = document.getElementById('teamContainer');
            const scrollLeftBtn = document.getElementById('scrollLeft');
            const scrollRightBtn = document.getElementById('scrollRight');

            // Lazy loading
            const lazyLoad = function() {
                lazyImages.forEach(img => {
                    if (img.getBoundingClientRect().left <= window.innerWidth) {
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                    }
                });
            };

            // Initial load
            lazyLoad();

            // Scroll event for lazy loading
            // teamContainer.addEventListener('scroll', lazyLoad);

            // Scroll buttons functionality
            // scrollLeftBtn.addEventListener('click', () => {
            //     teamContainer.scrollBy({ left: -200, behavior: 'smooth' });
            // });

            // scrollRightBtn.addEventListener('click', () => {
            //     teamContainer.scrollBy({ left: 200, behavior: 'smooth' });
            // });
        });
    </script>



 <!-- jQuery -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

 <!-- Owl Carousel JS -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

 <script>
    $(document).ready(function(){
    $(".owl-carousel").owlCarousel({
        items: 1, // Default to 1 item visible at a time
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        nav: true,
        navText: [
            '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>',
            '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>'
        ],
        dots: true,
        responsive: {
            0: {
                items: 1 // On small screens, show 1 item
            },
            600: {
                items: 2 // On medium screens, show 2 items
            },
            1000: {
                items: 1 // On large screens, show 1 item
            }
        }
    });
});

</script>




    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init();
    </script>



  </body>
  </html>

