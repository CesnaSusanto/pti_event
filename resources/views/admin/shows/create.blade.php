<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eventz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <style>
        body { background-color: #1f2122 !important; }
        nav, .navbar, .bg-header, .card-header { background-color: #27292a !important; }
        .card { background-color: #27292a !important; border: none !important; }
        .btn-custom { background-color: #27292a !important; border-color: #323435 !important; color: white !important; }
        .btn-custom:hover { background-color: #323435 !important; }
        .btn-pink { background: #ec6090 !important; border: none !important; color: white !important; padding: 8px 20px !important; font-weight: 500 !important; transition: all 0.3s ease !important; }
        .btn-pink:hover { background: #d4517c !important; transform: translateY(-1px); box-shadow: 0 4px 15px rgba(236, 96, 144, 0.3); }
        .form-control, .form-select { background-color: #27292a !important; border: 1px solid #323435 !important; color: white !important; padding: 0.7rem 1rem !important; font-size: 0.95rem !important; border-radius: 8px !important; }
        .form-control:focus, .form-select:focus { border-color: #ec6090 !important; box-shadow: 0 0 0 0.2rem rgba(236, 96, 144, 0.25) !important; }
        .form-label { color: white !important; font-weight: 500 !important; margin-bottom: 0.5rem !important; font-size: 0.95rem !important; }
    </style>
</head>

<body>
    <div class="bg-header py-3">
        <h3 class="text-white text-center">Silakan tambahkan data show</h3>
    </div>
    
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('shows.index') }}" class="btn btn-custom">Back</a>
            </div>
        </div>
        
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-lg my-4">
                    <div class="card-header">
                        <h3 class="text-white">Create Show</h3>
                    </div>
                    
                    <form action="{{ route('shows.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="event" class="form-label">Pilih Event</label>
                                <select name="id_event" id="event" class="form-select" required>
                                    <option value="">-- Pilih Event --</option>
                                    @foreach($events as $event)
                                        <option value="{{ $event->id }}">{{ $event->nama_event }} ({{ date('d-m-Y', strtotime($event->tanggal_event)) }})</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="artists" class="form-label">Pilih Artis</label>
                                <select name="id_artist[]" id="artists" class="form-select select2" multiple="multiple" required>
                                    @foreach($artists as $artist)
                                        <option value="{{ $artist->id }}">{{ $artist->nama_artist }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="d-grid">
                                <button class="btn btn-pink">Submit</button>
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
            $('.select2').select2({
                placeholder: "Pilih artis",
                allowClear: true
            });
        });
    </script>
</body>
</html>