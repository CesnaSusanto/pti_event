<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Eventz</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    </head>

<body class="bg-gray-100">
    <div class="bg-blue-600 py-4">
        <h3 class="text-white text-center text-xl font-semibold">Silakan edit data show</h3>
    </div>

    <div class="container mx-auto px-4">
        <div class="flex justify-end mt-4">
            <a href="{{ route('shows.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md">Back</a>
        </div>

        <div class="flex justify-center">
            <div class="w-full max-w-2xl bg-white rounded-lg shadow-lg p-6 mt-6">
                <h3 class="text-xl font-semibold text-white bg-blue-600 p-4 rounded-t-lg">Edit Show</h3>

                <form action="{{ route('shows.update', $event->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="mt-4">
                        <label class="block font-semibold">Event</label>
                        <input type="text" class="w-full p-2 border rounded bg-gray-200" value="{{ $event->nama_event }} ({{ date('d-m-Y', strtotime($event->tanggal_event)) }})" disabled>
                        <input type="hidden" name="id_event" value="{{ $event->id }}">
                    </div>

                    <div class="mt-4">
                        <label class="block font-semibold">Pilih Artis</label>
                        <select name="id_artist[]" id="id_artist" class="w-full border rounded text-gray-900 bg-white p-2 focus:outline-none focus:border-blue-500"  multiple required>
                            @foreach($artists as $artist)
                                <option value="{{ $artist->id }}" {{ in_array($artist->id, $selectedArtists) ? 'selected' : '' }}>
                                    {{ $artist->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md w-full">Update Show</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#id_artist').select2({
                placeholder: "Pilih artis",
                allowClear: true,
                width: '100%'  // Pastikan dropdown menyesuaikan lebar input
            });
        });
    </script>
    
</body>
</html>
