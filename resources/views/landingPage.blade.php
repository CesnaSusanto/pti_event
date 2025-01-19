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
                    <x-eventcard></x-eventcard>
                    <x-eventcard></x-eventcard>
                    <x-eventcard></x-eventcard>
                    <x-eventcard></x-eventcard>
                    <x-eventcard></x-eventcard>
                    <x-eventcard></x-eventcard>
                    <x-eventcard></x-eventcard>
                    <x-eventcard></x-eventcard>
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
                    <x-eventcardsecnd></x-eventcardsecnd>
                    <x-eventcardsecnd></x-eventcardsecnd>
                    <x-eventcardsecnd></x-eventcardsecnd>
                    <x-eventcardsecnd></x-eventcardsecnd>
                </div>
                </div>
        </div>
        <x-footer></x-footer>
    </x-guestlayout>

</body>
