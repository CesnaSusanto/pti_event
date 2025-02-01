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
        <h3 class="text-white text-center">Silakan edit data show</h3>
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
                        <h3 class="text-white">Edit Show</h3>
                    </div>
                    
                    <form action="{{ route('shows.update', $event->id) }}" method="post">
                        @csrf
                        @method('PUT')
                    
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="event" class="form-label h5">Event</label>
                                <input type="text" class="form-control" value="{{ $event->nama_event }} ({{ date('d-m-Y', strtotime($event->tanggal_event)) }})" disabled>
                                <input type="hidden" name="id_event" value="{{ $event->id }}">
                            </div>
                    
                            <div class="mb-3">
                                <label for="id_artist" class="form-label h5">Pilih Artis</label>
                                <select name="id_artist[]" id="id_artist" class="form-control form-control-lg" multiple required>
                                    @foreach($artists as $artist)
                                        <option value="{{ $artist->id }}" 
                                            {{ in_array($artist->id, $selectedArtists) ? 'selected' : '' }}>
                                            {{ $artist->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                    
                            <button type="submit" class="btn btn-primary">Update Show</button>
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