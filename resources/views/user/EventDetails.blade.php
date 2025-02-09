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
      bg-[#27292a] w-[90%] max-w-[1400px] rounded-3xl p-14 flex flex-col gap-10 text-white.text-white {
          --tw-text-opacity: 1;
          color: #18181b;
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
        font-size: 1.1rem; /* Mengubah ukuran font deskripsi */
        max-width: 100%; /* Pastikan lebar tidak terbatas */
      }
    </style>
  </head>

  <x-navbar></x-navbar>
  <div class="bg-[#27292a] w-[90%] max-w-[1400px] rounded-3xl p-14 flex flex-col gap-10 text-white">
    <div class="h-[500px] rounded-2xl overflow-hidden bg-center" 
         style="background-image: url({{ asset('uploads/events/' . $event->foto_event) }});">
      <div class="w-full h-full flex flex-row justify-center backdrop-blur-md bg-black/80">
        <img src="{{ asset('uploads/events/' . $event->foto_event) }}" alt="{{ $event->nama_event }}" class="object-cover">
      </div>
    </div>

    <div class="flex flex-col gap-8 px-4 w-full">
      <h1 class="text-3xl uppercase font-semibold tracking-wide">{{ $event->nama_event }}</h1>
      <div class="flex flex-row gap-5">
        <button id="deskripsi-btn" class="bg-[#ec6090] px-6 py-2 capitalize rounded-full hover:bg-[#ff84af] duration-200 cursor-pointer">Description</button>
        <button id="lineup-btn" class="bg-[#ec6090] px-6 py-2 capitalize rounded-full hover:bg-[#ff84af] duration-200 cursor-pointer">Line Up</button>
        <button id="lokasi-btn" class="bg-[#ec6090] px-6 py-2 capitalize rounded-full hover:bg-[#ff84af] duration-200 cursor-pointer">Location</button>
      </div>

      <div class="flex flex-row gap-6 w-full items-top">
        <div class="flex flex-col gap-6 w-full" id="content-area">
          <h2 class="text-2xl font-medium">Description</h2>
          <span class="text-neutral-300">{{ $event->deskripsi_event }}</span>
        </div>

        <div class="w-[35%]">
          <div class="bg-[#1f2122] rounded-xl flex flex-col gap-4 p-6">
            <h3 class="w-full line-clamp-2 font-semibold tracking-wide">{{ $event->nama_event }}</h3>
            <div class="flex flex-col gap-3 px-3 text-neutral-400">
              <!-- Tanggal Acara -->
              <div class="flex flex-row gap-2 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor">
                  <path d="M2 11H22V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V11ZM17 3H21C21.5523 3 22 3.44772 22 4V9H2V4C2 3.44772 2.44772 3 3 3H7V1H9V3H15V1H17V3Z"></path>
                </svg>
                <span>{{ \Carbon\Carbon::parse($event->tanggal_event)->translatedFormat('l, d F Y') }}</span>
              </div>
        
              <!-- Waktu Open Gate -->
              <div class="flex flex-row gap-2 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor">
                  <path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM13 12V7H11V14H17V12H13Z"></path>
                </svg>
                <span>{{ \Carbon\Carbon::parse($event->open_gate)->format('H:i') }} WIB</span>
              </div>
        
              <!-- Lokasi -->
              <div class="flex flex-row gap-2 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor">
                  <path d="M18.364 17.364L12 23.7279L5.63604 17.364C2.12132 13.8492 2.12132 8.15076 5.63604 4.63604C9.15076 1.12132 14.8492 1.12132 18.364 4.63604C21.8787 8.15076 21.8787 13.8492 18.364 17.364ZM12 13C13.1046 13 14 12.1046 14 11C14 9.89543 13.1046 9 12 9C10.8954 9 10 9.89543 10 11C10 12.1046 10.8954 13 12 13Z"></path>
                </svg>
                <span>{{ $event->kota_event }}</span>
              </div>
        
              <!-- Countdown Timer -->
              <div class="flex flex-row gap-2 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor">
                  <path d="M12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2ZM12 20C7.58172 20 4 16.4183 4 12C4 7.58172 7.58172 4 12 4C16.4183 4 20 7.58172 20 12C20 16.4183 16.4183 20 12 20ZM11 6V13H17V11H13V6H11Z"></path>
                </svg>
                <span id="countdown"></span>
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
    document.addEventListener("DOMContentLoaded", function () {
        function startCountdown(eventTime) {
            const countdownElement = document.getElementById("countdown");

            function updateCountdown() {
                const now = new Date().getTime();
                const targetTime = new Date(eventTime).getTime();
                const timeDifference = targetTime - now;

                if (timeDifference <= 0) {
                    countdownElement.innerHTML = "Event Has Ended!";
                    return;
                }

                const days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
                const hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

                countdownElement.innerHTML = `${days}d ${hours}h ${minutes}m ${seconds}s`;
            }

            updateCountdown();
            setInterval(updateCountdown, 1000);
        }

        // Ambil waktu event dari Laravel dan ubah ke format JavaScript Date
        const eventDate = "{{ \Carbon\Carbon::parse($event->open_gate)->format('Y-m-d H:i:s') }}";
        startCountdown(eventDate);
    });
</script>



  <script>
    const deskripsiBtn = document.getElementById('deskripsi-btn');
    const lineupBtn = document.getElementById('lineup-btn');
    const lokasiBtn = document.getElementById('lokasi-btn');
    const contentArea = document.getElementById('content-area');

    function updateContentArea(content) {
      contentArea.innerHTML = content;
    }

    deskripsiBtn.addEventListener('click', () => {
      updateContentArea(`<h2 class="text-2xl font-medium">Description</h2><span class="text-neutral-300">{{ $event->deskripsi_event }}</span>`);
    });

    lineupBtn.addEventListener('click', () => {
        let lineupHTML = `<h2 class="text-2xl font-medium mb-4">Line Up</h2>
                          <div class="flex flex-col gap-3">`;

        @foreach($event->shows as $show)
            lineupHTML += `
                <div class="bg-[#1f2122] p-3 rounded-xl flex items-center gap-4 shadow-md max-w-md w-full">
                    <!-- Foto Artis -->
                    <img src="{{ asset('uploads/artists/' . $show->artist->foto_artist) }}" 
                         alt="{{ $show->artist->nama_artist }}" 
                         class="h-16 w-16 rounded-full object-cover">

                    <!-- Nama Artis -->
                    <span class="text-md font-semibold text-white">
                        {{ $show->artist->nama_artist }}
                    </span>
                </div>`;
        @endforeach

        lineupHTML += `</div>`;

        updateContentArea(lineupHTML);
    });

    

    lokasiBtn.addEventListener('click', () => {
      updateContentArea(`
        <h2 class="text-2xl font-medium">Location</h2>
        <div id="map" style="height: 400px; border-radius: 10px; width: 100%; z-index: 1;"></div>
        <div class="flex flex-row gap-4">
        <button id="tampilRuteBtn" class="bg-[#ec6090] px-6 py-2 capitalize rounded-full hover:bg-[#ff84af] duration-200 mt-4 cursor-pointer">Show Route</button>
        <button id="hapusRuteBtn" class="bg-[#ec6090] px-6 py-2 capitalize rounded-full hover:bg-[#ff84af] duration-200 mt-4 cursor-pointer">Hide Route</button>
        </div>
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




 

