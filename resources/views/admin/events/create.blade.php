<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eventz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="bg-primary py-3">
        <h3 class="text-white text-center">silakan tambahkan data event</h3>
    </div>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('events.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card borde-0 shadow-lg my-4">
                    <div class="card-header bg-primary">
                        <h3 class="text-white">Create Event</h3>
                    </div>
                    <form enctype="multipart/form-data" action="{{ route('events.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="" class="form-label h5">Nama Event</label>
                                <input value="{{ old('nama_event') }}" type="text" class="@error('nama_event') is-invalid @enderror form-control-lg form-control" placeholder="Nama Event" name="nama_event">
                                @error('nama_event')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label h5">Alamat</label>
                                <input value="{{ old('alamat') }}" type="text" class="@error('alamat') is-invalid @enderror form-control-lg form-control" placeholder="Alamat" name="alamat">
                                @error('alamat')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label h5">Kota Event</label>
                                <input value="{{ old('kota_event') }}" type="text" class="@error('kota_event') is-invalid @enderror form-control form-control-lg" placeholder="Kota Event" name="kota_event">
                                @error('kota_event')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label h5">Tanggal Event</label>
                                <input value="{{ old('tanggal_event') }}" type="date" class="@error('tanggal_event') is-invalid @enderror form-control form-control-lg" placeholder="Tanggal Event" name="tanggal_event">
                                @error('tanggal_event')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="open_gate" class="form-label h5">Open Gate</label>
                                <input value="{{ old('open_gate') }}" type="datetime-local" class="@error('open_gate') is-invalid @enderror form-control form-control-lg" placeholder="Open Gate" name="open_gate">
                                @error('open_gate')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>                            
                            <div class="mb-3">
                                <label for="" class="form-label h5">Deskripsi Event</label>
                                <textarea placeholder="Deskripsi Event" class="form-control" name="deskripsi_event" cols="30" rows="5">{{ old('deskripsi_event') }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label h5">No HP</label>
                                <input value="{{ old('no_hp') }}" type="text" class="@error('no_hp') is-invalid @enderror form-control form-control-lg" placeholder="No HP" name="no_hp">
                                @error('no_hp')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label h5">Event Status</label>
                                <select class="form-control form-control-lg" name="event_status">
                                    <option value="1" {{ old('event_status') == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('event_status') == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label h5">Foto Event</label>
                                <input type="file" class="form-control form-control-lg" name="foto_event">
                            </div>
                            <div class="mb-3">
                                <label for="longitude" class="form-label h5">Longitude</label>
                                <input value="{{ old('longitude') }}" type="text" class="@error('longitude') is-invalid @enderror form-control-lg form-control" placeholder="Longitude" name="longitude">
                                @error('longitude')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="latitude" class="form-label h5">Latitude</label>
                                <input value="{{ old('latitude') }}" type="text" class="@error('latitude') is-invalid @enderror form-control-lg form-control" placeholder="Latitude" name="latitude">
                                @error('latitude')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
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
</body>
</html>
