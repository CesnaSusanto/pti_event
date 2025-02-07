<!-- we are able to turn zero into one -->

<body >
    <x-guestlayout>
    <x-navbar></x-navbar>
        <div class="bg-[#27292a] w-[90%] max-w-[1400px] rounded-3xl p-14 flex flex-col gap-14">
            <div id="banner" class="h-[600px] rounded-2xl ">
                <img src="assets/images/banner.jpeg" alt="" class="h-full w-full object-cover rounded-2xl">
            </div>
            <div class="bg-[#1f2122] flex flex-col w-full rounded-2xl p-10 gap-5">
                <h1 class="text-white uppercase font-semibold text-3xl">
                    newest 
                    <span class="text-[#ec6090]">
                        event
                    </span>
                </h1>
                <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 gap-5 w-full ">
<<<<<<< HEAD
                <x-eventcard image='assets/images/banner.jpeg' title="Judul Artikel" description="Deskripsi singkat artikel" date="24 Januari 2025" location="jakarta"/>

=======
                    @if(isset($newestEvents) && count($newestEvents) > 0)
                        @foreach($newestEvents as $event)
                            <x-eventcard :event="$event"></x-eventcard>
                        @endforeach
                    @else
                        <p class="text-white">No events found</p>
                    @endif
>>>>>>> d587c7a7c894b1b839bb91fa5f0c9117a00a3826
                </div>
            </div>
            <div class="bg-[#1f2122] flex flex-col w-full rounded-2xl p-10 gap-5">
                <h1 class="text-white uppercase font-semibold text-3xl">
                    Nearest 
                    <span class="text-[#ec6090]">
                        event
                    </span>
                </h1>
                <div class="flex flex-col w-full ">
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

</body>
