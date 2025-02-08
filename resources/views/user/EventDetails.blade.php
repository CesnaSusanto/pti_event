<x-guestlayout>
  <head>
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin="" />
    <!-- Leaflet Routing Machine CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
    <style>
      .leaflet-control-container .leaflet-routing-container-hide {
        display: none;
      }
      /* Mengubah warna teks instruksi rute */
      .leaflet-routing-container {
        color: #000000 !important;
      }
      .leaflet-routing-container .leaflet-routing-instructions {
        color: #000000 !important;
      }
      /* Mengubah warna teks detail rute */
      .leaflet-routing-alt {
        color: #000000 !important;
      }
      .leaflet-routing-alt h2 {
        color: #000000 !important;
      }
      .leaflet-routing-alt h3 {
        color: #000000 !important;
      }
      .leaflet-routing-alt table {
        color: #000000 !important;
      }
      /* Mengubah ukuran tabel deskripsi */
      #content-area {
        font-size: 1.1rem;
        max-width: 100%;
      }
    </style>
  </head>

  <x-navbar></x-navbar>
  <div class="bg-[#0000] w-[90%] max-w-[1400px] rounded-3xl p-14 flex flex-col gap-10 text-white">
    <div class="h-[500px] rounded-2xl overflow-hidden bg-center" 
         style="background-image: url({{ asset('uploads/events/' . $event->foto_event) }});">
      <div class="w-full h-full flex flex-row justify-center backdrop-blur-md bg-black/80">
        <img src="{{ asset('uploads/events/' . $event->foto_event) }}" alt="{{ $event->nama_event }}" class="object-cover">
      </div>
    </div>

    <div class="flex flex-col gap-8 px-4 w-full">
      <h1 class="text-3xl uppercase font-semibold tracking-wide">{{ $event->nama_event }}</h1>
      <div class="flex flex-row gap-5">
        <button id="deskripsi-btn" class="bg-[#ec6090] px-6 py-2 capitalize rounded-full hover:bg-[#ff84af] duration-200 cursor-pointer">Deskripsi</button>
        <button id="lineup-btn" class="bg-[#ec6090] px-6 py-2 capitalize rounded-full hover:bg-[#ff84af] duration-200 cursor-pointer">Line Up</button>
        <button id="lokasi-btn" class="bg-[#ec6090] px-6 py-2 capitalize rounded-full hover:bg-[#ff84af] duration-200 cursor-pointer">Lokasi</button>
      </div>

      <div class="flex flex-row gap-6 w-full">
        <div class="flex flex-col gap-6 w-full" id="content-area">
          <h2 class="text-2xl font-medium">Description</h2>
          <span class="text-neutral-300">{{ $event->deskripsi_event }}</span>
        </div>

        <div class="w-[35%]">
          <div class="bg-[#1f2122] rounded-xl flex flex-col gap-4 p-6">
            <h3 class="w-full line-clamp-2 font-semibold tracking-wide">{{ $event->nama_event }}</h3>
            <div class="flex flex-col gap-3 px-3 text-neutral-400">
              <div class="flex flex-row gap-2 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor">
                  <path d="M2 11H22V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V11ZM17 3H21C21.5523 3 22 3.44772 22 4V9H2V4C2 3.44772 2.44772 3 3 3H7V1H9V3H15V1H17V3Z"></path>
                </svg>
                <span>{{ \Carbon\Carbon::parse($event->tanggal_event)->translatedFormat('l, d F Y') }}</span>
              </div>
              <div class="flex flex-row gap-2 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor">
                  <path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM13 12V7H11V14H17V12H13Z"></path>
                </svg>
                <span>{{ \Carbon\Carbon::parse($event->open_gate)->format('H:i') }} WIB</span>
              </div>
              <div class="flex flex-row gap-2 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor">
                  <path d="M18.364 17.364L12 23.7279L5.63604 17.364C2.12132 13.8492 2.12132 8.15076 5.63604 4.63604C9.15076 1.12132 14.8492 1.12132 18.364 4.63604C21.8787 8.15076 21.8787 13.8492 18.364 17.364ZM12 13C13.1046 13 14 12.1046 14 11C14 9.89543 13.1046 9 12 9C10.8954 9 10 9.89543 10 11C10 12.1046 10.8954 13 12 13Z"></path>
                </svg>
                <span>{{ $event->kota_event }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>
  <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>

  <script>
    const deskripsiBtn = document.getElementById('deskripsi-btn');
    const lineupBtn = document.getElementById('lineup-btn');
    const lokasiBtn = document.getElementById('lokasi-btn');
    const contentArea = document.getElementById('content-area');

    function updateContentArea(content) {
      contentArea.innerHTML = content;
    }

    deskripsiBtn.addEventListener('click', () => {
      updateContentArea(`<h2 class="text-2xl font-medium">Deskripsi</h2><span class="text-neutral-300">{{ $event->deskripsi_event }}</span>`);
    });

    lineupBtn.addEventListener('click', () => {
      updateContentArea(`<h2 class="text-2xl font-medium">Line Up</h2><span class="text-neutral-300">{{ $event->lineup ?? 'Informasi line-up akan diumumkan lebih lanjut.' }}</span>`);
    });

    lokasiBtn.addEventListener('click', () => {
      updateContentArea(`
        <h2 class="text-2xl font-medium">Lokasi</h2>
        <div id="map" style="height: 400px; border-radius: 10px; width: 100%; z-index: 1;"></div>
        <button id="tampilRuteBtn" class="bg-[#ec6090] px-6 py-2 capitalize rounded-full hover:bg-[#ff84af] duration-200 mt-4 cursor-pointer">Tampilkan Rute</button>
        <button id="hapusRuteBtn" class="bg-[#ec6090] px-6 py-2 capitalize rounded-full hover:bg-[#ff84af] duration-200 mt-4 cursor-pointer">Hapus Rute</button>
      `);
      setTimeout(initMap, 100);
    });

    let routeControl = null;

    function initMap() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          const userLat = position.coords.latitude;
          const userLng = position.coords.longitude;

          var map = L.map('map').setView([userLat, userLng], 13);

          L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

          L.marker([userLat, userLng]).addTo(map)
            .bindPopup("Lokasi Anda")
            .openPopup();

          const eventLat = {{ $event->latitude }};
          const eventLng = {{ $event->longitude }};

          L.marker([eventLat, eventLng]).addTo(map)
            .bindPopup("<b>{{ $event->nama_event }}</b><br>{{ $event->alamat }}")
            .openPopup();

          // Menambahkan event listener untuk tombol Tampilkan Rute
          document.getElementById('tampilRuteBtn').addEventListener('click', function() {
            if (routeControl) {
              map.removeControl(routeControl); // Hapus rute jika sudah ada
            }
            routeControl = L.Routing.control({
              waypoints: [
                L.latLng(userLat, userLng),
                L.latLng(eventLat, eventLng)
              ],
              routeWhileDragging: true,
            }).addTo(map);
          });

          // Menambahkan event listener untuk tombol Hapus Rute
          document.getElementById('hapusRuteBtn').addEventListener('click', function() {
            if (routeControl) {
              map.removeControl(routeControl); // Menghapus rute
            }
          });
        }, function(error) {
          alert("Gagal mendapatkan lokasi Anda: " + error.message);
        });
      } else {
        alert("Geolocation tidak didukung oleh browser ini.");
      }
    }
  </script>

  <x-footer></x-footer>
</x-guestlayout>


 
