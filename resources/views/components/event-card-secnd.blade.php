@props(['event'])

@props(['event'])

<a href="{{ route('event.details', ['id' => $event->id]) }}" 
   class="flex flex-row items-center gap-10 py-5 border-b-[1px] border-[#27292a] w-full hover:bg-[#333435] transition duration-300 p-4 rounded-lg">

    <img src="{{ asset('uploads/events/' . $event->foto_event) }}" alt="{{ $event->nama_event }}" class="w-[200px] h-[150px] object-cover rounded-lg">

    <div class="flex flex-row items-center w-full">
        <div class="flex flex-col w-full gap-2 capitalize">
            <div class="line-clamp-1 text-white font-semibold">{{ $event->nama_event }}</div>
            <div class="line-clamp-1 text-[#9e9e9e] text-sm">{{ $event->kota_event }}</div>
        </div>
        <!-- <div class="flex flex-col w-full gap-2 capitalize">
            <div class="line-clamp-1 text-white font-semibold">location</div>
            <div class="line-clamp-1 text-[#9e9e9e] text-sm">{{ $event->kota_event }}</div>
        </div> -->
        <div class="flex flex-col w-full gap-2 capitalize">
            <div class="line-clamp-1 text-white font-semibold">date added</div>
            <div class="line-clamp-1 text-[#9e9e9e] text-sm">{{ \Carbon\Carbon::parse($event->tanggal_event)->format('d M Y') }}</div>
        </div>
        <div class="flex flex-col w-full gap-2 capitalize">
            <div class="line-clamp-1 text-white font-semibold">open gate</div>
            <div class="line-clamp-1 text-[#9e9e9e] text-sm">{{ \Carbon\Carbon::parse($event->open_gate)->format('H:i') }}</div>
        </div>
        <div class="flex flex-col w-full gap-2 capitalize">
            <div class="line-clamp-1 text-white font-semibold">Countdown</div>
            <div id="countdown-{{ $event->id }}" class="line-clamp-1 text-[#ec6090] text-sm font-semibold">
                Loading...
            </div>
        </div>
    </div>  

    <div>
        <button class="border-2 border-[#ec6090] text-[#ec6090] uppercase px-6 py-3 rounded-full hover:bg-[#ec6090] hover:text-white transition duration-300">
            Detail
        </button>
    </div>

</a>