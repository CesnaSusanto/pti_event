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

        <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                var swiper = new Swiper(".swiper-container", {
                    loop: true, // Slide akan terus berulang
                    autoplay: {
                        delay: 4000, // Ganti ke 4 detik agar lebih terasa
                        disableOnInteraction: false, // Tetap autoplay meskipun user berinteraksi
                    },
                    slidesPerView: 1, // Hanya 1 slide yang terlihat per waktu
                    centeredSlides: true,
                    effect: "slide", // Gunakan efek slide biasa dulu, jika ingin fade bisa diganti
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                    },
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    }
                });
            });
        </script>
        

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            function startCountdown(eventId, openGateTime) {
                const countdownElement = document.getElementById(`countdown-${eventId}`);

                function updateCountdown() {
                    const now = new Date().getTime();
                    const eventTime = new Date(openGateTime).getTime();
                    const timeDifference = eventTime - now;

                    if (timeDifference <= 0) {
                        countdownElement.innerHTML = "Sedang Berlangsung!";
                        return;
                    }

                    const days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
                    const hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
                    // const seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

                    countdownElement.innerHTML = `${days}d ${hours}h ${minutes}m`;
                    // countdownElement.innerHTML = `${days}d ${hours}h ${minutes}m ${seconds}s`;
                }

                updateCountdown();
                setInterval(updateCountdown, 1000);
            }

            @if(isset($nearestEvents))
                @foreach($nearestEvents as $event)
                    startCountdown({{ $event->id }}, "{{ \Carbon\Carbon::parse($event->open_gate)->format('Y-m-d H:i:s') }}");
                @endforeach
            @endif
        });
    </script>
    
</body>

        <x-footer></x-footer>
    </x-guestlayout>

    