<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Artists</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="bg-blue-600 py-4">
        <h3 class="text-white text-center text-xl font-semibold">Semua data Artis ada disini</h3>
    </div>

    <div class="container mx-auto px-4">
        <div class="flex justify-end items-center gap-4 mt-6">
            <form method="GET" action="/artists/search" class="flex gap-2">
                <input 
                    type="text" 
                    name="search" 
                    placeholder="Search..." 
                    value="{{ request()->input('search') ? request()->input('search') : '' }}"
                    class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
                    Search
                </button>
            </form>
            <a href="{{ route('artists.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                Create
            </a>
            <a href="{{ route('admin.dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                Go Back
            </a>
        </div>

        @if (Session::has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-6" role="alert">
            <span class="block sm:inline">{{ Session::get('success') }}</span>
        </div>
        @endif

        <div class="bg-white rounded-lg shadow-lg mt-6 overflow-hidden">
            <div class="bg-blue-600 px-6 py-4">
                <h3 class="text-white text-xl font-semibold">Artists</h3>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Photo</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Artist</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipe Artist</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deskripsi</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created at</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @if ($artists->isNotEmpty())
                        @foreach ($artists as $artist)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $artist->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if ($artist->foto_artist != "")
                                <img class="h-12 w-12 rounded-full object-cover" src="{{ asset('uploads/artists/'.$artist->foto_artist) }}" alt="">
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $artist->nama_artist }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $artist->tipe_artist }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900 max-w-md">{{ $artist->deskripsi }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ \Carbon\Carbon::parse($artist->created_at)->format('d M, Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                <a href="{{ route('artists.edit',$artist->id) }}" 
                                   class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition">
                                    Edit
                                </a>
                                <button onclick="deleteArtist({{ $artist->id  }});" 
                                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition">
                                    Delete
                                </button>
                                <form id="delete-artist-form-{{ $artist->id }}" 
                                      action="{{ route('artists.destroy',$artist->id) }}" 
                                      method="post" class="hidden">
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-4">
            {!! $artists->withQueryString()->links() !!}
        </div>
    </div>

    <script>
        function deleteArtist(id) {
            if (confirm("Are you sure you want to delete this artist?")) {
                document.getElementById("delete-artist-form-" + id).submit();
            }
        }
    </script>
</body>
</html>