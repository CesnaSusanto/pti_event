<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shows</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="bg-blue-600 py-4 text-center">
        <h3 class="text-white text-lg font-semibold">Semua Data Show Ada di Sini</h3>
    </div>
    <div class="container mx-auto p-4">
        <div class="flex justify-end space-x-2 mb-4">
            <a href="{{ route('shows.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Tambah Show</a>
            <a href="{{ route('admin.dashboard') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Go Back</a>
        </div>
        
        @if (Session::has('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ Session::get('success') }}
        </div>
        @endif

        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="bg-blue-600 p-4 text-white font-bold text-lg">Shows</div>
            <div class="p-4 overflow-x-auto">
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border p-2">ID Event</th>
                            <th class="border p-2">Foto Event</th>
                            <th class="border p-2">Nama Event</th>
                            <th class="border p-2">Hari & Tanggal Event</th>
                            <th class="border p-2">Open Gate</th>
                            <th class="border p-2">Kota Event</th>
                            <th class="border p-2">Deskripsi</th>
                            <th class="border p-2">Nama Artis</th>
                            <th class="border p-2">Longitude</th>
                            <th class="border p-2">Latitude</th>
                            <th class="border p-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($shows as $show)
                        <tr class="hover:bg-gray-100">
                            <td class="border p-2 text-center">{{ $show->id_event }}</td>
                            <td class="border p-2 text-center">
                                <img src="{{ asset('uploads/events/'.$show->foto_event) }}" class="w-12 h-12 object-cover rounded">
                            </td>
                            <td class="border p-2">{{ $show->nama_event }}</td>
                            <td class="border p-2">{{ $show->hari_tanggal_event }}</td>
                            <td class="border p-2">{{ $show->open_gate }}</td>
                            <td class="border p-2">{{ $show->kota_event }}</td>
                            <td class="border p-2 w-40 max-w-xs truncate whitespace-nowrap overflow-hidden">
                                {{ $show->deskripsi_event }}
                            </td>
                            <td class="border p-2">{{ $show->nama_artis }}</td>
                            <td class="border p-2">{{ $show->longitude }}</td>
                            <td class="border p-2">{{ $show->latitude }}</td>
                            <td class="border p-2">
                                <div class="flex justify-center items-center gap-2">
                                    <a href="{{ route('shows.edit', [$show->id_event, $show->id_artists]) }}"
                                       class="bg-blue-500 text-white text-sm px-3 py-1 rounded hover:bg-blue-700 transition duration-200 w-fit">
                                        Edit
                                    </a>
                                    <button onclick="deleteShow({{ $show->id_event }});" 
                                            class="bg-red-500 text-white text-sm px-3 py-1 rounded hover:bg-red-700 transition duration-200 w-fit">
                                        Delete
                                    </button>
                                </div>
                                <form id="delete-show-form-{{ $show->id_event }}" action="{{ route('shows.destroy', $show->id_event) }}" method="post" class="hidden">
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {!! $shows->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function deleteShow(id_event) {
            if (confirm("Are you sure you want to delete this show?")) {
                document.getElementById("delete-show-form-" + id_event).submit();
            }
        }
    </script>
</body>
</html>
