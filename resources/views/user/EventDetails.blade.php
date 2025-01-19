<x-head></x-head>
<x-guestlayout>
    <x-navbar></x-navbar>
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
</x-guestlayout>