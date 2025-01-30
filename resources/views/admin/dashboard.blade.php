<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in! as admin") }}
                    <div class="mt-4">
                        <a href="{{ route('events.index') }}" class="btn btn-primary">
                            Go to Event List
                        </a>
                        <br><br><br>
                        <a href="{{ route('artists.index') }}" class="btn btn-primary">
                            Go to Artis List
                        </a>
                    </div>
                    <!-- Tabel daftar shows -->
                    <div class="mt-4">
                        <h3 class="font-semibold text-lg text-gray-800 leading-tight">Daftar Shows</h3>
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="py-2">ID Show</th>
                                    <th class="py-2">Foto Event</th>
                                    <th class="py-2">Nama Event</th>
                                    <th class="py-2">Hari Tanggal Event</th>
                                    <th class="py-2">Open Gate</th>
                                    <th class="py-2">Kota Event</th>
                                    <th class="py-2">Deskripsi Event</th>
                                    <th class="py-2">Nama Artis</th>
                                    <th class="py-2">Longitude</th>
                                    <th class="py-2">Latitude</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($shows as $show)
                                <tr>
                                    <td class="py-2">{{ $show->id_show }}</td>
                                    <td class="py-2"><img src="{{ $show->foto_event }}" alt="Foto Event" width="100"></td>
                                    <td class="py-2">{{ $show->nama_event }}</td>
                                    <td class="py-2">{{ $show->hari_tanggal_event }}</td>
                                    <td class="py-2">{{ $show->open_gate }}</td>
                                    <td class="py-2">{{ $show->kota_event }}</td>
                                    <td class="py-2">{{ $show->deskripsi_event }}</td>
                                    <td class="py-2">{{ $show->nama_artis }}</td>
                                    <td class="py-2">{{ $show->longitude }}</td>
                                    <td class="py-2">{{ $show->latitude }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Akhir tabel daftar shows -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
