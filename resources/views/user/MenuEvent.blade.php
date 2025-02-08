<x-guestlayout>
    <x-navbar></x-navbar>
    <div class="bg-[#27292a] w-[100%] max-w-[1400px] rounded-3xl p-14 flex flex-col gap-14">
        <div class="text-white uppercase font-semibold text-3xl w-full">
            <span>event at</span>
            <select id="cityFilter" class="text-[#ec6090] bg-transparent border-none outline-none uppercase text-3xl w-auto *:text-sm pr-14 hover:text-[#ec6090]/70 duration-100 rounded-lg">
                <option value="all">Semua Kota</option>
                @foreach ($events->pluck('kota_event')->unique() as $kota)
                    <option value="{{ strtolower($kota) }}">{{ ucfirst($kota) }}</option>
                @endforeach
            </select>
        </div>
        <div class="bg-[#1f2122] flex flex-col w-full rounded-2xl p-10 gap-5">
            <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 gap-5 w-full" id="eventList">
                @foreach ($events as $event)
                    <x-eventcard :event="$event" data-city="{{ strtolower($event->kota_event) }}" class="event-card flex"/>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const cityFilter = document.getElementById('cityFilter');
            cityFilter.addEventListener('change', function() {
                const selectedCity = cityFilter.value.toLowerCase();
                document.querySelectorAll('.event-card').forEach(card => {
                    if (selectedCity === 'all' || card.dataset.city === selectedCity) {
                        card.style.display = 'flex'; // Sesuai dengan layout yang digunakan (bisa 'grid' jika pakai grid)
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    </script>
</x-guestlayout>
