@props(['event'])

<a href="{{ route('event.details', ['id' => $event->id]) }}" 
   class="flex flex-col w-full bg-[#27292a] p-4 pb-6 gap-5 rounded-xl hover:scale-105 transition-transform duration-300 event-card" 
   data-city="{{ strtolower($event->kota_event) }}">
   
    <img src="{{ asset('uploads/events/' . $event->foto_event) }}" alt="{{ $event->nama_event }}" class="w-full h-[200px] object-cover rounded-lg">
    
    <div class="flex flex-col gap-4">
        <h1 class="line-clamp-2 font-medium capitalize text-white h-12">{{ $event->nama_event }}</h1>
        <span class="text-sm line-clamp-4 h-20 text-[#c0c0c0]">{{ $event->deskripsi_event }}</span>
        
        <div class="flex flex-row justify-between text-sm text-[#9e9e9e]">
            <div class="flex flex-row gap-2 capitalize">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="#ec6090">
                    <path d="M9 1V3H15V1H17V3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2 3 3 3H7V1H9ZM20 11H4V19H20V11ZM8 13V15H6V13H8ZM13 13V15H11V13H13ZM18 13V15H16V13H18ZM7 5H4V9H20V5H17V7H15V5H9V7H7V5Z"></path>
                </svg>
                {{ $event->tanggal_event }}
            </div>
            <div class="flex flex-row gap-2 capitalize">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="#ec6090">
                    <path d="M12 23.7279L5.63604 17.364C2.12132 13.8492 2.12132 8.15076 5.63604 4.63604C9.15076 1.12132 14.8492 1.12132 18.364 4.63604C21.8787 8.15076 21.8787 13.8492 18.364 17.364L12 23.7279ZM16.9497 15.9497C19.6834 13.2161 19.6834 8.78392 16.9497 6.05025C14.2161 3.31658 9.78392 3.31658 7.05025 6.05025C4.31658 8.78392 4.31658 13.2161 7.05025 15.9497L12 20.8995L16.9497 15.9497ZM12 13C10.8954 13 10 12.1046 10 11C10 9.89543 10.8954 9 12 9C13.1046 9 14 9.89543 14 11C14 12.1046 13.1046 13 12 13Z"></path>
                </svg>
                {{ $event->kota_event }}
            </div>
        </div>
    </div>
</a>

{{-- @props(['event'])

<div id="card" class="flex flex-col w-full bg-[#27292a] p-4 pb-6 gap-5 rounded-xl">
    <img src="{{ asset('uploads/events/' . $event->foto_event) }}" alt="{{ $event->nama_event }}" class="w-full h-[200px] object-cover rounded-lg">
    <div class="flex flex-col gap-4">
        <h1 class="line-clamp-2 font-medium capitalize text-white h-12">{{ $event->nama_event }}</h1>
        <span class="text-sm line-clamp-4 h-20 text-[#c0c0c0]">{{ $event->deskripsi_event }}</span>
        <div class="flex flex-row justify-between text-sm text-[#9e9e9e]">
            <div class="flex flex-row gap-2 capitalize">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="#ec6090">
                    <path d="M9 1V3H15V1H17V3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7V1H9ZM20 11H4V19H20V11ZM8 13V15H6V13H8ZM13 13V15H11V13H13ZM18 13V15H16V13H18ZM7 5H4V9H20V5H17V7H15V5H9V7H7V5Z"></path>
                </svg>
                {{ $event->tanggal_event }}
            </div>
            <div class="flex flex-row gap-2 capitalize">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="#ec6090">
                    <path d="M12 23.7279L5.63604 17.364C2.12132 13.8492 2.12132 8.15076 5.63604 4.63604C9.15076 1.12132 14.8492 1.12132 18.364 4.63604C21.8787 8.15076 21.8787 13.8492 18.364 17.364L12 23.7279ZM16.9497 15.9497C19.6834 13.2161 19.6834 8.78392 16.9497 6.05025C14.2161 3.31658 9.78392 3.31658 7.05025 6.05025C4.31658 8.78392 4.31658 13.2161 7.05025 15.9497L12 20.8995L16.9497 15.9497ZM12 13C10.8954 13 10 12.1046 10 11C10 9.89543 10.8954 9 12 9C13.1046 9 14 9.89543 14 11C14 12.1046 13.1046 13 12 13Z"></path>
                </svg>
                {{ $event->kota_event }}
            </div>
        </div>
    </div>
</div> --}}