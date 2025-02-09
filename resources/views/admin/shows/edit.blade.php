<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eventz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #1f2122 !important;
        }
        .bg-header {
            background-color: #27292a !important;
        }
        .card {
            background-color: #27292a !important;
            border: none !important;
        }
        .btn-custom {
            background-color: #27292a !important;
            border-color: #323435 !important;
            color: white !important;
        }
        .btn-pink {
            background: #ec6090 !important;
            border: none !important;
            color: white !important;
            font-weight: 500 !important;
            transition: all 0.3s ease !important;
        }
        .form-control, .form-select {
            background-color: #27292a !important;
            border: 1px solid #323435 !important;
            color: white !important;
            padding: 0.7rem 1rem !important;
        }
        .form-label {
            color: white !important;
            font-weight: 500 !important;
        }
    </style>
</head>
<body>
    <div class="bg-header py-3">
        <h3 class="text-white text-center">Edit Show</h3>
    </div>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('shows.index') }}" class="btn btn-custom">Back to Shows</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg my-4">
                    <div class="card-header">
                        <h3 class="text-white mb-0">Edit Show Details</h3>
                    </div>
                    <form action="{{ route('shows.update', $event->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Event</label>
                                <input type="text" class="form-control" value="{{ $event->nama_event }} ({{ date('d-m-Y', strtotime($event->tanggal_event)) }})" disabled>
                                <input type="hidden" name="id_event" value="{{ $event->id }}">
                            </div>
                            <div class="mb-3">
                                <label for="id_artist" class="form-label">Select Artists</label>
                                <select name="id_artist[]" id="id_artist" class="form-select" multiple="multiple" required>
                                    @foreach($artists as $artist)
                                        <option value="{{ $artist->id }}" {{ in_array($artist->id, $selectedArtists) ? 'selected' : '' }}>{{ $artist->nama_artist }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-pink">Update Show</button>
                            </div>
                        </div>
                    </form>
                </div>
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
                width: '100%',
            });
        });
    </script>
</body>
</html>