<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Tetu Technical and Vocational College</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
        content="Tetu Technical and Vocational College offers quality education in Cosmetology, Hospitality, Fashion, ICT, and Agriculture. Join us for a brighter future!">
    <link rel="canonical" href="https://www.tetutvc.ac.ke" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Righteous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="shortcut icon" href="{{ asset('images/logo.jpeg') }}" type="image/jpeg">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.tetutvc.ac.ke/">
    <meta property="og:title" content="Tetu Technical and Vocational College | Quality Education in Kenya">
    <meta property="og:description"
        content="Tetu TVC offers quality education in Cosmetology, Hospitality, Fashion, ICT, and Agriculture. Join us for a brighter future!">
    <meta property="og:image" content="{{ asset('images/logo.jpeg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://www.tetutvc.ac.ke/">
    <meta property="twitter:title" content="Tetu Technical and Vocational College | Quality Education in Kenya">
    <meta property="twitter:description"
        content="Tetu TVC offers quality education in Cosmetology, Hospitality, Fashion, ICT, and Agriculture. Join us for a brighter future!">
    <meta property="twitter:image" content="{{ asset('images/logo.jpeg') }}">



    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>


    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js" defer></script>


    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>

<body class="font-sans antialiased">




    {{ $slot }}


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Desktop navigation hover effects
            const navItems = document.querySelectorAll('#mainNav .xl\\:flex a');
            navItems.forEach(item => {
                item.addEventListener('mouseenter', function() {
                    this.classList.add('text-orange-600');
                });
                item.addEventListener('mouseleave', function() {
                    if (!this.classList.contains('active')) {
                        this.classList.remove('text-orange-600');
                    }
                });
            });
        
            // Mobile menu toggle
            const mobileMenuButton = document.getElementById('mobileMenuButton');
            const closeMobileMenu = document.getElementById('closeMobileMenu');
            const mobileMenu = document.getElementById('mobileMenu');
            
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.remove('-translate-x-full');
                document.body.style.overflow = 'hidden';
            });
            
            closeMobileMenu.addEventListener('click', function() {
                mobileMenu.classList.add('-translate-x-full');
                document.body.style.overflow = 'auto';
            });
            
            // Mobile dropdowns
            const mobileDropdowns = document.querySelectorAll('.mobile-dropdown button');
            mobileDropdowns.forEach(dropdown => {
                dropdown.addEventListener('click', function() {
                    const content = this.nextElementSibling;
                    const icon = this.querySelector('i');
                    
                    if (content.classList.contains('hidden')) {
                        content.classList.remove('hidden');
                        icon.classList.remove('fa-chevron-down');
                        icon.classList.add('fa-chevron-up');
                    } else {
                        content.classList.add('hidden');
                        icon.classList.remove('fa-chevron-up');
                        icon.classList.add('fa-chevron-down');
                    }
                });
            });
            
            // Highlight current page in navigation
            const currentPath = window.location.pathname;
            const navLinks = document.querySelectorAll('nav a');
            
            navLinks.forEach(link => {
                const linkPath = new URL(link.href, window.location.origin).pathname;
                if (currentPath === linkPath || currentPath.startsWith(linkPath) && linkPath !== '/') {
                    link.classList.add('text-orange-600', 'active');
                    if (link.classList.contains('hover:border-b-2')) {
                        link.classList.add('border-b-2', 'border-orange-600');
                    }
                }
            });
        });
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
        });
    </script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const swiper = new Swiper('.heroSwiper', {
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
                on: {
                    init: function() {
                        animateSlideElements(this.slides[this.activeIndex]);
                    },
                    slideChangeTransitionEnd: function() {
                        animateSlideElements(this.slides[this.activeIndex]);
                    },
                },
            });
        
            function animateSlideElements(slide) {
                // Reset all animations
                const elements = slide.querySelectorAll('[data-swiper-animation]');
                elements.forEach(el => {
                    el.classList.remove('animate__fadeInLeft', 'animate__fadeInUp', 'animate__zoomIn');
                    el.style.opacity = '0';
                });
        
                // Animate elements with delay
                elements.forEach(el => {
                    const animation = el.dataset.swiperAnimation;
                    const delay = el.dataset.animationDelay || '0';
                    
                    setTimeout(() => {
                        el.style.opacity = '1';
                        el.classList.add(animation);
                    }, delay * 1000);
                });
            }
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {

            AOS.init({
                duration: 1000, // Animation duration in milliseconds
                once: true, // Whether animation should happen only once
                easing: 'ease-in-out', // Easing function for the animation
            });

            });
            
    </script>








</body>

</html>