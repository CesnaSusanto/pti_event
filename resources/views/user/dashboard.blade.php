    <x-guestlayout>
        <x-navbar></x-navbar>

        <div class="bg-[#27292a] w-[90%] max-w-[1400px] rounded-3xl p-14 flex flex-col gap-14">
            <!-- Frame Abu-abu sebagai Container -->
            <div class="relative bg-[#1f2122] rounded-2xl overflow-hidden h-[600px]">
                <!-- Swiper Banner -->
                <div class="swiper-container w-full h-full">
                    <div class="swiper-wrapper w-full h-full">
                        @php
                            $imageFiles = File::files(public_path('assets/images'));
                        @endphp

                        @foreach($imageFiles as $file)
                            <div class="w-full swiper-slide flex justify-center duration-200" style="background-position:center; background-image: url({{ asset('assets/images/' . $file->getFilename()) }})">
                                <img src="{{ asset('assets/images/' . $file->getFilename()) }}" 
                                     alt="{{ $file->getFilename() }}" 
                                     class="h-full w-full object-contain backdrop-blur-sm bg-black/20">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="swiper-pagination"></div>
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
                    loop: true,
                    autoplay: {
                        delay: 4000, 
                        disableOnInteraction: false, 
                    },
                    slidesPerView: 1, 
                    centeredSlides: true,
                    effect: "slide", 
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
    


        <x-footer></x-footer>
    </x-guestlayout>

    