<!-- we are able to turn zero into one -->
<!-- Tambahkan Swiper.js CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>

<body>
    <x-guestlayout>
        <x-navbar></x-navbar>

        <div class="bg-[#27292a] w-[90%] max-w-[1400px] rounded-3xl p-14 flex flex-col gap-14">
            <!-- Frame Abu-abu sebagai Container -->
            <div class="relative bg-[#1f2122] rounded-2xl p-6 overflow-hidden">
                <!-- Swiper Banner -->
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <!-- Slide 1 -->
                        <div class="swiper-slide flex justify-center">
                            <img src="assets/images/banner.jpeg" alt="" class="w-[95%] h-[600px] object-cover rounded-xl shadow-lg">
                        </div>
                        <!-- Slide 2 -->
                        <div class="swiper-slide flex justify-center">
                            <img src="assets/images/banner.jpeg" alt="" class="w-[95%] h-[600px] object-cover rounded-xl shadow-lg">
                        </div>
                        <!-- Slide 3 -->
                        <div class="swiper-slide flex justify-center">
                            <img src="assets/images/banner.jpeg" alt="" class="w-[95%] h-[600px] object-cover rounded-xl shadow-lg">
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

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var swiper = new Swiper(".swiper-container", {
                loop: true, // Slide akan looping terus
                autoplay: {
                    delay: 3000, // Ganti slide setiap 3 detik
                    disableOnInteraction: false, // Tetap autoplay meski user berinteraksi
                },
                spaceBetween: 20, // Beri jarak antar slide
                centeredSlides: true, // Slide selalu berada di tengah
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
            });
        });
    </script>
</body>