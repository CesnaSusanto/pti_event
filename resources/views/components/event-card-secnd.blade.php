@props(['event'])

<div class="flex flex-row items-center gap-10 py-5 border-b-[1px] border-[#27292a] w-full">
<<<<<<< HEAD
    <img src="{{ asset('uploads/events/' . $event->foto_event) }}" alt="{{ $event->nama_event }}" class="w-full h-[200px] object-cover rounded-lg">
        <div class="flex flex-row items-center w-full">
=======
    <img src="{{ asset('uploads/events/' . $event->foto_event) }}" alt="{{ $event->nama_event }}" class="w-full h-[200px] object-cover rounded-lg">
    <div class="flex flex-row items-center w-full">
>>>>>>> dc09b51d25492c00af438806f882448defbcc4ed
        <div class="flex flex-col w-full gap-2 capitalize">
            <div class="line-clamp-1 text-white font-semibold">{{ $event->nama_event }}</div>
            <div class="line-clamp-1 text-[#9e9e9e] text-sm">{{ $event->kota_event }}</div>
        </div>
        <div class="flex flex-col w-full gap-2 capitalize">
            <div class="line-clamp-1 text-white font-semibold">location</div>
            <div class="line-clamp-1 text-[#9e9e9e] text-sm">{{ $event->kota_event }}</div>
        </div>
        <div class="flex flex-col w-full gap-2 capitalize">
            <div class="line-clamp-1 text-white font-semibold">date added</div>
            <div class="line-clamp-1 text-[#9e9e9e] text-sm">{{ $event->tanggal_event }}</div>
        </div>
        <div class="flex flex-col w-full gap-2 capitalize">
            <div class="line-clamp-1 text-white font-semibold">open gate</div>
            <div class="line-clamp-1 text-[#9e9e9e] text-sm">{{ \Carbon\Carbon::parse($event->open_gate)->format('H:i') }}</div>
        </div>
    </div>
    <div>
        <a href="{{ route('user.dashboard', $event->id) }}" class="border-2 border-[#ec6090] text-[#ec6090] uppercase px-6 py-3 rounded-full hover:bg-[#ec6090] hover:text-white time duration-300">detail</a>
    </div>
</div>