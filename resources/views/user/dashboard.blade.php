<!-- Tambahkan Swiper.js CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>

<body>
    <x-guestlayout>
        <x-navbar></x-navbar>

        <div class="bg-[#27292a] w-[90%] max-w-[1400px] rounded-3xl p-14 flex flex-col gap-14">
            <!-- Frame Abu-abu sebagai Container -->
            <div class="relative bg-[#1f2122] rounded-2xl p-6">
                <!-- Swiper Banner -->
                <div class="swiper-container w-[890px] mx-auto">
                    <div class="swiper-wrapper">
                        <!-- Slide 1 -->
                        <div class="swiper-slide">
                            <div class="w-[890px] h-[500px] bg-black rounded-xl overflow-hidden">
                                <img src="uploads/events/nct_127_poster.jpeg" alt="" 
                                    class="w-full h-full object-contain">
                            </div>
                        </div>
                        <!-- Slide 2 -->
                        <div class="swiper-slide">
                            <div class="w-[890px] h-[500px] bg-black rounded-xl overflow-hidden">
                                <img src="uploads/events/comfesticshow_poster.jpg" alt="" 
                                    class="w-full h-full object-contain">
                            </div>
                        </div>
                        <!-- Slide 3 -->
                        <div class="swiper-slide">
                            <div class="w-[890px] h-[500px] bg-black rounded-xl overflow-hidden">
                                <img src="assets/images/banner.jpeg" alt="" 
                                    class="w-full h-full object-contain">
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>

            <!-- Section Newest Event -->
            <div class="bg-[#1f2122] flex flex-col w-full rounded-2xl p-10 gap-5">
                <h1 class="text-white uppercase font-semibold text-3xl">
                    newest 
                    <span class="text-[#ec6090]">
                        event
                    </span>
                </h1>
                <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 gap-5 w-full">
                    @if(isset($newestEvents) && count($newestEvents) > 0)
                        @foreach($newestEvents as $event)
                            <x-eventcard :event="$event"></x-eventcard>
                        @endforeach
                    @else
                        <p class="text-white">No events found</p>
                    @endif
                </div>
            </div>

            <!-- Section Nearest Event -->
            <div class="bg-[#1f2122] flex flex-col w-full rounded-2xl p-10 gap-5">
                <h1 class="text-white uppercase font-semibold text-3xl">
                    Nearest 
                    <span class="text-[#ec6090]">
                        event
                    </span>
                </h1>
                <div class="flex flex-col w-full">
                    @if(isset($nearestEvents) && count($nearestEvents) > 0)
                        @foreach($nearestEvents as $event)
                            <x-eventcardsecnd :event="$event"></x-eventcardsecnd>
                        @endforeach
                    @else
                        <p class="text-white">No nearest events found</p>
                    @endif
                </div>
            </div>
        </div>

        <x-footer></x-footer>
    </x-guestlayout>

    <!-- Tambahkan Swiper.js JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <style>
        /* Custom styling untuk Swiper */
        .swiper-container {
            overflow: hidden !important;
            border-radius: 0.75rem;
        }
        
        .swiper-wrapper {
            overflow: hidden !important;
        }
        
        .swiper-slide {
            width: 890px !important;
        }
        
        .swiper-pagination-bullet {
            background: #ffffff;
            opacity: 0.5;
        }
        
        .swiper-pagination-bullet-active {
            background: #ec6090;
            opacity: 1;
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var swiper = new Swiper(".swiper-container", {
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                slidesPerView: 1,
                centeredSlides: true,
                effect: "fade", // Menggunakan efek fade
                fadeEffect: {
                    crossFade: true
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                }
            });
        });
    </script>
</body>
