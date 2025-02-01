<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eventz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
</head>

<body>
    <div class="bg-primary py-3">
        <h3 class="text-white text-center">Silakan tambahkan data show</h3>
    </div>
    
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('shows.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
        
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card border-0 shadow-lg my-4">
                    <div class="card-header bg-primary">
                        <h3 class="text-white">Create Show</h3>
                    </div>
                    
                    <form action="{{ route('shows.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="event" class="form-label h5">Pilih Event</label>
                                <select name="id_event" id="event" class="form-control form-control-lg" required>
                                    <option value="">-- Pilih Event --</option>
                                    @foreach($events as $event)
                                        <option value="{{ $event->id }}">{{ $event->nama_event }} ({{ date('d-m-Y', strtotime($event->tanggal_event)) }})</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="artists" class="form-label h5">Pilih Artis</label>
                                <select name="id_artist[]" id="artists" class="form-control form-control-lg select2" multiple="multiple" required>
                                    @foreach($artists as $artist)
                                        <option value="{{ $artist->id }}">{{ $artist->nama_artist }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="d-grid">
                                <button class="btn btn-lg btn-primary">Submit</button>
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
