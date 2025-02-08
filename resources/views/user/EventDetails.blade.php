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
      updateContentArea(`<h2 class="text-2xl font-medium">Deskripsi</h2><span class="text-neutral-300">{{ $event->deskripsi_event }}</span>`);
    });

    lineupBtn.addEventListener('click', () => {
      updateContentArea(`<h2 class="text-2xl font-medium">Line Up</h2>
      <div class="bg-[#1f2122] p-4 rounded-xl inline-flex flex-row  gap-4 items-center w-2/4">
            <img src="{{ asset('uploads/events/' . $event->foto_event) }}" alt="" srcset="" class="h-20 w-20 rounded-lg bg-pink-400 object-contain">
            <div class="w-full flex items-center justify-center">
              <span class="uppercase text-2xl w-full  line-clamp-2">
                bokuga mitakatta aozora
            </span>
            </div>
          </div>`);
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




 {{-- <x-guestlayout>
//     <head>
//       <!-- Leaflet CSS -->
//       <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" 
//             integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" 
//             crossorigin="" />
//       <!-- Leaflet Routing Machine CSS -->
//       <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />
//       <style>
//         .leaflet-control-container .leaflet-routing-container-hide {
//           display: none;
//         }
//       </style>
//     </head>
//     <x-navbar></x-navbar>
//       <div class="bg-[#27292a] w-[90%] max-w-[1400px] rounded-3xl p-14 flex flex-col gap-10 text-white">
//         <div class="h-[500px] rounded-2xl overflow-hidden bg-center" style="background-image: url(assets/images/banner.jpeg);">
//           <div class="w-full h-full flex flex-row justify-center backdrop-blur-md bg-black/80">
//             <img src="assets/images/banner.jpeg" alt="" class="object-cover">
//           </div>
//         </div>
//         <div class="flex flex-col gap-8 px-4 w-full">
//           <h1 class="text-3xl uppercase font-semibold tracking-wide">JKT48 13th Anniversary Concert & Sousenkyo Announcement</h1>
//           <div class="flex flex-row gap-5">
//               <button id="deskripsi-btn" class="bg-[#ec6090] px-6 py-2 capitalize rounded-full hover:bg-[#ff84af] duration-200 cursor-pointer">deskripsi</button>
//               <button id="lineup-btn" class="bg-[#ec6090] px-6 py-2 capitalize rounded-full hover:bg-[#ff84af] duration-200 cursor-pointer">line up</button>
//               <button id="lokasi-btn" class="bg-[#ec6090] px-6 py-2 capitalize rounded-full hover:bg-[#ff84af] duration-200 cursor-pointer">lokasi</button>
//             </div>
//           <div class="flex flex-row gap-6 w-full">
//             <div class="flex flex-col gap-6 w-full" id="content-area">
//               <h2 class="text-2xl font-medium">Deskripsi</h2>
//               <span class="text-neutral-300">
//                 Terima kasih atas dukungannya untuk JKT48. <br> &nbsp; <br>
//                 Karena banyaknya cinta dan dukungan yang kalian berikan, JKT48 dapat terus bertahan dan berkembang hingga memasuki tahun yang ke-13 ini. Oleh karena itu, JKT48 ingin merayakannya bersama kalian semua dalam JKT48 13th Anniversary Concert yang bertajuk "WONDERLAND". Akan ada dua pertunjukan yang diadakan pada event kali ini, yaitu 13th Anniversary Concert dan juga Sousenkyo Announcement (Pengumuman Hasil Akhir Pemilihan Member Single ke-26 JKT48).<br> &nbsp; <br>
//                 Penjualan Tiket presale khusus untuk anggota OFC akan dibuka pada tanggal 16 Oktober 2024 pukul 14.00 WIB, dan penjualan Tiket general akan dibuka pada tanggal 23 Oktober 2024 pukul 14.00 WIB.
//               </span>
//             </div>
//             <div class="w-[35%]">
//               <div class="bg-[#1f2122] rounded-xl flex flex-col gap-4 p-6">
//                 <h3 class="w-full line-clamp-2 font-semibold tracking-wide">JKT48 13th Anniversary Concert & Sousenkyo Announcement</h3>
//                 <div class="flex flex-col gap-3 px-3 text-neutral-400">
//                   <div class="flex flex-row gap-2 items-center">
//                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M2 11H22V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V11ZM17 3H21C21.5523 3 22 3.44772 22 4V9H2V4C2 3.44772 2.44772 3 3 3H7V1H9V3H15V1H17V3Z"></path></svg>
//                     <span>senin, 25 januari 2025</span>
//                   </div>
//                   <div class="flex flex-row gap-2 items-center">
//                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM13 12V7H11V14H17V12H13Z"></path></svg>
//                     <span>15:00 WIB</span>
//                   </div>
//                   <div class="flex flex-row gap-2 items-center">
//                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M18.364 17.364L12 23.7279L5.63604 17.364C2.12132 13.8492 2.12132 8.15076 5.63604 4.63604C9.15076 1.12132 14.8492 1.12132 18.364 4.63604C21.8787 8.15076 21.8787 13.8492 18.364 17.364ZM12 13C13.1046 13 14 12.1046 14 11C14 9.89543 13.1046 9 12 9C10.8954 9 10 9.89543 10 11C10 12.1046 10.8954 13 12 13Z"></path></svg>
//                     <span>Jakarta</span>
//                   </div>
//                 </div>
//               </div>
//             </div>
//           </div>
//         </div>
//       </div>
//       <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" 
//       crossorigin=""></script>
//       <!-- Leaflet Routing Machine JS -->
//       <script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>
//   <script>
//       const deskripsiBtn = document.getElementById('deskripsi-btn');
//       const lineupBtn = document.getElementById('lineup-btn');
//       const lokasiBtn = document.getElementById('lokasi-btn');
//       const contentArea = document.getElementById('content-area');
  
//       function updateContentArea(content) {
//         contentArea.innerHTML = content;
//       }
  
//       function initMap() {
//         if (navigator.geolocation) {
//           // Store markers and routing control globally so we can update them
//           let userMarker, routingControl;
//           const eventLocation = [-6.869392, 107.599105]; // Lokasi SECAPA Theater
  
//           const map = L.map('map', {
//             zoom: 11
//           });
  
//           L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
//             attribution: '© OpenStreetMap contributors'
//           }).addTo(map);
  
//           // Event location marker
//           const eventMarker = L.marker(eventLocation, {
//             title: 'SECAPA Theater'
//           }).addTo(map).bindPopup('<b>SECAPA Theater</b><br>Lokasi Concert');
  
//           // Function to update user position
//           function updatePosition(position) {
//             const userLat = position.coords.latitude;
//             const userLng = position.coords.longitude;
  
//             // Update or create user marker
//             if (userMarker) {
//               userMarker.setLatLng([userLat, userLng]);
//             } else {
//               userMarker = L.marker([userLat, userLng], {
//                 title: 'Lokasi Anda'
//               }).addTo(map).bindPopup('Lokasi Anda');
//             }
  
//             // Update or create routing
//             if (routingControl) {
//               routingControl.setWaypoints([
//                 L.latLng(userLat, userLng),
//                 L.latLng(eventLocation[0], eventLocation[1])
//               ]);
//             } else {
//               routingControl = L.Routing.control({
//                 waypoints: [
//                   L.latLng(userLat, userLng),
//                   L.latLng(eventLocation[0], eventLocation[1])
//                 ],
//                 routeWhileDragging: true,
//                 show: false,
//                 lineOptions: {
//                   styles: [
//                     {color: '#ec6090', opacity: 0.8, weight: 5}
//                   ]
//                 },
//                 createMarker: function() { return null; }
//               }).addTo(map);
//             }
  
//             // Update map center and bounds
//             const bounds = L.latLngBounds([
//               [userLat, userLng],
//               eventLocation
//             ]).pad(0.1);
//             map.fitBounds(bounds);
//           }
  
//           // Watch position with high accuracy
//           const watchId = navigator.geolocation.watchPosition(
//             updatePosition,
//             function(error) {
//               console.error("Error getting location:", error);
//               showDefaultMap();
//             },
//             {
//               enableHighAccuracy: true,
//               maximumAge: 30000, // 30 seconds
//               timeout: 27000 // 27 seconds
//             }
//           );
  
//           // Cleanup function when map is destroyed
//           return function cleanup() {
//             if (watchId) {
//               navigator.geolocation.clearWatch(watchId);
//             }
//           };
//         } else {
//           console.log("Geolocation not supported");
//           showDefaultMap();
//         }
//       }
  
//       // Event Listeners
//       lokasiBtn.addEventListener('click', () => {
//         updateContentArea(`
//           <h2 class="text-2xl font-medium">Lokasi</h2>
//           <div id="map" style="height: 400px; border-radius: 10px; width: 100%; z-index: 1;"></div>
//         `);
//         setTimeout(initMap, 100);
//       });
  
//       deskripsiBtn.addEventListener('click', () => {
//         updateContentArea(`
//           <h2 class="text-2xl font-medium">Deskripsi</h2>
//           <span class="text-neutral-300">
//             Terima kasih atas dukungannya untuk JKT48. <br> &nbsp; <br>
//             Karena banyaknya cinta dan dukungan yang kalian berikan, JKT48 dapat terus bertahan dan berkembang hingga memasuki tahun yang ke-13 ini. Oleh karena itu, JKT48 ingin merayakannya bersama kalian semua dalam JKT48 13th Anniversary Concert yang bertajuk "WONDERLAND". Akan ada dua pertunjukan yang diadakan pada event kali ini, yaitu 13th Anniversary Concert dan juga Sousenkyo Announcement (Pengumuman Hasil Akhir Pemilihan Member Single ke-26 JKT48).<br> &nbsp; <br>
//             Penjualan Tiket presale khusus untuk anggota OFC akan dibuka pada tanggal 16 Oktober 2024 pukul 14.00 WIB, dan penjualan Tiket general akan dibuka pada tanggal 23 Oktober 2024 pukul 14.00 WIB.
//           </span>
//         `);
//       });
  
//       lineupBtn.addEventListener('click', () => {
//         updateContentArea(`
//           <h2 class="text-2xl font-medium">Line Up</h2>
//           <span class="text-neutral-300">
//             Informasi line-up akan diumumkan lebih lanjut.
//           </span>
//         `);
//       });
//     </script>
  
//   <x-footer></x-footer>
//   </x-guestlayout> --}}

